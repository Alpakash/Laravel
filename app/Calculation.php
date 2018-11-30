<?php
/**
 * Created by PhpStorm.
 * User: ricjo
 * Date: 26-11-2018
 * Time: 15:18
 */

namespace App;

use App\Dto\TableSize;
use App\Dto\StatUser;

class Calculation
{
    /**
     * Calculate the amount of people on a single table.
     * @param int $userCount The amount of people in the tournament.
     * @return array The amount of people on a single table.
     */
    public function tableSize(int $userCount)
    {
        if ($userCount === 0 || $userCount === 1 || $userCount === 2 || $userCount === 3)
            return [
                new TableSize(1, $userCount)
            ];

        $mod = $userCount % 4;

        if ($mod === 0)
            return [
                new TableSize($userCount / 4, 4)
            ];

        $tableSize = [
            new TableSize(floor($userCount / 4), 4)
        ];

        if ($mod === 1){
            $tableSize[0]->amountOfTables -= 1;
            $tableSize[] = new TableSize(1, 5);
            if($tableSize[0]->amountOfTables === 0.0)
                array_shift($tableSize);
        }
        else if ($mod === 2){
            $tableSize[0]->amountOfTables -= 1;
            $tableSize[] = new TableSize(2, 3);
            if($tableSize[0]->amountOfTables === 0.0)
                array_shift($tableSize);
        }
        else if ($mod === 3){
            if($tableSize[0]->amountOfTables === 0.0)
                array_shift($tableSize);
            $tableSize[] = new TableSize(1, 3);
        }

        return $tableSize;
    }

    /**
     * Get the amount of points people get at each position based on the amount of people on a table.
     * @param int $tableSize The amount of people on a single page.
     * @return array The amount of tournament points someone earns for each position.
     */
    public function tournamentPoints(int $tableSize){
        switch ($tableSize){
            case 6:
                return [
                    13,
                    11,
                    9,
                    6,
                    3,
                    1
                ];
            case 5:
                return [
                    13,
                    10,
                    7,
                    4,
                    1
                ];
            case 4:
                return [
                    13,
                    9,
                    5,
                    1
                ];
            case 3:
                return [
                    13,
                    7,
                    1
                ];
            case 2:
                return [
                    13,
                    1
                ];
            default:
                return [];
        }
    }

    /**
     * Calculate the tournament points and weights for a single table.
     * @param array $users The users to calculate weights and tournament points for.
     * @param array $tournamentPoints The amount of points people get at each position.
     * @return array The users with the weights and tournament.
     */
    public function points(array $users, array $tournamentPoints)
    {
        //If absences place last
        $userCount = count($users);
        if ($userCount !== count($tournamentPoints))
            throw new \InvalidArgumentException('The amount of people and and the amount of points are not equal.');
        else if ($userCount === 0)
            throw new \InvalidArgumentException('No users given.');

        usort($users, array($this, "scoreCompare"));
        rsort($tournamentPoints);

        $totalScore = array_reduce($users,
            function(int $i = null, StatUser $user) {
                if($i === null)
                    return $user->score;
                return $i + $user->score;
            }
        );

        for ($i = 0; $i < $userCount; $i++){
            if ($users[$i]->score === $users[$i + 1]->score){
                $points = $tournamentPoints[$i] + $tournamentPoints[$i + 1];
                $this->assignPoints($users, $i, $totalScore, $points);
                $i++;
                $this->assignPoints($users, $i, $totalScore, $points);
            }
            else
                $this->assignPoints($users, $i, $totalScore, $tournamentPoints[$i]);
        }

        return $users;
    }

    /**
     * Compare two users based on the score.
     * @param StatUser $a First user.
     * @param StatUser $b Second user.
     * @return int Which user goes first.
     */
    private function scoreCompare(StatUser $a, StatUser $b)
    {
        if ($a->score === $b->score)
            return 0;

        return ($a->score < $b->score) ? -1 : 1;
    }

    /**
     * @param $users array The users to search in.
     * @param $id int The index of the user to assign the points to.
     * @param $totalScore int The total score of all the table.
     * @param $tournamentPoint int The tournament points the user should get.
     */
    private function assignPoints(&$users, $id, $totalScore, $tournamentPoint)
    {
        $users[$id]->tournamentPoints = $tournamentPoint;
        $users[$id]->weight = $this->percentage($totalScore, $users[$id]->score);
    }

    /**
     * Calculate the percentage the part is of the total.
     * @param int $total The total to use.
     * @param int $part The part to calculate the percentage of.
     * @return float|int The percentage the part is of the total.
     */
    private function percentage(int $total, int $part)
    {
        return ($part / $total) * 100;
    }

    /**
     * Split the users over tables with a random layout.
     * @param array $users The users to split over each table.
     * @param array $tableSizes The size of each table.
     * @return array The users of each table.
     */
    public function tablesPreliminaryRoundRandom(array $users, array $tableSizes)
    {
        $availableSpace = 0;
        foreach ($tableSizes as $tableSize){
            $availableSpace += $tableSize->amountOfTables * $tableSize->tableSize;
        }

        if (count($users) !== $availableSpace)
            throw new \InvalidArgumentException('There will be an amount of people left over with this table size.');

        shuffle($users);

        return $this->defineTables($users, $tableSizes);
    }

    /**
     * Split the users over each table.
     * @param array $users The users to split over each table.
     * @param array $tableSizes The size of each table.
     * @return array The users for each table.
     */
    public function tablesPreliminaryRoundFromPoints(array $users, array $tableSizes)
    {
        $availableSpace = 0;
        foreach ($tableSizes as $tableSize){
            $availableSpace += $tableSize->amountOfTables * $tableSize->tableSize;
        }
        
        $userCount = count($users);
        if ($userCount === 0)
            throw new \InvalidArgumentException('No users given.');
        else if ($userCount != $availableSpace)
            throw new \InvalidArgumentException('There will be an amount of people left over with this table size.');


        $users = $this->orderUsers($users);

        return $this->defineTables($users, $tableSizes);
    }

    /**
     * Divide users over the tables with the divide sizes.
     * @param array $users The users to divide.
     * @param array $tableSizes The table sizes.
     * @return array The users divided in tables.
     */
    private function defineTables(array $users, array $tableSizes)
    {
        $start = 0;
        $tables = [];
        foreach ($tableSizes as $tableSize){
            $totalTableSize = $tableSize->amountOfTables * $tableSize->tableSize;
            $separateUser = array_slice($users, $start, $totalTableSize);
            $start += $totalTableSize;
            $table = array_chunk($separateUser, $tableSize->tableSize);
            $tables = array_merge($tables, $table);
        }

        return $tables;
    }

    /**
     * Split the users over tables for the knockout rounds.
     * @param array $users The users to divide.
     * @return array The tables for the knockout rounds.
     */
    public function tablesKnockout(array $users)
    {
        $userCount = count($users);
        if ($userCount % 2 !== 0)
            throw new \InvalidArgumentException('Not an even amount of users required for the knockout phase.');
        else if ($userCount === 0)
            throw new \InvalidArgumentException('No users given.');

        if ($userCount > 16){
            $users = $this->orderUsers($users);
            $users = array_slice($users, 0, 16);
        }

        $users = $this->orderUsers($users);

        $splitUsers = $this->splitUsers($users);
        $oddUsers = $splitUsers[0];
        $evenUsers = $splitUsers[1];

        $oddUsers = $this->splitUsers($oddUsers);
        $evenUsers = $this->splitUsers($evenUsers);

        $firstHalfOddUsers = $oddUsers[0];
        $secondHalfOddUsers = $oddUsers[1];
        $firstHalfEvenUsers = $evenUsers[0];
        $secondHalfEvenUsers = $evenUsers[1];

        $secondHalfOddUsers = array_reverse($secondHalfOddUsers);
        $secondHalfEvenUsers = array_reverse($secondHalfEvenUsers);

        $oddUsers = array_merge($firstHalfOddUsers, $secondHalfOddUsers);
        $evenUsers = array_merge($firstHalfEvenUsers, $secondHalfEvenUsers);
        $evenUsers = array_reverse($evenUsers);

        $userCount = count($oddUsers);

        $oddUsersTable = [];
        $evenUsersTable = [];

        for ($i = 0; $i < $userCount; $i += 2){
            $oddUsersTable[] = [
                $oddUsers[$i],
                $oddUsers[$i + 1]
            ];

            $evenUsersTable[] = [
                $evenUsers[$i],
                $evenUsers[$i + 1]
            ];
        }

        return [
            $oddUsersTable,
            $evenUsersTable
        ];
    }

    /**
     * Sort users based on the score and weight.
     * @param array $users The users to sort.
     * @return array The sorted users.
     */
    private function orderUsers(array $users)
    {
        if (count($users) === 0)
            return $users;

        usort($users, array($this, "scoreWeightCompare"));

        return $users;
    }

    /**
     * Compare two users based on the score and weight.
     * @param Dto\StatUser $a First user.
     * @param Dto\StatUser $b Second user.
     * @return int Which user goes first.
     */
    private function scoreWeightCompare(Dto\StatUser $a, Dto\StatUser $b)
    {
        if ($a->tournamentPoints === $b->tournamentPoints)
            return $a->weight > $b->weight ? -1 : 1;
        return $a->tournamentPoints > $b->tournamentPoints ? -1 : 1;
    }

    /**
     * Place every other user in a separate array.
     * @param array $users The users to split.
     * @return array Nested array of each half of the users.
     */
    private function splitUsers(array $users)
    {
        $firstHalf = [];
        $userCount = count($users);
        for($i = 0; $i < $userCount; $i += 2)
        {
            $firstHalf[] = $users[$i];
            unset($users[$i]);
        }

        $secondHalf = array_values($users);

        return [
            $firstHalf,
            $secondHalf
        ];
    }
}