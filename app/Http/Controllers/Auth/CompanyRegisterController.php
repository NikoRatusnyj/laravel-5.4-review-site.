<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;




class CompanyRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (isset($data['firstname'])) {
            return "/";
        } else {
            return 'company';
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company');

    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'username' => 'max:255',
//            'firstname' => 'max:255',
//            'lastname' => 'max:255',
//            'adres' => 'max:255',
//            'telnr' => 'max:255',
//
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */






    public function postRegister(Company $company)
    {
        $company = new Company();
        $company->companyname = Input::get('companyname');
        $company->description = Input::get('description');
        $company->kvk = Input::get('kvk');
        $company->adres = Input::get('adres');
        $company->telnr = Input::get('telnr');
        $company->email = Input::get('email');
        $company->password = bcrypt(Input::get('password')) ;
        $company->save();

         return view('auth.company-login');
        }




//    public function postRegister(Request $data){
//
//        return Company::create([
//                'companyname' => $data['companyname'],
//                'kvk' => $data['kvk'],
//                'adres' => $data['adres'],
//                'telnr' => $data['telnr'],
//                'email' => $data['email'],
//                'password' => bcrypt($data['password']),]);
//
//        }





}
