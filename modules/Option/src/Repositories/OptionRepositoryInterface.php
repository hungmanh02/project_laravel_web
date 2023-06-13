<?php
namespace Modules\Option\src\Repositories;

use App\Repositories\RepositoryInterface;

interface OptionRepositoryInterface extends RepositoryInterface
{
    //viet ham lay du lieu
    public function getOptions();
}
