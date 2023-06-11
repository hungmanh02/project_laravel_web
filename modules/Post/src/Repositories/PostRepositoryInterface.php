<?php
namespace Modules\Post\src\Repositories;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    //viet ham lay du lieu
    public function getAllPosts();

}
