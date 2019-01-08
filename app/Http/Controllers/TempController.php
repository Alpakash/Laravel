<?php

namespace App\Http\Controllers;

class TempController extends Controller
{
    public function tableSize()
    {
        $calculation = new \App\Calculation();
        dd($calculation->tableSize(0));
    }

    public function tournamentPoints()
    {
        $calculation = new \App\Calculation();
        dd($calculation->tournamentPoints(5));
    }

    public function points()
    {
        $calculation = new \App\Calculation();
        dd($calculation->points([
            new \App\Dto\StatUser(0, 40),
            new \App\Dto\StatUser(1, 15),
            new \App\Dto\StatUser(2, 15),
            new \App\Dto\StatUser(3, 15)
        ],
            $calculation->tournamentPoints(4)));
    }

    public function tablesPreliminaryRoundRandom()
    {
        $calculation = new \App\Calculation();
        dd($calculation->tablesPreliminaryRoundRandom([
            \App\Dto\StatUser::create(0, 40, 20, 45, false),
            \App\Dto\StatUser::create(0, 10, 20, 66, false),
            \App\Dto\StatUser::create(0, 30, 20, 50, false),
            \App\Dto\StatUser::create(0, 60, 20, 20, false),
            \App\Dto\StatUser::create(0, 90, 20, 30, false),
            \App\Dto\StatUser::create(0, 30, 20, 60, false),
            \App\Dto\StatUser::create(0, 100, 20, 33, false),
            \App\Dto\StatUser::create(0, 33, 20, 33, false),
            \App\Dto\StatUser::create(0, 99, 20, 33, false),
            \App\Dto\StatUser::create(0, 50, 20, 33, false),
            \App\Dto\StatUser::create(0, 70, 20, 33, false),
            \App\Dto\StatUser::create(0, 30, 40, 60, false),
            \App\Dto\StatUser::create(0, 40, 20, 33, false),
        ],
            $calculation->tableSize(13)));
    }

    public function tablesPreliminaryRoundFromPoints()
    {
        $calculation = new \App\Calculation();
        dd($calculation->tablesPreliminaryRoundFromPoints([
            \App\Dto\StatUser::create(0, 40, 20, 45, false),
            \App\Dto\StatUser::create(0, 10, 20, 66, false),
            \App\Dto\StatUser::create(0, 30, 20, 50, false),
            \App\Dto\StatUser::create(0, 60, 20, 20, false),
            \App\Dto\StatUser::create(0, 90, 20, 30, false),
            \App\Dto\StatUser::create(0, 30, 20, 60, false),
            \App\Dto\StatUser::create(0, 100, 20, 33, false),
            \App\Dto\StatUser::create(0, 33, 20, 33, false),
            \App\Dto\StatUser::create(0, 99, 20, 33, false),
            \App\Dto\StatUser::create(0, 50, 20, 33, false),
            \App\Dto\StatUser::create(0, 70, 20, 33, false),
            \App\Dto\StatUser::create(0, 30, 40, 60, false),
            \App\Dto\StatUser::create(0, 40, 20, 33, false),
        ],
            $calculation->tableSize(13)));
    }

    public function tablesKnockout()
    {
        $calculation = new \App\Calculation();
        dd($calculation->tablesKnockout([
            \App\Dto\StatUser::create(3, 40, 20, 45, false),
            \App\Dto\StatUser::create(0, 10, 20, 66, false),
            \App\Dto\StatUser::create(2, 30, 20, 50, false),
            \App\Dto\StatUser::create(11, 60, 20, 20, false),
            \App\Dto\StatUser::create(10, 90, 20, 30, false),
            \App\Dto\StatUser::create(1, 30, 20, 60, false),
            \App\Dto\StatUser::create(4, 100, 20, 33, false),
            \App\Dto\StatUser::create(9, 33, 20, 33, false),
            \App\Dto\StatUser::create(5, 99, 20, 33, false),
            \App\Dto\StatUser::create(7, 50, 20, 33, false),
            \App\Dto\StatUser::create(6, 70, 20, 33, false),
            \App\Dto\StatUser::create(8, 40, 20, 33, false),
        ]));
    }
}
