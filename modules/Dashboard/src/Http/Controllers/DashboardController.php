<?php
namespace Modules\Dashboard\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\src\Repositories\UserRepositoryInterface;

class DashboardController extends Controller
{

    public function index()
    {
        $pageTitle="Trang chủ";
    
        return view('Dashboard::index',compact('pageTitle'));
    }

}
