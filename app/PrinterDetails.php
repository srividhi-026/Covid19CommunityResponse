<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrinterDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','make', 'model', 'material', 'notes'
    ];
    
   
}
