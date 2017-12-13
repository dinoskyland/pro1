@extends('layouts.app')

@section('content')
    <div class="container">
        <ul id="myTab" class="nav nav-tabs" role="tablist"> 
                <li role="presentation" class="active"><a data-target="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><h4>Rate Plan Management</h4></a></li> 
                <li role="presentation" class=""><a data-target="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false"><h4>Packages List</h4></a></li> 
                <li role="presentation" class=""><a data-target="#profile1" role="tab" id="profile-tab1" data-toggle="tab" aria-controls="profile1" aria-expanded="false"><h4>Products List</h4></a></li> 
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




                            <section>

                            <div class="row">
                                <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">









                                    <div class="row">  
                                    <div class="col-sm-6" >
                                        <h3>Rate Plan Input</h3>
                                                                                                                                                                                
                                        <form action="{{action('userController@rate_plan_post')}}" method="post">
                                        
                                            {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <label for="rate_name">Rate Plan Name</label>
                                                    <input type="text" class="form-control" id="rate_name" name="rate_name" placeholder="Rate Plan name" value="{{ old('rate_name') }}">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="type">Product/Package</label>
                                                    <!--
                                                    <input type="text" class="form-control" id="type" name="type" placeholder="Product or Package" value="{{ old('type') }}">
                                                    -->
                                                    <select name = "ipropac" onChange="makeSelect(this)">
                                                        <option value= "product" >Product</option>
                                                        <option value= "package" >Package</option>
                                                    </select>                                               

                                                </div>
                                                <div class="form-group">
                                                    <label for="selected_id_pro">Product ID</label>
                                                    <!--
                                                    <input type="text" class="form-control" id="selected_id" name="selected_id" placeholder="Product or Package" value="{{ old('selected_id') }}">
                                                    -->
                                                    <select name = "selected_id_pro" id= "selected_id_pro">
                                                    @foreach($products as $product)  
                                                    <option value= "{{ $product->product_id }}" >{{ $product->product_name }} </option>
                                                    @endforeach
                                                    </select>                                             

                                                    <label for="selected_id_pac">Package ID</label>
                                                    <!--
                                                    <input type="text" class="form-control" id="selected_id" name="selected_id" placeholder="Product or Package" value="{{ old('selected_id') }}">
                                                    -->
                                                    <select name = "selected_id_pac" id= "selected_id_pac">
                                                    @foreach($packages as $package)  
                                                    <option value= "{{ $package->package_id }}" >{{ $package->package_name }} </option>
                                                    @endforeach
                                                    </select>                                             


                                                </div>

                                                <div class="form-group">
                                                    <label for="rdescription">Description</label>
                                                    <textarea class="form-control" id="rdescription" name="rdescription" placeholder="Description">{{ old('rdescription') }}</textarea>
                                                </div>
                                                <!--
                                                <div class="form-group">
                                                    <label for="change_date">Change Date</label>
                                                    <input type="text" class="form-control" id="change_date" name="change_date" placeholder="Change Date" value="{{ old('change_date') }}">
                                                </div> 
                                                <div class="form-group">
                                                    {!! Form::label('Change Date') !!}
                                                    {!! Form::date('change_date', \Carbon\Carbon::now()) !!}
                                                </div>    -->            
                                                
                                            <button type="submit" id= "rate_f" class="btn btn-success">Save Rate Plan information</button>

                                        </form>

                                    </div>
                            </div>











                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Rate Plan ID</th>
                                            <th>Rate Plan Name</th>
                                            <th>Type</th>
                                            <th>Selected ID</th>                    
                                            <th>Description</th>
                                            <th>Creation Date</th>
                                    </tr>
                                        </thead>
                                        <tbody>
                                        <div>
                                            @foreach($rates as $rate)  
                                        <tr>       
                                                <td> {{ $rate->rate_plan_id }} </td>
                                                <td> {{ $rate->rate_plan_name }} </td>
                                                <td> {{ $rate->type }} </td>
                                                <td> {{ $rate->selected_id }} </td>
                                                <td> {{ $rate->description }} </td>
                                                <td> {{ $rate->created_at }} </td>
                                        </tr>           
                                            @endforeach  
                                    </div> 
                                                
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>Rate Plan ID</th>
                                                <th>Rate Plan Name</th>
                                                <th>Type</th>
                                                <th>Selected ID</th>                    
                                                <th>Description</th>
                                                <th>Creation Date</th>
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
                            
                    </div>
                    <!-- tabpanel home-tab end -->
                    <!-- tabpanel profile-tab start -->
                    <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <div class="row">
                            <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <!--
                                    <div class="row">
                                        <div class="col-sm-8">
                                        <h3 class="box-title-center"><h2>Packages list</h2></h3> 
                                        </div>
                                    </div>
                                -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Package ID</th>
                                        <th>Package Name</th>
                                        <th>Version</th>
                                        <th>Description</th>
                                        <th>Creation Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <div>
                                        @foreach($packages as $package)  
                                    <tr>       
                                            <td> {{ $package->package_id }} </td>
                                            <td> {{ $package->package_name }} </td>
                                            <td> {{ $package->version }} </td>
                                            <td> {{ $package->description }} </td>
                                            <td> {{ $package->created_at }} </td>
                                    </tr>           
                                        @endforeach  
                                </div> 
                                            
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                    <th>Package ID</th>
                                    <th>Package Name</th>
                                    <th>Version</th>
                                    <th>Description</th>
                                    <th>Creation Date</th>
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



                    </div>
                    <!-- tabpanel profile-tab end -->
                    <!-- tabpanel profile-tab1 start -->
                    <div role="tabpanel" class="tab-pane fade" id="profile1" aria-labelledby="profile-tab1">

                    <div class="row">
                        <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">


















                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                            <table id="example3" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Version</th>
                                    <th>Description</th>
                                    <th>Creation Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <div>
                                    @foreach($products as $product)  
                                <tr>       
                                        <td> {{ $product->product_id }} </td>
                                        <td> {{ $product->product_name }} </td>
                                        <td> {{ $product->version }} </td>
                                        <td> {{ $product->description }} </td>
                                        <td> {{ $product->created_at }} </td>
                                </tr>           
                                    @endforeach  
                            </div> 
                                        
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Version</th>
                                    <th>Description</th>
                                    <th>Creation Date</th>
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


                    </div>
                    <!-- tabpanel profile-tab1 end -->

    </div>
    <script>
        function makeSelect(itype)
        {
            
            if (itype.value == "product")
            {
                
                document.getElementById("selected_id_pro").disabled = false; 
                document.getElementById("selected_id_pac").disabled = true;               
            }
            if (itype.value =="package")
            {
                document.getElementById("selected_id_pro").disabled = true;
                document.getElementById("selected_id_pac").disabled = false;
            }
        }     
    </script>
@endsection