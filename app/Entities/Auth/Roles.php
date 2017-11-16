<?php

namespace App\Entities\Auth;

use Illuminate\Database\Eloquent\Model;



class Roles extends Model
{
    protected $table = 'roles';
    
    protected $fillable = ['name', 'description', 'perm'];
    
    public $timestamps = false;
	
	public function users()
  	{
		return $this->hasMany('App\Entities\Auth\User');
	}
}
