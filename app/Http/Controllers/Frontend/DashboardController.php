<?php
/**
 * Created by PhpStorm.
 * User: luye
 * Date: 15/12/28
 * Time: 下午10:46
 */

namespace App\Http\Controllers\Frontend;



use App\Http\Controllers\Controller;
use Stat;

class DashboardController extends Controller
{
    function index()
    {
        return view('home.user.dashboard');
    }

    function getStats()
    {
        $id = auth()->user()->id;

        $stat = Stat::getRefCount($id);
        $directReferrals = Stat::getDirectRefInWeek($id);

        return view('home.user.statistics',compact('stat','directReferrals'));
    }

    function getProfile()
    {
        $user = auth()->user();

        return view('home.user.profile',compact('user'));
    }
}