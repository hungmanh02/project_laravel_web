<?php
namespace Modules\User\src\Repositories;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lay model tuong ung
    public function getModel()
    {

        return User::class;
    }
    // public function getUsers($limit)
    // {
    //     return $this->model->paginate($limit);
    // }
    //lấy dự sự dụng serve side
    public function getAllUsers(){
        return $this->model->select(['id','name','email','group_id','created_at'])->latest();
    }
    // thay đổi mật khẩu
    public function setPassword($id,$password)
    {
        // $this->update (update là phương thức của BaseRepository)
        return $this->update($id,[ 'password'=> Hash::make($password)]);
    }
    public function checkPassword($id, $password)
    {
        //muốn check password thì ta phải lấy được cái Hash password
        //phương thức find của BaseRepository
        $user=$this->find($id);
        if($user){
            $hashPassword=$user->password;
            // dd($hashPassword);
            return Hash::check($password,$hashPassword);
        }
        return false;

    }
}
