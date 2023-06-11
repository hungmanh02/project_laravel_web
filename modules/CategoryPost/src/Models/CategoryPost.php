<?php

namespace Modules\CategoryPost\src\Models;


use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="category_posts";
    protected $fillable = [
        'name',
        'email',
        'slug',
        'parent_id',
    ];
    public function children(){
        return $this->hasMany(CategoryPost::class,'parent_id');
    }
    public function subCategoryPosts(){
        return $this->children()->with('subCategoryPosts');
    }

}
