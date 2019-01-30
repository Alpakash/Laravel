<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    public function battle()
    {
        return $this->hasMany(Battles::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
