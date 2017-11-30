@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Product Features</h1>
            <form action="{{route('product')}}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                    @if($errors->has('title'))
                        <span class="help-block">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                    <label for="url">Url</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{ old('url') }}">
                    @if($errors->has('url'))
                        <span class="help-block">{{ $errors->first('url') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <section>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                    <h3 class="box-title-center"><h2>Products list</h2></h3> 
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
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
    </div>
@endsection