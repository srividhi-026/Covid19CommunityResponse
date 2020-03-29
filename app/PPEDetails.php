<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPEDetails extends Model
{
    
    protected $table = 'ppe_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','ppe_supplies_description', 'volume', 'eircode', 'availability_times'
    ];
    
   
}
