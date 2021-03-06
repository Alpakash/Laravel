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
use Illuminate\Support\Facades\DB;

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

        if ($mod === 1 && intval($tableSize[0]->amountOfTables) === 1){
            $tableSize[0]->amountOfTables -= 1;
            $tableSize[] = new TableSize(1, 3);
            $tableSize[] = new TableSize(1, 2);
        }
        else if ($mod === 1){
            $tableSize[0]->amountOfTables -= 2;
            $tableSize[] = new TableSize(3, 3);
        }
        else if ($mod === 2){
            $tableSize[0]->amountOfTables -= 1;
            $tableSize[] = new TableSize(2, 3);
        }
        else if ($mod === 3)
            $tableSize[] = new TableSize(1, 3);

        if($tableSize[0]->amountOfTables === 0.0)
            array_shift($tableSize);

        return $tableSize;
    }

    /**
     * Get the amount of points people get at each position based on the amount of people on a table.
     * @param int $tableSize The amount of people on a single page.
     * @return array The amount of tournament points someone earns for each position.
     */
    public function tournamentPoints(int $tableSize){
        switch ($tableSize){
            case 4:
                return [
                    5,
                    3,
                    2,
                    1
                ];
            case 3:
                return [
                    5,
                    3,
                    2
                ];
            case 2:
                return [
                    5,
                    3
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
            throw new \InvalidArgumentException('The amount of people and and the amount of tournament points are not equal.');
        else if ($userCount === 0)
            throw new \InvalidArgumentException('No users given.');

        $playedUsers = [];
        $notPlayedUsers = [];
        foreach ($users as $user){
            if ($user->last)
                $notPlayedUsers[] = $user;
            else
                $playedUsers[] = $user;
        }

        usort($playedUsers, array($this, "scoreCompare"));
        usort($notPlayedUsers, array($this, "scoreCompare"));
        rsort($tournamentPoints);

        $users = array_merge($playedUsers, $notPlayedUsers);

        $totalScore = array_reduce($users, array($this, "totalScore"));

        for ($i = 0; $i < $userCount; $i++){
            $score = $users[$i]->score;
            $sameScore = array_filter($users, function(StatUser $user) use ($score){
                return $user->score === $score && !$user->last;
            });

            $sameScoreCount = count($sameScore);
            if ($sameScoreCount > 1){
                $sameTournamentPoints = array_slice($tournamentPoints, $i, $i + $sameScoreCount);
                $averageTournamentPoints = array_sum($sameTournamentPoints) / $sameScoreCount;

                for ($n = $i; $n < $sameScoreCount; $n++)
                    $this->assignPoints($users, $n, $totalScore, $averageTournamentPoints);

                $i = $n;
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

        return ($a->score < $b->score) ? 1 : -1;
    }

    /**
     * This function is used for getting the total score via a array reduce.
     * @param int|null $i The previous value.
     * @param StatUser $user The user to add the score to the total.
     * @return int The new total score.
     */
    private function totalScore(int $i = null, StatUser $user)
    {
        if($i === null)
            return $user->score;
        return $i + $user->score;
    }

    /**
     * @param $users array The users to search in.
     * @param $id int The index of the user to assign the points to.
     * @param $totalScore int The total score of all the table.
     * @param $tournamentPoint float The tournament points the user should get.
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

        $userCount = count($users);
        if ($userCount === 0)
            try {
                return view('layouts.scores');
            } catch (\Exception $e) {
            throw new \InvalidArgumentException("No users given. {$e}");
            }
        if ($userCount !== intval($availableSpace))
            throw new \InvalidArgumentException('There will be an amount of people left over with these table sizes.');

        shuffle($users);

        return $this->defineTables($users, $tableSizes);
    }


    /**
     * Split the users over tables without random layout.
     * @param array $users The users to split over each table.
     * @param array $tableSizes The size of each table.
     * @return array The users of each table.
     */
    public function tablesPreliminaryRound(array $users, array $tableSizes)
    {
        $availableSpace = 0;
        foreach ($tableSizes as $tableSize){
            $availableSpace += $tableSize->amountOfTables * $tableSize->tableSize;
        }

        $userCount = count($users);
        if ($userCount === 0)
            throw new \InvalidArgumentException('No users given.');
        if ($userCount !== intval($availableSpace))
            throw new \InvalidArgumentException('There will be an amount of people left over with these table sizes.');


        return $this->defineTables($users, $tableSizes);
    }

    public function generateTables() {
        $calculation = new \App\Calculation();

        $users = User::where('role_id', 3)->get()->toArray();
        $allUsers = [];

        foreach ($users as $user) {
            $allUsers[] = $user['id'];
        }

        $totalUsers = count($allUsers);
        $usersPerTable = $calculation->tablesPreliminaryRoundRandom($allUsers, $calculation->tableSize($totalUsers));
        $totalTables = count($usersPerTable);

        DB::table('tables_users')->truncate();

        for($i=0; $i < $totalTables; $i++) {
            foreach($usersPerTable[$i] as $users_id) {
                DB::table('tables_users')
                    ->insert([
                    ['table_id' => ($i+1), 'user_id' => $users_id]
                ]);
            }
        }

        return redirect('/scores');

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
        else if ($userCount != intval($availableSpace))
            throw new \InvalidArgumentException('There will be an amount of people left over with these table sizes.');


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

        if ($userCount === 0)
            throw new \InvalidArgumentException('No users given.');
        else if (($userCount & ($userCount - 1)) == 0)
            throw new \InvalidArgumentException('With the amount of people given for the knockout phase there will be people left over.');

        if ($userCount === 2)
            return [
                $users
            ];

        $users = $this->orderUsers($users);

        $splitUsers = $this->splitUsers($users);
        $oddUsers = $splitUsers[0];
        $evenUsers = $splitUsers[1];

        $oddUsers = $this->splitUsers($oddUsers);
        $evenUsers = $this->splitUsers($evenUsers);

        $firstHalfOddUsers = $oddUsers[0];
        $secondHalfOddUsers = array_reverse($oddUsers[1]);
        $firstHalfEvenUsers = $evenUsers[0];
        $secondHalfEvenUsers = array_reverse($evenUsers[1]);

        $oddUsers = array_merge($firstHalfOddUsers, $secondHalfOddUsers);
        $evenUsers = array_merge($firstHalfEvenUsers, $secondHalfEvenUsers);
        $evenUsers = array_reverse($evenUsers);

        $oddUsers = array_chunk($oddUsers, 2);
        $evenUsers = array_chunk($evenUsers, 2);

        return [
            $oddUsers,
            $evenUsers
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