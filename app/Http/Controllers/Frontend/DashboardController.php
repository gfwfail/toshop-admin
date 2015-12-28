<?php
/**
 * Created by PhpStorm.
 * User: luye
 * Date: 15/12/28
 * Time: 下午10:46
 */

namespace App\Http\Controllers\Frontend;



use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    function index()
    {
        return view('home.user.dashboard');
    }
}