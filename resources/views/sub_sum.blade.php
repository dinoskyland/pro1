@extends('layouts.app')

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
    <form action="{{ action('userController@sub_sum_post') }}" method="post">

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
                        <div class="row">           
                    
                            
                                        <div class="col-sm-6">
                                        {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label for="ieuser_id">User ID</label>
                                                <input type="text" class="form-control" id="ieuser_id" name="ieuser_id" placeholder="User ID" value="{{ old('ieuser_id') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="ipay_type">Payment Type</label>
                                                <input type="text" class="form-control" id="ipay_type" name="ipay_type" placeholder="Payment type" value="{{ old('ipay_type') }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="ipay_time">Payment Period</label>
                                                <input type="text" class="form-control" id="ipay_time" name="ipay_time" placeholder="Payment cycle" value="{{ old('ipay_time') }}">                         
                                            </div>
                                            <div class="form-group">
                                                <label for="irate_plan">Rate Plan</label>
                                                <input type="text" class="form-control" id="irate_plan" name="irate_plan" placeholder="Rate Plan" value="{{ old('irate_plan') }}">
                                            </div>

                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="istatus">Status</label>
                                                <input type="text" class="form-control" id="istatus" name="istatus" placeholder="Active" value="{{ old('istatus') }}">
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('Activation Date') !!}
                                                {!! Form::date('iact_date', \Carbon\Carbon::now()) !!}
                                            </div>                                                      
                                            <div class="form-group">
                                                <label for="idescription">Description</label>
                                                <textarea class="form-control" id="idescription" name="idescription" placeholder="Description">{{ old('idescription') }}</textarea>
                                            </div>
                                            <!--
                                            <div class="form-group">
                                                <label for="change_date">Change Date</label>
                                                <input type="text" class="form-control" id="change_date" name="change_date" placeholder="Change Date" value="{{ old('change_date') }}">
                                            </div>  -->
                                            
                                            <button type="submit" id= "ibtn" class="btn btn-success">Add Subscription</button>
                                        </div>                             
                            
            
                        </div> <!-- row end -->

                        <!-- Row start - package list -->
                        <section>
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                        <h3 class="box-title-center"><h2>Subscriptions list</h2></h3> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Subscription ID</th>
                                        <th>User ID</th>
                                        <th>Rate Plan</th>
                                        <th>Payment Cycle</th>                                        
                                        <th>Activation Date</th>
                                        <th>Billing Date</th>
                                        <th>Status</th>
                                </tr>
                                    </thead>
                                    <tbody>
                                    <div>
                                        @foreach($subsc as $sub)  
                                    <tr>       
                                            <td> {{ $sub->subscription_id }} </td>
                                            <td> {{ $sub->user_id }} </td>
                                            <td> {{ $sub->rate_plan_id }} </td>
                                            <td> {{ $sub->time_unit_id }} </td>
                                            <td> {{ $sub->activated_at }} </td>
                                            <td> {{ $sub->billing_date }} </td>
                                            <td> {{ $sub->status }} </td>
                                    </tr>           
                                        @endforeach  
                                </div> 
                                            
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Subscription ID</th>
                                        <th>User ID</th>
                                        <th>Rate Plan</th>
                                        <th>Payment Cycle</th>                                        
                                        <th>Activation Date</th>
                                        <th>Billing Date</th>
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
        
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab"> 
                        <div class="row">
                        </div> <!-- temp row -->

                        <!-- test code
                        <div class="btn-group"> <a class="btn btn-default dropdown-toggle btn-select" href="#" data-toggle="dropdown">Package Name<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                            @foreach($packages as $package)  
                                                <li><a href="#">{{ $package->package_name }}</a></li>
                                            @endforeach 
                                            </ul>
                        </div>  test code --> 

                        <!-- Row start - package detail input -->
                        <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="sub_id">Subscription ID</label>
                                        <input type="text" class="form-control" id="sub_id" name="sub_id" placeholder="Subscription ID" value="{{ old('sub_id') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="euser_id">User ID</label>
                                        <input type="text" class="form-control" id="euser_id" name="euser_id" placeholder="User ID" value="{{ old('euser_id') }}">
                                    </div>
                                </div>
                                <div id= "pack" class="col-sm-4">
                                    <button type="submit" id= "sub_f" class="btn btn-success">Search Subscription logs</button>
                                </div>
                        </div>
                        <!-- Row end - package detail input -->
                        <!-- Row start - package detail list -->
                        <section>
                        <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h3 class="box-title-center"><h2>Subscriptions list</h2></h3> 
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Subscription_id</th>
                                        <th>User_id</th>
                                        <th>Activated_at</th>
                                        <th>Billing_date</th>
                                        <th>Status</th>
                                </tr>
                                    </thead>
                                    <tbody>
                                    <div>
                                        @foreach($subsc as $sub)  
                                    <tr>       
                                            <td> {{ $sub->subscription_id }} </td>
                                            <td> {{ $sub->user_id }} </td>
                                            <td> {{ $sub->activated_at }} </td>
                                            <td> {{ $sub->billing_date }} </td>
                                            <td> {{ $sub->status }} </td>
                                    </tr>           
                                        @endforeach  
                                </div> 
                                            
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Subscription_id</th>
                                        <th>User_id</th>
                                        <th>Activated_at</th>
                                        <th>Billing_date</th>
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
        
    </form> 
    <!-- form end -->

</div>

@endsection





