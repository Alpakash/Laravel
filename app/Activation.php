<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $table = 'Activation';

    protected $fillable = [
      'email' => 'required',
    ];
}
