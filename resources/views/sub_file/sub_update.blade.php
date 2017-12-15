@extends('layouts.sub_update')

@section('content')
<style>
        #pack {
        position: fixed;
        top: 17%;
        left: 55%;
        
        text-align:center;
        }
        #ibtn {
        position: fixed;
        top: 40%;
        left: 63%;
        
        text-align:center;
        }        
        #pacakge_d_f {
        position:relative;
        top: 50%;
        transform: translateY(-50%);
        }
</style>


<div class="container">

    <!-- form begin -->
    <form action="{{ action('userController@sub_update_post') }}" method="post">


            <ul id="myTab" class="nav nav-tabs" role="tablist"> 
                <li role="presentation" class="active"><a data-target="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><h4>Subscription Summary</h4></a></li> 
                <li role="presentation" class=""><a data-target="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false"><h4>Subscription Logs</h4></a></li> 
                <!--
                <li role="presentation" class="dropdown"> <a data-target="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">Dropdown 
                    <span class="caret"></span></a> 
                    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents"> 
                    <li><a data-target="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">@fat</a></li> 
                    <li><a data-target="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">@mdo</a></li> 
                    </ul> 
                </li> 
                -->
            </ul> 
                <div id="myTabContent" class="tab-content"> 
                    <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab"> 
                    

                        <!-- Row start - package list -->
                        <section>
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">






            @foreach($subdesig as $subdeg)

                                <div class="row">           
                                <div class="col-sm-4">
                                {!! csrf_field() !!}
    
                                    <div class="form-group">
                                        <label for="isub_id">Subscription ID</label>
                                        <input type="text" class="form-control" id="isub_id" name="isub_id" placeholder="Subscription ID" value="{{ $subdeg->subscription_view_id }}">                                                                      
                                    
                                        <label for="ieuser_id">User ID</label>
                                        <input type="text" class="form-control" id="ieuser_id" name="ieuser_id" placeholder="User ID" value="{{ $subdeg->user_id }}">
                                    </div>
                                </div>
                        
                            </div>
                            <div class="row">    
                                <div class="col-sm-8">
                                    <div class="form-group">    
    
                                        <label for="ipay_type">Payment Type</label>
                                        <!--
                                        <input type="text" class="form-control" id="ipay_type" name="ipay_type" placeholder="Payment type" value="{{ old('ipay_type') }}">
                                        -->
                                        <select name = "ipay_type">
                                            @foreach($pays as $pay)  

                                            <option value= "{{ $pay->payment_type_id }}" 
                                            @if ($pay->payment_type_id == $subdeg->payment_id) selected= "selected"
                                            @endif>{{ $pay->p_kind }} </option>

                                            @endforeach
                                        </select>                                                                                                                                
                                    
                                        <label for="ipay_time">Payment Period</label>
                                        <!--
                                        <input type="text" class="form-control" id="ipay_time" name="ipay_time" placeholder="Payment cycle" value="{{ old('ipay_time') }}">                         
                                        -->
                                        <select name = "ipay_time">
                                            
                                            @foreach($times as $time_s)  
                                            <option value= "{{ $time_s->time_unit_id }}" 
                                            @if ($time_s->time_unit_id == $subdeg->time_unit_id) selected= "selected"
                                            @endif>{{ $time_s->kind }} </option>
                                            @endforeach

                                        </select>                                   
                                    
                                        <label for="irate_plan">Rate Plan</label>
                                        <!--
                                        <input type="text" class="form-control" id="irate_plan" name="irate_plan" placeholder="Rate Plan" value="{{ old('irate_plan') }}">
                                        -->
                                        <select name = "irate_plan">

                                            @foreach($rates as $rate)  
                                            <option value= "{{ $rate->rate_plan_id }}" 
                                            @if ($rate->rate_plan_id == $subdeg->rate_plan_id)
                                            selected= "selected" @endif> {{ $rate->rate_plan_name }} </option>
                                            @endforeach
                                        </select>                                             
                                                                                                                                                                                                    
                                        <label for="istatus">Status</label>
                                        <!--
                                        <input type="text" class="form-control" id="istatus" name="istatus" placeholder="Active" value="{{ old('istatus') }}">
                                        -->
                                        <select name = "istatus">
                                            <option value= "Active"
                                            @if ($subdeg->status == "Active")
                                            selected= "selected" @endif>Active </option>
                                            <option value= "Trial" 
                                            @if ($subdeg->status == "Trial")
                                            selected= "selected" @endif>Trial </option>
                                            <option value= "Suspend" 
                                            @if ($subdeg->status == "Suspend")
                                            selected= "selected" @endif>Suspend</option>
                                        </select>      
                                </div>
                            </div>
    
                             </div>
    
                            <div class="row">                         
                                <div class="col-sm-8">
                                                <div class="form-group">
                                                    {!! Form::label('Activation Date') !!}
                                                    {!! Form::date('iact_date', \Carbon\Carbon::now()) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="idescription">Description</label>
                                                    <textarea class="form-control" id="idescription" name="idescription" placeholder="Description">{{ $subdeg->description }}</textarea>
                                                </div>
                                                <!--
                                                <div class="form-group">
                                                    <label for="change_date">Change Date</label>
                                                    <input type="text" class="form-control" id="change_date" name="change_date" placeholder="Change Date" value="{{ old('change_date') }}">
                                                </div>  -->
                                                
                                                
                                                <button type="submit" id= "ibtn1" class="btn btn-success">Update Subscription</button>
                                </div>                          
                                
                
                            </div> <!-- row end -->
    

                            



            @endforeach  






                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <div id="output" class="container"></div>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sub ID</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email</th>                                       
                                        <th>Rate Plan</th>
                                        <th>Payment</th>                                        
                                        <th>Activation Date</th>
                                        <th>Billing Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                </tr>
                                    </thead>
                                    <tbody>
                                    <div>
                                        @foreach($subsc as $sub)  
                                    <tr>       
                                            <td> {{ $sub->subscription_view_id }} </td>
                                            <td> {{ $sub->user_id }} </td>
                                            <td> {{ $sub->name }} </td>
                                            <td> {{ $sub->email }} </td>
                                            <td> {{ $sub->rate_plan_name }} </td>
                                            <td> {{ $sub->time_type }} </td>
                                            <td> {{ $sub->activated_at }} </td>
                                            <td> {{ $sub->billing_date }} </td>
                                            <td> {{ $sub->status }} </td>
                                            <td> 
                                                <select name = "isub" id= "{{ $sub->subscription_view_id }}" onChange="makeSelect2(this)" disabled>
                                                    <option value= "None">Select Action</option>
                                                    <option value= "Update">Update</option>
                                                    <option value= "Active" >Active </option>
                                                    <option value= "Suspend" >Suspend </option>
                                                    <option value= "Withdraw" >Withdraw</option>
                                                </select>                                                                                        
                                            </td>
                                    </tr>           
                                        @endforeach  
                                </div> 
                                            
                                    </tbody>
                                    <tfoot>
                                    <tr>

                                        <th>Sub ID</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Email</th>                                       
                                        <th>Rate Plan</th>
                                        <th>Payment</th>                                        
                                        <th>Activation Date</th>
                                        <th>Billing Date</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->                                           
                        </section>
                        <!-- Row end - package list -->
                    </div>
        
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab"> 
                        <div class="row">
                        </div> <!-- temp row -->


                        <!-- Row start - package detail list -->
                        <section>
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">




                        <!-- Row start - subscription input -->
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-inline">
                                    <label for="sub_id">Subscription ID</label>
                                    <input type="text" class="form-control" id="sub_id" name="sub_id" placeholder="Subscription ID" value="{{ old('sub_id') }}">                                                                    
                            
                                
                                    <label for="euser_id">User ID</label>
                                    <input type="text" class="form-control" id="euser_id" name="euser_id" placeholder="User ID" value="{{ old('euser_id') }}">                                    
                            
                            
                                    <button type="submit" id= "sub_f" class="btn btn-success">Search Subscription logs</button>

                                </div>

                            </div>
                        </div>
                        <!-- Row end - subscription input -->






    </form> 
    <!-- form end -->
                                
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Subscription log ID</th>
                                        <th>Subscription ID</th>
                                        <th>User ID</th>
                                        <th>Activation date</th>
                                        <th>Billing date</th>
                                        <th>Updated date</th>
                                        <th>Status</th>
                                </tr>
                                    </thead>
                                    <tbody>
                                    <div>
                                        @foreach($subs_logs as $subs_log)  
                                    <tr>       
                                            <td> {{ $subs_log->subscription_log_id }} </td>
                                            <td> {{ $subs_log->subscription_id }} </td>
                                            <td> {{ $subs_log->user_id }} </td>
                                            <td> {{ $subs_log->activated_at }} </td>
                                            <td> {{ $subs_log->billing_date }} </td>
                                            <td> {{ $subs_log->updated_at }} </td>
                                            <td> {{ $subs_log->status }} </td>
                                    </tr>           
                                        @endforeach  
                                </div> 
                                            
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Subscription log ID</th>
                                        <th>Subscription ID</th>
                                        <th>User ID</th>
                                        <th>Activation date</th>
                                        <th>Billing date</th>
                                        <th>Updated date</th>
                                        <th>Status</th>
                                    </tr>
                                    </tfoot>
                                </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->                                           
                        </section>
                        <!-- Row end - package list -->


                    </div> 
                </div> 
        

</div>
<script src="/axios/dist/axios.min.js"></script>
<script>

        function makeSelect2(itype2)
        {
          var ivalue2 = itype2.value;  
          var output2 = document.getElementById('output');
            if (ivalue2 == "Update")
            {
                //alert("Update ID no : " + itype.id);

                axios.get('{{route('sub_update')}}',{                
                    params:{                
                      id: itype.id
                    }  
                   }).then(function(res) {
    
                       output.className = 'container';
                       output.innerHTML = res.data;
                   }).then(()=>{
                                    $("#example1").DataTable({
                                        "paging": true,
                                        "lengthChange": false,
                                        "searching": false,
                                        "ordering": true,
                                        "info": true,
                                        "autoWidth": false
                                    });
    
                                    $('#example2').DataTable({
                                    "paging": true,
                                    "lengthChange": false,
                                    "searching": false,
                                    "ordering": true,
                                    "info": true,
                                    "autoWidth": false
                                    });
                              }).catch(function(err) {
                                    output.className = 'container';
                                    output.innerHTML = err.data;
    
                   });
            }
            if (ivalue2 == "Active")
            {
             //   alert("Active ID no : " + itype.id  );
                axios.post('{{route('sub_active')}}',
                {id : itype2.id}).then(function(res) {
                    //output.className = 'container';
                    //output.innerHTML = res.data;

                });
            }

            if (ivalue2 =="Suspend")
            {
             //   alert("Suspend ID no : " + itype.id  );
                axios.post('{{route('sub_suspend')}}',
                {id : itype2.id}).then(function(res) {
                    //output.className = 'container';
                    //output.innerHTML = res.data;

                });

            }
            if (itype2.value == "Withdraw")
            {
            //    alert("Withdraw ID no : " + itype.id );
                axios.post('{{route('sub_delete')}}',
                {id : itype2.id}).then(function(res) {
                    //output.className = 'container';
                    //output.innerHTML = res.data;

                });

            }

        }     



    </script>

@endsection





