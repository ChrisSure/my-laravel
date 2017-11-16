<?php

namespace App\Entities\System;

use Illuminate\Database\Eloquent\Model;



class Security extends Model
{
    protected $table = 'security';
    
    protected $fillable = ['ip', 'count', 'date'];
    
    public $timestamps = false;
	
}
