<?php

namespace App\Http\Controllers;

use App\Deal;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deals = Deal::all();
        return view('deal.index',compact('deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Deal::$rules);
        $deal = Deal::create($request->all())->categories()->sync($request->input('categories_id'));

        $this->uploadPhoto($request,$deal->id);

        return redirect('deals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deal = Deal::findOrFail($id);
        return view('deal.edit',compact('deal'));
    }


    private function uploadPhoto($request, $id)
    {

        if ( $request->hasFile('photo')  ) {

            $request->file('photo')
                ->move(public_path('uploads/deal'),
                    $id.'.jpg'
                );

        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, Deal::$rules);

        $deal = Deal::find($id);
        $deal ->update($request->only(['name','code','expired_at','store_id','description']));
        $deal->categories()->sync($request->input('categories_id'));

        $this->uploadPhoto($request,$id);
        return redirect('deals')->with('ok','done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deal::destroy($id);

        return redirect('deals')->with('ok','done');
    }
}
