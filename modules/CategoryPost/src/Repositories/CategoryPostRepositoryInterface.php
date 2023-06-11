<?php
namespace Modules\CategoryPost\src\Repositories;

use App\Repositories\RepositoryInterface;

interface CategoryPostRepositoryInterface extends RepositoryInterface
{
    public function getCategoryPosts();
    public function getAllCategoryPosts();
}
