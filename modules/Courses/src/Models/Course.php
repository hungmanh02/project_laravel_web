<?php

namespace Modules\Courses\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\src\Models\Category;

class Course extends Model
{
    use HasFactory;
    // những trường cần lấy
    // protected $fillable = [
    //     'options->enabled',
    // ];
    protected $guarded = [];// lấy toàn bộ

    public function categories(){
        $this->belongsToMany(Category::class,'categories_courses');
    }
    // public function courses(){
    //     $this->belongsToMany(Course::class);
    // }
}
