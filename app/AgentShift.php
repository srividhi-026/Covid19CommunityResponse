<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentShift extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agent_id', 'monday_morning', 'monday_afternoon', 'tuesday_morning', 'tuesday_afternoon', 'wednesday_morning',
        'wednesday_afternoon', 'thursday_morning', 'thursday_afternoon', 'friday_morning', 'friday_afternoon', 'saturday_morning',
        'saturday_afternoon', 'sunday_morning', 'sunday_afternoon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
