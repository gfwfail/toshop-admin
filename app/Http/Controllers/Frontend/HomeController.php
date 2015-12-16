<?php

namespace App\Http\Controllers\Frontend;

use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {


        $stores = Store::orderBy('name')->get();
       /* $storeSlide = [];
        for ($i=0;$i<10;$i++) {

            if (isset($stores[$i])) {
                $storeSlide[$i] = $stores[$i];
                }
            else {
                $storeSlide[$i] = '';
            }
        }
       */

        return view('home.index',compact('stores','storeSlide'));
    }

    public function search($keyword)
    {
        $stores = Store::where('title', 'LIKE', '%' . $keyword . '%')->paginate(10);
        return view('home.list',compact('stores'));

    }
}
