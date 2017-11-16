<?php

namespace App\Entities\Auth;

use Illuminate\Database\Eloquent\Model;



class Permission extends Model
{
    protected $table = 'permission';
    
    protected $fillable = ['name', 'description'];
    
    public $timestamps = false;
	
}
