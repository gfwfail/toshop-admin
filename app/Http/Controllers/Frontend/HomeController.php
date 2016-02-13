<?php

namespace App\Http\Controllers\Frontend;

use App\Deal;
use App\Message;
use App\Page;
use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function getContactus()
    {
        return view('home.contactus');
    }


    public function postContactus(Request $request)
    {
        $this->validate($request, ['email' => 'required', 'body' => 'required']);

        Message::create($request->all());

        return redirect('home/contactus')->with('ok', 'done');
    }


    public function extrabux()
    {

        $p = 10;
        $stores = Store::orderBy('name')->get()->toArray();

        $fillnum = ($p - sizeof($stores) % $p);

        for ($i = 0; $i < $fillnum; $i++) {
            $stores[] = 0;
        }

        $stores = array_chunk($stores, $p);

        $dealsCard = Deal::available()->get();
        $dealsCardShow=[];
        $dealsCardList =[];
        foreach ($dealsCard as $deal) {
            if ($deal->homepage==1){
                array_push($dealsCardShow,$deal);
            } else
            {
                array_push($dealsCardList,$deal);

            }
        }


        return view('home.oldindex', compact('stores', 'storeSlide', 'dealsCardShow','dealsCardList'));

    }

    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        if ($keyword) {
            $stores = Store::where('name', 'like', '%' . $keyword . '%')->orderBy('name')->get();
        } else {
            $stores = Store::orderBy('name')->get();

        }


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

        return view('home.index', compact('stores', 'storeSlide'));
    }

    public function displayPageBySlug($slug)
    {

        $page = Page::whereSlug(trim($slug))->first();
        if (!$page) {
            return abort(404);
        }
        $data = $page->content;
        return view('home.page', compact('data'));

    }

    public function search($keyword)
    {
        $stores = Store::where('title', 'LIKE', '%' . $keyword . '%')->paginate(10);
        return view('home.list', compact('stores'));

    }
}
