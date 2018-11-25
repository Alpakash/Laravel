<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'round_id'
    ];

    public function round()
    {
        return $this->belongsTo(Round::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('game_points', 'weight', 'tournament_points');
    }
}
