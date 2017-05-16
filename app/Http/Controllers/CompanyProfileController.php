<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
//        $user = Company::find('id');
//        Auth::login($user);

        $this->middleware('auth:company');
    }
    public function index(Company $companyModel,User $userModel)
    {
        $users = $userModel->all();
        $companys = $companyModel->all();

        return view('company_profile.index)', compact('users', 'companys') );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $companyModel, $id)
    {
        $companys = $companyModel->all();
        return view ('company_profile.show', compact('companys', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request)
    {
        $company = Auth::user();
        $company->companyname = Input::get('companyname');
        $company->kvk = Input::get('kvk');
        $company->description = Input::get('description');
        $company->email = Input::get('email');
        $company->adres = Input::get('adres');
        $company->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
