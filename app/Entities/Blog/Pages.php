<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;



class Pages extends Model
{
    protected $table = 'pages';
    
    protected $fillable = ['slug', 'name', 'title', 'description', 'keywords', 'text', 'sort', 'status'];
	
}
