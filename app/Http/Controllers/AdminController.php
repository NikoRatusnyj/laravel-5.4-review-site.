<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Company;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(User $userModel, Company $companyModel, Request $request)
    {

        if(isset($request->naam)){
            $users = $userModel->search($request->naam)->get();

        }else {
            $users = $userModel->all();

        }
        if(isset($request->naam)){

            $companys = $companyModel->search($request->naam)->get();
        }else {
            $companys = $companyModel->all();
        }
        return view('admin', compact('users','companys'));
    }
}
