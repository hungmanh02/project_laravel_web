<?php
namespace Modules\User\src\Repositories;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    //vi du lay danh sach nguoi dung
    // public function getUsers($limit);
    public function getAllUsers();
    public function setPassword($id,$password);
    // check password
    public function checkPassword($id,$password);

}
