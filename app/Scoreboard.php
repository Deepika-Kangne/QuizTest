<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Scoreboard extends Model
{
    use Notifiable;

    // use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'scoreboard';

    protected $fillable = [
        'user_id', 'score', 'attempt', 'answer_sheet'
    ];


    public function User()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    protected $casts = [
        'attempt_at' => 'datetime',
    ];
}
