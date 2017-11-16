<?php

namespace App\Entities\System;

use Illuminate\Database\Eloquent\Model;



class Setting extends Model
{
    protected $table = 'setting';
    
    protected $fillable = ['title', 'description', 'keywords', 'address', 'phone', 'email'];
	
}