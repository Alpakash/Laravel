<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temp extends Model
{
    protected $table = 'temp_users';

    protected $fillable = [
      'email', 'role_id', 'hash'
    ];

    public function Role()
    {
        return $this->hasOne('App\Role', 'id','role_id');
    }
}
