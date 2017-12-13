<?php

namespace App\Http\Controllers;
use App\time_unit;
use App\payment_type;
use App\subscription_view;
use App\subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function adminLTE()
    {
        return view('adminLTE');
    }    
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
        $subsc = DB::select('select * from subscription_views');      
        $subs_logs = DB::select('select * from subscription_logs');      
        $times = DB::select('select * from time_units');      
        $pays = DB::select('select * from payment_types');      
        //$eusers = DB::select('select * from users');     
        $rates = DB::select('select * from rate_plans');             
        //$packages = DB::select('select * from packages');      
        //$products = DB::select('select * from products');      
        //return view('sub_sum',['subsc'=>$subsc,'subs_logs'=>$subs_logs,'times'=>$times,'pays'=>$pays,
        //                       'eusers'=>$eusers,'rates'=>$rates,'packages'=>$packages,'products'=>$products]);
        return view('sub_sum',['subsc'=>$subsc,'subs_logs'=>$subs_logs,'times'=>$times,'pays'=>$pays,'rates'=>$rates]);

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

            $rate_plans = DB::select('select rate_plan_name from rate_plans where rate_plan_id = ?',array($request['irate_plan']));                                                    
            foreach($rate_plans as $rate_plan) 
                                        

            $eusers = DB::select('select name, email from users where id = ?',array($request['ieuser_id']));                                                    
            foreach($eusers as $euser) 

            $pay_types = DB::select('select p_kind from payment_types where payment_type_id = ?',array($request['ipay_type']));                                                    
            foreach($pay_types as $pay_type) 
            
            $time_types = DB::select('select kind from time_units where time_unit_id = ?',array($request['ipay_time']));                                                    
            foreach($time_types as $time_type) 


            DB::commit();                                                                
            $subIds = DB::select('select subscription_id, billing_date from subscriptions where user_id = ?',array($request['ieuser_id']));                                                    
            foreach($subIds as $subId) 
            $billID = $subId;
            
                DB::select('CALL calc_billing(?)',array($subId->subscription_id));
                DB::select('CALL save_sub_log(?)',array($subId->subscription_id));               

                $billIds = DB::select('select billing_date from subscriptions where subscription_id = ?',array($billID->subscription_id));                                                    
                foreach($billIds as $billId) 
                DB::table('subscription_views')->insert(array( 'subscription_view_id'=>$billID->subscription_id,
                                                                'rate_plan_id'=>$request['irate_plan'],
                                                                'rate_plan_name'=>$rate_plan->rate_plan_name,
                                                                'user_id'=>$request['ieuser_id'],
                                                                'name'=>$euser->name,
                                                                'email'=>$euser->email,
                                                                'activated_at'=>$request['iact_date'],
                                                                'billing_date'=>$billId->billing_date,
                                                                'payment_id'=>$request['ipay_type'],
                                                                'payment_type'=>$pay_type->p_kind,
                                                                'time_unit_id'=>$request['ipay_time'],
                                                                'time_type'=>$time_type->kind,                                                           
                                                                'status'=>$request['istatus'],
                                                                'description'=>$request['idescription'],
                                                                'created_at'=>\Carbon\Carbon::now(),
                                                                'updated_at'=>\Carbon\Carbon::now() ));


            DB::commit();    
            
            return redirect('/sub_sum');
    }

    public function sub_active()
    {
        /*
            $data = $request->validate([
                'iuser_id' => 'required|max:30',
                'ipay_time' => 'max:20',
                'idescription' => 'max:30',
              ]);

        */  
        /*
                DB::update('update subscription_views set status = "Suspend" where subscription_view_id =?', array($request->id));
                DB::update('update subscriptions set status = "Suspend" where subscription_id =?', array($request->id));
                DB::select('call save_sub_log(?)', array($request->id));
        */        
            return redirect('/sub_sum');
            
    }


    public function sub_active_post(Request $request)
    {
        /*
            $data = $request->validate([
                'iuser_id' => 'required|max:30',
                'ipay_time' => 'max:20',
                'idescription' => 'max:30',
              ]);

        */  
        DB::table('subscription_views')->where('subscription_view_id', '=', $request->id)
        ->update([
            'status'=>'Active',
            'activated_at'=>\Carbon\Carbon::now(),
        ]); 

        DB::table('subscription_views')->where('subscription_view_id', '=', $request->id)
        ->update([
            'status'=>'Active',
            'activated_at'=>\Carbon\Carbon::now(),
        ]); 
        /*
                DB::update('update subscription_views set status = "Active" where subscription_view_id =?', array($request->id));
                DB::update('update subscriptions set status = "Active" where subscription_id =?', array($request->id));
        */
                DB::select('call save_sub_log(?)', array($request->id));
                
            return redirect('/sub_sum');
            
    }


    public function sub_suspend()
    {
        /*
            $data = $request->validate([
                'iuser_id' => 'required|max:30',
                'ipay_time' => 'max:20',
                'idescription' => 'max:30',
              ]);

        */  
        /*
                DB::update('update subscription_views set status = "Suspend" where subscription_view_id =?', array($request->id));
                DB::update('update subscriptions set status = "Suspend" where subscription_id =?', array($request->id));
                DB::select('call save_sub_log(?)', array($request->id));
        */        
            return redirect('/sub_sum');
            
    }


    public function sub_suspend_post(Request $request)
    {
        /*
            $data = $request->validate([
                'iuser_id' => 'required|max:30',
                'ipay_time' => 'max:20',
                'idescription' => 'max:30',
              ]);

        */  
        /*
        $sub_view = new subscription_view;
        $sub_sub = new subscription;        

        $sub_view = subscription_view::where('subscription_view_id',array($request->id));
        $sub_sub = subscription::where('subscription_id',array($request->id));
        
        $sub_view->status = 'Suspend';
        $sub_view->suspended_date = \Carbon\Carbon::now();
        $sub_view->update();

        $sub_sub->status = 'Suspend';
        $sub_sub->suspended_date = \Carbon\Carbon::now();                
        $sub_sub->update();        
        */

        DB::table('subscription_views')->where('subscription_view_id', '=', $request->id)
        ->update([
            'status'=>'Suspend',
            'suspended_date'=>\Carbon\Carbon::now(),
        ]); 


        DB::table('subscriptions')->where('subscription_id', '=', $request->id)
        ->update([
            'status'=>'Suspend',
            'suspended_date'=>\Carbon\Carbon::now(),
        ]); 

            /*
                DB::update('update subscription_views set status = "Suspend", suspended_date = '.\Carbon\Carbon::now().' where subscription_view_id =?', array($request->id));
                DB::update('update subscriptions set status = "Suspend" , suspended_date = ? where subscription_id =?', array($request->id));
            */
                DB::select('call save_sub_log(?)', array($request->id));
                
            return redirect('/sub_sum');
            
    }

    public function sub_delete()
    {
        /*
        $subs = subscription::all(); //DB::select('select email from eusers;');
        
        return view('userList',['subs'=>$subs]);
        //return 'User List'.$usersview('userList',['users'=>$users]);
        */
        $subsc = DB::select('select * from subscription_views');      
        $subs_logs = DB::select('select * from subscription_logs');      
        $times = DB::select('select * from time_units');      
        $pays = DB::select('select * from payment_types');      
        //$eusers = DB::select('select * from users');     
        $rates = DB::select('select * from rate_plans');             
        //$packages = DB::select('select * from packages');      
        //$products = DB::select('select * from products');      
        //return view('sub_sum',['subsc'=>$subsc,'subs_logs'=>$subs_logs,'times'=>$times,'pays'=>$pays,
        //                       'eusers'=>$eusers,'rates'=>$rates,'packages'=>$packages,'products'=>$products]);
        return view('sub_sum',['subsc'=>$subsc,'subs_logs'=>$subs_logs,'times'=>$times,'pays'=>$pays,'rates'=>$rates]);

    }



    public function sub_delete_post(Request $request)
    {
        /*
            $data = $request->validate([
                'iuser_id' => 'required|max:30',
                'ipay_time' => 'max:20',
                'idescription' => 'max:30',
              ]);

        */  
                DB::update('update subscription_views set status = "Withdraw" where subscription_view_id =?', array($request->id));
                DB::update('update subscriptions set status = "Withdraw" where subscription_id =?', array($request->id));
                DB::select('call save_sub_log(?)', array($request->id));
                
            return redirect('/sub_sum');
            
    }






    public function product()
    {
        $products = DB::select('select * from products'); 
        $prices   = DB::select('select * from product_price_view'); 
                
        return view('product',['products'=>$products,'prices'=>$prices]);
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
        $packagesd = DB::select('select * from package_price_view');
        $packages = DB::select('select * from packages'); 
        $products = DB::select('select * from products');
        $details =  DB::select('select * from package_details_view');
        
        return view('package',['packagesd'=>$packagesd,'packages'=>$packages,'products'=>$products,'details'=>$details]);
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
            //return 'Finish package 1';


        }   
        
        if (($price_id != "") && ($price != "")) {
            
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
            //return 'Finish package price 2';
                        
        } 
        
        if ($pkname != "") {        
                $data = $request->validate([
                    'package_name' => 'required|max:30',
                    'version' => 'max:20',
                    'description' => 'max:30',
                ]);
            
        DB::table('packages')->insert(array(    'package_name'=>$pkname, 
        'version'=>$pkversion,
        'description'=>$pkdescription,
        'created_at'=>\Carbon\Carbon::now(),
        'updated_at'=>\Carbon\Carbon::now() ));

                return redirect('/package');
                    //return 'package finish 3';
        } else {
            return redirect('/package');
            //return '44444444444444444';
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
            'ipropac' => 'required',
            
          ]);


        if ($request['ipropac'] == "product") {
            DB::table('rate_plans')->insert(array('rate_plan_name'=>$request['rate_name'], 
            'type'=>$request['ipropac'],
            'selected_id'=>$request['selected_id_pro'],
            'description'=>$request['rdescription'],
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now() ));


            return redirect('/rate_plan');

        }  
        if ($request['ipropac'] == "package") {
            DB::table('rate_plans')->insert(array('rate_plan_name'=>$request['rate_name'], 
            'type'=>$request['ipropac'],
            'selected_id'=>$request['selected_id_pac'],
            'description'=>$request['rdescription'],
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>\Carbon\Carbon::now() ));


            return redirect('/rate_plan');

        }  

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

        $time_unit = new time_unit;
        $time_unit->kind = $data['kind'];
        $time_unit->description = $data['description'];
        $time_unit->save();
/*
        DB::table('time_units')->insert(array('kind'=>$request['kind'], 
                                              'description'=>$request['description'],
                                              'created_at'=>\Carbon\Carbon::now(),
                                              'updated_at'=>\Carbon\Carbon::now() ));
*/             
          
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
      
          $payment = new payment_type;
          $payment->p_kind = $data['p_kind'];
          $payment->description = $data['description'];
          $payment->save();
/*              
          DB::table('payment_types')->insert(array('p_kind'=>$request['p_kind'], 
          'description'=>$request['description'],
          'created_at'=>\Carbon\Carbon::now(),
          'updated_at'=>\Carbon\Carbon::now() ));
*/
      
          return redirect('/payment_type');
    }




}
