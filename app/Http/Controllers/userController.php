<?php

namespace App\Http\Controllers;
use App\payment_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    public function euser()
    {
        //$eusers = euser::all();
        $eusers = DB::select('select * from eusers');
        return view('euser',['eusers'=>$eusers]);
        //return view();
    }    


    public function euser_post()
    {
        /*
        $subs = subscription::all(); //DB::select('select email from eusers;');
        
        return view('userList',['subs'=>$subs]);
        //return 'User List'.$usersview('userList',['users'=>$users]);
        */
        //return view('sub_sum');
        return redirect('/');        
    }
    

    public function sub_sum()
    {
        /*
        $subs = subscription::all(); //DB::select('select email from eusers;');
        
        return view('userList',['subs'=>$subs]);
        //return 'User List'.$usersview('userList',['users'=>$users]);
        */
        $subs = DB::select('select * from subscriptions');        
        return view('sub_sum',['subs'=>$subs]);
    }

    public function sub_sum_post()
    {
        /*
        $subs = subscription::all(); //DB::select('select email from eusers;');
        
        return view('userList',['subs'=>$subs]);
        //return 'User List'.$usersview('userList',['users'=>$users]);
        */
        //return view('sub_sum');
        return redirect('/');        
    }

    public function product()
    {
        $products = DB::select('select * from products'); 
        $packages = DB::select('select * from packages');
        
        return view('product',['products'=>$products,'packages'=>$packages]);
    }

    public function product_post(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|max:30',
            'version' => 'max:20',
            'description' => 'max:30',
          ]);
      
      
          (new App\product($data))->save();
          // $link = tap(new App\Link($data))->save();
      
          return redirect('/');
    }
   

    public function time_unit()
    {

        $pays =      DB::select('select * from payment_types');     
        $timeunits = DB::select('select * from time_units');     
        return view('time_unit',['pays'=>$pays, 'timeunits'=>$timeunits]);
    }

    public function time_unit_post(Request $request)
    {
        $data = $request->validate([
            'kind' => 'required|max:30',
            'description' => 'required|max:30',
          ]);
      
      
          (new App\time_unit($data))->save();
          
      
          return redirect('/');
    }


}
