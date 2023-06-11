<?php
namespace Modules\Dashboard\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\src\Repositories\UserRepositoryInterface;

class DashboardController extends Controller
{

    public function index()
    {
        $pageTitle="Trang chủ";
        // $name=Auth::user()->name;

        return view('Dashboard::index',compact('pageTitle'));
    }

}
