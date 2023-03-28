<?php

namespace Modules\Category\src\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="categories";
    protected $fillable = [
        'name',
        'email',
        'slug',
        'parent_id',
    ];


}
