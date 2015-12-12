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


        $stores = Store::all();
        $storeSlide = [];
        for ($i=0;$i<10;$i++) {

            if (isset($stores[$i])) {
                $storeSlide[$i] = $stores[$i];
                }
            else {
                $storeSlide[$i] = '';
            }
        }
        return view('home.index',compact('stores','storeSlide'));
    }
}
