<?php

namespace Modules\Courses\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\src\Models\Category;

class Course extends Model
{
    use HasFactory;
    // những trường cần lấy
    protected $table="courses";
    protected $fillable = [
        'id', 'name', 'slug', 'detail', 'teacher_id', 'thumbnail', 'price', 'sale_price', 'code', 'durations', 'is_document', 'supports', 'status'
    ];
    // protected $guarded = [];// lấy toàn bộ

    public function categories(){
        return $this->belongsToMany(Category::class,'categories_courses');
    }
    protected $casts = [
        'categories' => 'array'
    ];
}
