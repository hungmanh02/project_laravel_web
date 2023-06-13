<?php

namespace Modules\Option\src\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $table="options";
    protected $fillable=['name', 'value'];

    // public function category_posts(){
    //     return $this->belongsToMany(CategoryPost::class,'categories_courses');
    // }
    // protected $casts = [
    //     'categories' => 'array'
    // ];
}
