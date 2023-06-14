<?php
namespace Modules\Group\src\Repositories;


use Modules\Group\src\Models\Group;

use App\Repositories\BaseRepository;
use Modules\Group\src\Repositories\GroupRepositoryInterface;

class GroupRepository extends BaseRepository implements GroupRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {
        return Group::class;
    }
    public function getGroups(){
        return $this->model->select(['id','name','permissions','created_at'])->latest();
    }
}
