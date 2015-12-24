<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Store::all();
        return view('store.index',compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = Store::$rules;
         $this->validate($request, $rules);
        $store = Store::create($request->all());
        $store->categories()->sync($request->input('categories_id'));
        $this->uploadPhoto($request,$store->id);
        return redirect('stories');
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
     * @param $id
     */
    private function uploadPhoto($request, $id)
    {
        if ( $request->hasFile('photo')  ) {

            $request->file('photo')
                ->move(public_path('uploads/store'),
                    $id.'.jpg'
                );

        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::findOrFail($id);
        return view('store.edit',compact('store'));
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
        $rules = Store::$rules;
        $rules['slug']='required|unique:stories,slug,'.$id.'|max:25';

        $this->validate($request, $rules);

        $store = Store::find($id);
        $store->update($request->only(['language','area','name','slug','description','link','cashback','istrack']));
        $store->categories()->sync($request->input('categories_id'));

        $this->uploadPhoto($request,$id);

        return redirect('stories')->with('ok','done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::destroy($id);

        return redirect('stories')->with('ok','done');
    }


}
