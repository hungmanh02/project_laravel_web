<?php
namespace Modules\Group\src\Repositories;

use App\Repositories\RepositoryInterface;

interface GroupRepositoryInterface extends RepositoryInterface
{
    //viet ham lay du lieu
    public function getGroups();
}
