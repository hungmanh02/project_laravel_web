<?php
namespace Modules\Teachers\src\Repositories;

use App\Repositories\RepositoryInterface;

interface TeachersRepositoryInterface extends RepositoryInterface
{
    //viet ham lay du lieu
    public function getAllTeachers();
}
