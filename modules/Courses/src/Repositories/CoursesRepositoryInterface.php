<?php
namespace Modules\Courses\src\Repositories;

use App\Repositories\RepositoryInterface;

interface CoursesRepositoryInterface extends RepositoryInterface
{
    //viet ham lay du lieu
    public function getAllCourses();

}
