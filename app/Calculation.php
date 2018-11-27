<?php
/**
 * Created by PhpStorm.
 * User: ricjo
 * Date: 26-11-2018
 * Time: 15:18
 */

namespace App;

use http\Exception\InvalidArgumentException;

class Calculation
{
    /**
     * Calculate the amount of people on a single table.
     * @param int $userCount The amount of people in the tournament.
     * @return int The amount of people on a single table.
     */
    public function tableSize(int $userCount)
    {
        if ($userCount === 0 || $userCount === 1 || $userCount === 2)
            return $userCount;

        if ($userCount % 4 === 0)
            return 4;
        else if ($userCount % 3 === 0)
            return 3;
        else if ($userCount % 5 === 0)
            return 5;
        else if ($userCount % 6 === 0)
            return 6;
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
        $userCount = count($users);
        if ($userCount !== count($tournamentPoints))
            throw new InvalidArgumentException('The amount of people and and the amount of points are not equal.');
        else if ($userCount === 0)
            throw new InvalidArgumentException('No users given.');

        usort($users, array($this, "scoreCompare"));
        rsort($tournamentPoints);

        $totalScore = array_reduce($users,
            function(int $i = null, \App\Dto\StatUser $user) {
                if($i === null)
                    return $user->score;
                return $i + $user->score;
            }
        );

        for ($i = 0; $i < $userCount; $i++){
            $users[$i]->tournamentPoints = $tournamentPoints[$i];
            $users[$i]->weight = $this->percentage($totalScore, $users[$i]->score);
        }

        return $users;
    }

    /**
     * Compare two users based on the score.
     * @param Dto\StatUser $a First user.
     * @param Dto\StatUser $b Second user.
     * @return int Which user goes first.
     */
    private function scoreCompare(\App\Dto\StatUser $a, \App\Dto\StatUser $b)
    {
        if ($a->score === $b->score)
            return 0;

        return ($a->score < $b->score) ? -1 : 1;
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
     * @param int $tableSize The size of each table.
     * @return array The users of each table.
     */
    public function tablesPreliminaryRoundRandom(array $users, int $tableSize)
    {
        if (count($users) % $tableSize !== 0)
            throw new InvalidArgumentException('There will be an amount of people left over with this table size.');

        shuffle($users);
        return array_chunk($users, $tableSize);
    }

    /**
     * Split the users over each table.
     * @param array $users The users to split over each table.
     * @param int $tableSize The size of each table.
     * @return array The users for each table.
     */
    public function tablesPreliminaryRoundFromPoints(array $users, int $tableSize)
    {
        $userCount = count($users);
        if ($userCount % $tableSize !== 0)
            throw new InvalidArgumentException('There will be an amount of people left over with this table size.');
        else if ($userCount === 0)
            throw new InvalidArgumentException('No users given.');

        $users = $this->orderUsers($users);
        return array_chunk($users, $tableSize);
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
            throw new InvalidArgumentException('Not an even amount of users required for the knockout phase.');
        else if ($userCount === 0)
            throw new InvalidArgumentException('No users given.');

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
    private function scoreWeightCompare(\App\Dto\StatUser $a, \App\Dto\StatUser $b)
    {
        if ($a->tournamentPoints === $b->tournamentPoints)
            return $a->score > $b->score ? -1 : 1;
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