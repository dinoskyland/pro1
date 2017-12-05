@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
        <li class="active"><a href="#">Home</a></li>
        </li>
        <li><a href="#">Menu 2</a></li>
        <li><a href="#">Menu 3</a></li>
        </ul>

        <div class="row">
            <h1>Package Base Information</h1>
        </div>
        <div class="row">  
          <div class="col-sm-6" >
            <h3>Package Input</h3>

            <form action="{{route('package')}}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="pro_name">Product Name</label>
                    <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Product name" value="{{ old('pro_name') }}">
                    @if($errors->has('pro_name'))
                        <span class="help-block">{{ $errors->first('pro_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('vesrion') ? ' has-error' : '' }}">
                    <label for="version">Version</label>
                    <input type="text" class="form-control" id="version" name="version" placeholder="Version" value="{{ old('version') }}">
                    @if($errors->has('version'))
                        <span class="help-block">{{ $errors->first('version') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('pro_description') ? ' has-error' : '' }}">
                    <label for="pro_description">Description</label>
                    <textarea class="form-control" id="pro_description" name="pro_description" placeholder="Description">{{ old('pro_description') }}</textarea>
                    @if($errors->has('pro_description'))
                        <span class="help-block">{{ $errors->first('pro_description') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Save Product information</button>
            </form>

          </div>

          <div class="col-sm-6" >
            <h3>Package Price</h3>

            <form action="{{route('package')}}" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('pk_name') ? ' has-error' : '' }}">
                    <label for="pk_name">Package Type</label>
                    <input type="text" class="form-control" id="pk_name" name="pk_name" placeholder="Package name" value="{{ old('pk_name') }}">
                    @if($errors->has('pk_name'))
                        <span class="help-block">{{ $errors->first('pk_name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('pk_version') ? ' has-error' : '' }}">
                    <label for="pk_version">Version</label>
                    <input type="text" class="form-control" id="pk_version" name="pk_version" placeholder="version" value="{{ old('pk_version') }}">
                    @if($errors->has('pk_version'))
                        <span class="help-block">{{ $errors->first('pk_version') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                        <span class="help-block">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Save Package information</button>
            </form>
            
          </div>


        </div>

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
    </div>
@endsection