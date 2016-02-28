<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Post::currentUser()->orderBy('created_at','DESC')->get();
        return view('home.user.blog.index',compact('blogs'));
    }

    public function showUser($id)
    {
        $blogs = Post::whereUserId($id)->orderBy('created_at','DESC')->get();
        $user = User::findOrFail($id);
        return view('home.blog.index',compact('blogs','user'));
    }

    public function showBlog($userid,$postid)
    {
        $blog = Post::findOrFail($postid);

        $user = User::findOrFail($userid);
        return view('home.blog.show',compact('blog','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.user.blog.new');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect('/user/blog/');
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
        $blog = Post::currentUser()->findOrFail($id);
        return view('home.user.blog.edit',compact('blog'));


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
        Post::currentUser()->findOrFail($id)->update($request->all());

        return  redirect('/user/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Post::currentUser()->findOrFail($id)->destroy($id);
        return  redirect('/user/blog');

    }
}
