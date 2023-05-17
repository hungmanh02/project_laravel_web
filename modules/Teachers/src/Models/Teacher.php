<?php

namespace Modules\Teachers\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    // những trường cần lấy
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'image',
        'epx',
    ];
    // protected $guarded = [];// lấy toàn bộ

    // public function categories(){
    //     return $this->belongsToMany(Category::class,'categories_courses');
    // }
    // protected $casts = [
    //     'categories' => 'array'
    // ];
}
