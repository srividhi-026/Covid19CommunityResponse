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
        'agent_id', 'monday_morning', 'monday_afternoon', 'monday_evening', 'tuesday_morning', 'tuesday_afternoon',
        'tuesday_evening', 'wednesday_morning', 'wednesday_afternoon', 'wednesday_evening', 'thursday_morning',
        'thursday_afternoon', 'thursday_evening', 'friday_morning', 'friday_afternoon', 'friday_evening',
        'saturday_morning', 'saturday_afternoon', 'saturday_evening', 'sunday_morning', 'sunday_afternoon', 'sunday_evening'
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
