<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battles extends Model
{
    public function game()
    {
        return $this->belongsTo(Games::class, 'game_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
