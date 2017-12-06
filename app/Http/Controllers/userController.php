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
        $eusers = DB::select('select * from users');
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
        $subsc = DB::select('select * from subscriptions');      
        $subs_logs = DB::select('select * from subscription_logs');      
        $times = DB::select('select * from time_units');      
        $pays = DB::select('select * from payment_types');      
        $eusers = DB::select('select * from users');     
        $rates = DB::select('select * from rate_plans');             
        $packages = DB::select('select * from packages');      
        $products = DB::select('select * from products');      
        return view('sub_sum',['subsc'=>$subsc,'subs_logs'=>$subs_logs,'times'=>$times,'pays'=>$pays,
                               'eusers'=>$eusers,'rates'=>$rates,'packages'=>$packages,'products'=>$products]);
    }

    public function sub_sum_post(Request $request)
    {
        /*
            $data = $request->validate([
                'iuser_id' => 'required|max:30',
                'ipay_time' => 'max:20',
                'idescription' => 'max:30',
              ]);
        */  
          
            DB::table('subscriptions')->insert(array(  'rate_plan_id'=>$request['irate_plan'], 
                                                    'user_id'=>$request['ieuser_id'],
                                                    'activated_at'=>$request['iact_date'],
                                                    'payment_id'=>$request['ipay_type'],
                                                    'time_unit_id'=>$request['ipay_time'],
                                                    'status'=>$request['istatus'],
                                                    'description'=>$request['idescription'],
                                                    'created_at'=>\Carbon\Carbon::now(),
                                                    'updated_at'=>\Carbon\Carbon::now() ));
            /*
            $subId = DB::select('select subscription_id from subscriptions where user_id = :id',['id'=>$request['ieuser_id']]);                                                    
            DB::table('subscription_logs')->insert(array('subscription_id'=>$subId,  
                                                    'rate_plan_id'=>$request['irate_plan'], 
                                                    'user_id'=>$request['iuser_id'],
                                                    'activated_at'=>$request['iact_date'],
                                                    'payment_id'=>$request['ipay_type'],
                                                    'time_unit_id'=>$request['ipay_time'],
                                                    'status'=>$request['istatus'],
                                                    'description'=>$request['idescription'],
                                                    'created_at'=>\Carbon\Carbon::now(),
                                                    'updated_at'=>\Carbon\Carbon::now() ));
            */
            return view('sub_sum');
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
     //variable definition
        $pk_id = $request['package_id'];
        $pro_id = $request['product_id'];

        $pkname = $request['package_name'];
        $pkversion = $request['version'];
        $pkdescription = $request['description'];

        $price_id = $request['pk_id'];
        $price = $request['price'];
        $price_description = $request['pdescription'];
        $price_change = $request['change_date'];

//        if (($request['package_id'] != "") && ($request['product_id'] != "")) {
        if (($pk_id != "") && ($pro_id != "")) {
            $data = $request->validate([
                'package_id' => 'required',
                'product_id' => 'required',
              ]);
          
          /*
              DB::table('package_details')->insert(array('package_id'=>$request['package_id'], 
                                                        'product_id'=>$request['product_id'],
                                                        'created_at'=>\Carbon\Carbon::now(),
                                                        'updated_at'=>\Carbon\Carbon::now() ));
         */
        DB::table('package_details')->insert(array('package_id'=>$pk_id, 
        'product_id'=>$pro_id,
        'created_at'=>\Carbon\Carbon::now(),
        'updated_at'=>\Carbon\Carbon::now() ));

         return redirect('/package');
              //return 'Finish price result';


        }   
        
        if ($price_id != "") {
            
                        $data = $request->validate([
                            'pk_id' => 'required',
                            'price' => 'max:20',
                            'pdescription' => 'max:30',
                            'change_date'=> 'required'
                          ]);
                      
          /*            
                          DB::table('package_prices')->insert(array('package_id'=>$request['dpackage_id'], 
                                                                    'price'=>$request['price'],
                                                                    'description'=>$request['pdescription'],
                                                                    'change_date'=>$request['change_date'],
                                                                    'created_at'=>\Carbon\Carbon::now(),
                                                                    'updated_at'=>\Carbon\Carbon::now() ));
            */      
    
            DB::table('package_prices')->insert(array('package_id'=>$price_id, 
            'price'=>$price,
            'description'=>$price_description,
            'change_date'=>$price_change,
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now() ));

            return redirect('/package');
                          //return 'Finish price result';
                        
        } 
        
        if ($pkname != "") {        
                $data = $request->validate([
                    'package_name' => 'required|max:30',
                    'version' => 'max:20',
                    'description' => 'max:30',
                ]);
            
            /*
                DB::table('packages')->insert(array(    'package_name'=>$request['package_name'], 
                                                        'version'=>$request['version'],
                                                        'description'=>$request['description'],
                                                        'created_at'=>\Carbon\Carbon::now(),
                                                        'updated_at'=>\Carbon\Carbon::now() ));
*/
        DB::table('packages')->insert(array(    'package_name'=>$pkname, 
        'version'=>$pkversion,
        'description'=>$pkdescription,
        'created_at'=>\Carbon\Carbon::now(),
        'updated_at'=>\Carbon\Carbon::now() ));

                return redirect('/package');
        } else {
            return redirect('/package');
        }  
    }

    public function rate_plan()
    {

        $rates =      DB::select('select * from rate_plans');     
        $packages = DB::select('select * from packages');     
        $products = DB::select('select * from products');     
        
        return view('rate_plan',['rates'=>$rates,'packages'=>$packages,'products'=>$products]);
    }

    public function rate_plan_post(Request $request)
    {
        $data = $request->validate([
            'rate_name' => 'required',
            'type' => 'required',
            'selected_id'=>'required',            
          ]);

        DB::table('rate_plans')->insert(array('rate_plan_name'=>$request['rate_name'], 
                                              'type'=>$request['type'],
                                              'selected_id'=>$request['selected_id'],
                                              'description'=>$request['rdescription'],
                                              'created_at'=>\Carbon\Carbon::now(),
                                              'updated_at'=>\Carbon\Carbon::now() ));
             
          
          return redirect('/rate_plan');
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
