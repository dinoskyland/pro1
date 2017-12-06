@extends('layouts.app')

@section('content')
<style>
        #pack {
        position: fixed;
        top: 20%;
        left: 55%;
        
        text-align:center;
        }
        #pacakge_d_f {
        position:relative;
        top: 50%;
        transform: translateY(-50%);
        }
</style>


    <div class="container">



    <form action="{{ action('userController@package_post') }}" method="post">

            <ul id="myTab" class="nav nav-tabs" role="tablist"> 
                <li role="presentation" class="active"><a data-target="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><h4>Package Base Information</h4></a></li> 
                <li role="presentation" class=""><a data-target="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false"><h4>Package Details Information</h4></a></li> 
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
                                                <label for="package_name">Package Name</label>
                                                <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Package name" value="{{ old('package_name') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="version">Version</label>
                                                <input type="text" class="form-control" id="version" name="version" placeholder="Version" value="{{ old('version') }}">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>                         
                                            </div>
                                            
                                            <button type="submit" id= "package_f" class="btn btn-success">Save Package information</button>                
                                        </div>
                                        
                                        <div class="col-sm-6">
                                                <!--
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger" role="alert">
                                                            Please fix the following errors
                                                        </div>
                                                    @endif
                                                -->
                                                    <div class="form-group">
                                                        <label for="pk_id">Package Name</label>
                                                        <input type="text" class="form-control" id="pk_id" name="pk_id" placeholder="Package name" value="{{ old('pk_id') }}">
                                                    </div>
                                                
                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pdescription">Description</label>
                                                        <textarea class="form-control" id="pdescription" name="pdescription" placeholder="Description">{{ old('pdescription') }}</textarea>
                                                    </div>
                                                    <!--
                                                    <div class="form-group">
                                                        <label for="change_date">Change Date</label>
                                                        <input type="text" class="form-control" id="change_date" name="change_date" placeholder="Change Date" value="{{ old('change_date') }}">
                                                    </div>  -->
                                                    <div class="form-group">
                                                        {!! Form::label('Change Date') !!}
                                                        {!! Form::date('change_date', \Carbon\Carbon::now()) !!}
                                                    </div>                
                                                    
                                                <button type="submit" id= "price_f" class="btn btn-success">Save Price information</button>
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
                                            <h3 class="box-title-center"><h2>Packages list</h2></h3> 
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
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
                                        <label for="package_id">Package ID</label>
                                        <input type="text" class="form-control" id="package_id" name="package_id" placeholder="Package ID" value="{{ old('pacakge_id') }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="product_id">Product ID</label>
                                        <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Product ID" value="{{ old('product_id') }}">
                                    </div>
                                </div>
                                <div id= "pack" class="col-sm-4">
                                    <button type="submit" id= "package_d_f" class="btn btn-success">Save Package Details</button>
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
                                            <h3 class="box-title-center"><h2>Package details list</h2></h3> 
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Package ID</th>
                                            <th>Package Name</th>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
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
                                        <th>Product ID</th>
                                        <th>Product Name</th>
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

                        <!-- Row end - package list -->


                    </div> 
                </div> 
        
    </form> <!-- form end -->

    

    </div>
@endsection