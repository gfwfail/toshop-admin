<?php

namespace App\Http\Controllers;

use App\Deal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MetaController extends Controller
{
    public function setDeal($id,$k,Request $request)
    {

        $v = $request->get('v');
        $deal = Deal::find($id);
        $deal->setMeta($k, $v);
        $deal->save();
          return redirect()->back()->with('ok','done');


    }
}
