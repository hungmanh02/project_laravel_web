<?php

namespace Modules\Category\src\Models;


use Illuminate\Database\Eloquent\Model;
use Modules\Courses\src\Models\Course;

class Category extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'slug',
        'parent_id',
    ];
    public function children(){
        return $this->hasMany(Category::class,'parent_id');
    }
    public function subCategories(){
        return $this->children()->with('subCategories');
    }
    public function courses(){
        return $this->belongsToMany(Course::class,'categories_courses');
    }

}
