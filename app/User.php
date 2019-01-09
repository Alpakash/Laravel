<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyEmail;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastName', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
      'name' => 'required',
      'lastName' => 'required'
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }


    public function Role()
    {
        return $this->hasOne('App\Role', 'id','role_id');
    }

    public function isAdmin()
    {
        return $this->where([
            ['role_id', '=',    1],
            ['id',      '=',    Auth::user()->id]
        ])->first() ? true : false;
    }

    public function isJudge()
    {
        return $this->where([
            ['role_id', '=',    2],
            ['id',      '=',    Auth::user()->id]
        ])->first() ? true : false;
    }

    public function isUser()
    {
        return $this->where([
            ['role_id', '=',    3],
            ['id',      '=',    Auth::user()->id]
        ])->first() ? true : false;
    }

    public function isStore()
    {
        return $this->where([
            ['role_id', '=',    4],
            ['id',      '=',    Auth::user()->id]
        ])->first() ? true : false;
    }
}
