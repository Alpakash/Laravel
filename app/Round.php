<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'round_number'
    ];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
}
