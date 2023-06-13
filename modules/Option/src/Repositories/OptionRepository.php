<?php
namespace Modules\Option\src\Repositories;


use App\Repositories\BaseRepository;
use Modules\Option\src\Models\Option;
use Modules\Option\src\Repositories\OptionRepositoryInterface;

class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {
        return Option::class;
    }
    public function getOptions(){
        return $this->model->select(['id','name','value','created_at'])->latest();
    }
}
