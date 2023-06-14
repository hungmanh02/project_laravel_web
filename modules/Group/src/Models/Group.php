<?php

namespace Modules\Group\src\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $table="groups";
    protected $fillable=['id','name','user_id'];

    // public function category_posts(){
    //     return $this->belongsToMany(CategoryPost::class,'categories_courses');
    // }
    // protected $casts = [
    //     'categories' => 'array'
    // ];
}
