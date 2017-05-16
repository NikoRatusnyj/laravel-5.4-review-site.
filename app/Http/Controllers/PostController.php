<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Company;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth:company');
//        $this->middleware('auth');
    }
    public function index()
    {
        $company = Auth::user();
        $post = DB::table('posts')->get();
        return view('company', compact('company', 'post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'body' => 'required'
        ));
        //store database
        $post = new Post();
        $user = Auth::user();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->comp_id = $user->id;
        $post->save();
        //redirect page
        return Redirect::to('company');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $postModel, Company $companyModel)
    {

        $companys = $companyModel->all();
        $posts = $postModel->all();
        return view ('posts.show', compact('posts', 'companys'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $post = Post::find($post);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {

        $post = Post::find($post);
        $post->delete();

        return back();
    }
}
