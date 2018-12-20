<?php
/**
 * Created by PhpStorm.
 * User: ricjo
 * Date: 26-11-2018
 * Time: 15:40
 */

namespace App\Dto;

/**
 * Class StatUser The class that holds the stats of a user.
 * @package App\Dto
 */
class StatUser
{
    /**
     * @var int $id The id of the user.
     */
    public $id;
    /**
     * @var int $score The score of the user.
     */
    public $score;
    /**
     * @var int $weight The weight of the user.
     */
    public $weight;
    /**
     * @var int $tournamentPoints The amount of tournament points the user earned.
     */
    public $tournamentPoints;
    /**
     * @var bool $last If the person should be fourth by default
     */
    public $last;

    /**
     * StatUser constructor.
     * @param int $id The id of the user.
     * @param int $score The score of the user.
     */
    public function __construct(int $id, int $score)
    {
        $this->id = $id;
        $this->score = $score;
        $this->weight = 0;
        $this->tournamentPoints = 0;
        $this->last = false;
    }

    /**
     * Create a StatUser object with all the properties.
     * @param int $id The id of the user.
     * @param int $score The score of the user.
     * @param int $weight The weight of the user.
     * @param int $tournamentPoints The tournament points of the user.
     * @param bool $last If the player needs to be last or not.
     * @return StatUser The StatUser object.
     */
    public static function create(int $id, int $score, int $weight, int $tournamentPoints, bool $last)
    {
        $statUser = new StatUser($id, $score);
        $statUser->weight = $weight;
        $statUser->tournamentPoints = $tournamentPoints;
        $statUser->last = $last;
        return $statUser;
    }
}