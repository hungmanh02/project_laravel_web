<?php

namespace Modules\Post\src\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\CategoryPost\src\Models\CategoryPost;

class Post extends Model
{
    use HasFactory;
    protected $table="posts";
    protected $fillable=['title', 'slug', 'content', 'exceprt', 'thumbnail', 'post_id'];

    public function category_posts(){
        return $this->belongsToMany(CategoryPost::class,'categories_courses');
    }
    protected $casts = [
        'categories' => 'array'
    ];
}
