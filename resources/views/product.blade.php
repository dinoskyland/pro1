@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Product Input Management</h1>
        </div>
        <div class="row">  
                      
            <!-- <form action="{{route('product')}}" method="post"> -->
            <form action="{{ action('userController@product') }}" method="post">

                <div class="col-sm-6">
                {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name" value="{{ old('product_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="version">Version</label>
                        <input type="text" class="form-control" id="version" name="version" placeholder="Version" value="{{ old('version') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>                         
                    </div>
                    
                    <button type="submit" id= "product_f" class="btn btn-success">Save Product information</button>                
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
                            <label for="product_id">Product Name</label>
                            <!--
                            <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Product name" value="{{ old('product_id') }}">
                            -->
                            <select name = "product_id">
                                        @foreach($products as $product)  
                                        <option value= "{{ $product->product_id }}" >{{ $product->product_name }} </option>
                                        @endforeach
                            </select>                                             
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="pdescription" placeholder="Description">{{ old('pdescription') }}</textarea>
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

            </form>

          </div>
                
        <div class="row">
            <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        <!--
                            <div class="row">
                                <div class="col-sm-8">
                                <h3 class="box-title-center"><h2>Products list</h2></h3> 
                                </div>
                            </div>
                        -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Version</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Creation Date</th>
                        </tr>
                            </thead>
                            <tbody>
                            <div>
                                @foreach($prices as $price)  
                            <tr>       
                                    <td> {{ $price->product_id }} </td>
                                    <td> {{ $price->product_name }} </td>
                                    <td> {{ $price->version }} </td>
                                    <td> {{ $price->price }} </td>
                                    <td> {{ $price->description }} </td>
                                    <td> {{ $price->created_at }} </td>
                            </tr>           
                                @endforeach  
                        </div> 
                                    
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Version</th>
                                <th>Price</th>
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
        
    </div>

@endsection