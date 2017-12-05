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
                
        return view('product',['products'=>$products]);
    }

    public function product_post(Request $request)
    {
      if ($request['product_name'] != "") {
        $data = $request->validate([
            'product_name' => 'required|max:30',
            'version' => 'max:20',
            'description' => 'max:30',
          ]);
      
      
          DB::table('products')->insert(array(  'product_name'=>$request['product_name'], 
                                                'version'=>$request['version'],
                                                'description'=>$request['description'],
                                                'created_at'=>\Carbon\Carbon::now(),
                                                'updated_at'=>\Carbon\Carbon::now() ));
      
          return redirect('/product');

        } 
        
        if ($request['product_id'] != "") {

            $data = $request->validate([
                'product_id' => 'required',
                'price' => 'max:20',
                'description' => 'max:30',
                'change_date'=> 'required'
              ]);
          
          
              DB::table('product_prices')->insert(array('product_id'=>$request['product_id'], 
                                                        'price'=>$request['price'],
                                                        'description'=>$request['pdescription'],
                                                        'change_date'=>$request['change_date'],
                                                        'created_at'=>\Carbon\Carbon::now(),
                                                        'updated_at'=>\Carbon\Carbon::now() ));
      
              return redirect('/product');
              //return 'Finish price result';
            
        } else
        {
            return redirect('/product');            
            //return 'Null Result';
        }
    }
   
    public function product_price_post(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required',
            'price' => 'max:20',
            'description' => 'max:30',
            'change_date'=> 'required'
          ]);
      
      
          DB::table('product_prices')->insert(array(  'product_id'=>$request['product_name'], 
                                                'price'=>$request['price'],
                                                'description'=>$request['description'],
                                                'change_date'=>$request['change_date'],
                                                'created_at'=>\Carbon\Carbon::now(),
                                                'updated_at'=>\Carbon\Carbon::now() ));
  
          return redirect('/product');
    }

    public function package(Request $request)
    {
        $packages = DB::select('select * from packages'); 
        
        return view('package',['packages'=>$packages]);
    }


    public function package_post(Request $request)
    {
        $data = $request->validate([
            'package_name' => 'required|max:30',
            'version' => 'max:20',
            'description' => 'max:30',
          ]);
      
      
          DB::table('packages')->insert(array('kind'=>$request['kind'], 
          'description'=>$request['description'],
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now() ));


        return redirect('/package');
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
            'kind' => 'required',
            'description' => 'required',
          ]);

        DB::table('time_units')->insert(array('kind'=>$request['kind'], 
                                              'description'=>$request['description'],
                                              'created_at'=>\Carbon\Carbon::now(),
                                              'updated_at'=>\Carbon\Carbon::now() ));
             
          
          return redirect('/time_unit');
    }


    public function payment()
    {

        $pays =      DB::select('select * from payment_types');     
        return view('payment_type',['pays'=>$pays]);
    }


    public function payment_post(Request $request)
    {
        $data = $request->validate([
            'p_kind' => 'required',
            'description' => 'required',
          ]);
      
            
          DB::table('payment_types')->insert(array('p_kind'=>$request['p_kind'], 
          'description'=>$request['description'],
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now() ));

      
          return redirect('/payment_type');
    }

}
