<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone', 'confidentiality_agreement', 'privacy_policy', 'gdpr',
        'cyber_security', 'data_protection'
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
