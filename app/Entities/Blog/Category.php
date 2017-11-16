<?php

namespace App\Entities\Blog;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Category extends Model
{
    use NodeTrait;
    
    protected $table = 'category';
    
    protected $fillable = ['slug', 'name', 'title', 'description', 'keywords', 'text', 'sort', '_lft', '_rgt', 'parent_id'];
    
    
}
