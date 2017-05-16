<?php

namespace App\Http\Controllers;


use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Input;
use App\Company;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Redirect;
use App\Comment;
use Illuminate\Support\Facades\Session;






class CompanyController extends Controller
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
        $this->middleware('auth');
    }

    public function index(Post $postModel, User $userModel)
    {
       $company = Auth::user();
       $users = $userModel->all();
       $posts = $postModel->all();
        return view('company', compact('company', 'posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function register()
//    {
//        $this->validate(request(),[
//            'title' => 'required',
//            'content'=> 'required',
//            'user_id'=>'required',
//        ]);
//        $companys= new Company();
//        $companys->companymane = Input::get('companymane');
//        $companys->kvk= Input::get('kvk');
//        $companys->adres = Input::get('adres');
//        $companys->telnr = Input::get('telnr');
//        $companys->password = Input::get('password');
//        $companys->save();
//
//        return Redirect::to('home');
//    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function storecoment(Request $request)
//    {
//        $this->validate($request, array(
//            'comment'   =>  'required|min:5|max:2000'
//        ));
//        $posts =  Post::all();
//        $company = Auth::user();
//        $comment = new Comment();
//        $comment->comment = $request -> comment;
//        $comment->comp_id = $company -> id;
//        $comment->post_id = $posts ->get('id'); //14
//        $comment->save();
//        return view ('posts.show', compact('posts'));
//
//
//
//
//
//    }
//    public function store(Request $request)
//    {
//        //validate
//        $this->validate($request, array(
//            'title' => 'required|max:255',
//            'body' => 'required'
//        ));
//        //store database
//        $post = new Post();
//        $user = Auth::user();
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->comp_id = $user->id;
//
//        $post->save();
//        //redirect page
//        return Redirect::to('company');
//    }
//    public function storeImg()
//    {
//
//        $file = new Company();
//
//
//        $file->title= Input::get('name');
//        $img=Input::file('image');
//        $img->move(public_path(). '/', $img->getClientOriginalName());
//        $file->name = $img->getClientOriginalName();
//        $file->size = $img->getClientsize();
//        $file->type = $img->getClientMimeType();
//
//        $file->save();
//
//        return view('company.show');
//    }
    public function update_logo(Request $request){


        if($request->hasFile('logo')){
            $logo = $request->file('logo');
            $filename = time() . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->save( public_path('/uploads/logo/' . $filename ) );

            $company = Auth::user();
            $company->logo = $filename;
            $company->save();
        }

        return view('company', compact(['user' => Auth::user()], 'company')  );

    }
//    public function update(Request $request)
//    {
//        $company = Auth::user();
//        $company->companyname = Input::get('companyname');
//        $company->kvk = Input::get('kvk');
//        $company->description = Input::get('description');
//        $company->email = Input::get('email');
//        $company->adres = Input::get('adres');
//        $company->save();
//
//        return back();
//    }






    /**
     * Display the specified resource.
     *
     * @param  \App\company  $companys
     * @return \Illuminate\Http\Response
     */
    public function showboat($post)
    {
        $post = Post::find($post);
        return Redirect::to('single', compact('post'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company $companys
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('company.editpost');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $companys
     * @return \Illuminate\Http\Response
     */
//    public function (Request $request, company $companys)
//    {
//        //
//    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $companys
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {

        $post = Post::find($post);
        $post->delete();

        return view('company');
    }
}
