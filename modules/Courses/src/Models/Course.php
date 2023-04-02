<?php

namespace Modules\Courses\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    // những trường cần lấy
    // protected $fillable = [
    //     'options->enabled',
    // ];
    protected $guarded = [];// lấy toàn bộ


}
