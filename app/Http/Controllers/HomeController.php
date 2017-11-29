<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('home');
    }

    public function userLogin(Request $request)
    {
        $uemail = $request['email'];
        $upwd = $request['password'];
        $users = DB::select('select pwd from eusers where email =?',[$uemail]);
        if ($upwd == $users) {
             return redirect()->action('Homecontroller@index');   
        }
        else {
            return view('userLogin');
        }
    }

    public function store(ContactFormRequest $request) {
        return redirect()-route('userOut')->with('message','Thanks for contacting us!');
    }
    public function userOut(){
        return view('userOut');
    }

    public function login($response)
    {
        $uname = $reponse['Username'];
        return view('login',['uname'=>$uname]);
        //return 'Login';
    }
    
}
