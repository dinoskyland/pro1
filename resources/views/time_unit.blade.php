@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
          <h1>Time Unit Management</h1>
       </div> 
        <div class="row">
           <div class="col-sm-6">
                        
                <form name="time" action="{{route('time_unit')}}" method="post">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            Please fix the following errors
                        </div>
                    @endif

                    {!! csrf_field() !!}
                    <div class="form-group{{ $errors->has('kind') ? ' has-error' : '' }}">
                        <label for="kind">Time unit</label>
                        <input type="text" class="form-control" id="kind" name="kind" placeholder="Time unit" value="{{ old('kind') }}">
                        @if($errors->has('kind'))
                            <span class="help-block">{{ $errors->first('kind') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="{{ old('description') }}">
                        @if($errors->has('description1'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <button id="time_save" type="submit" class="btn btn-success">Save Time unit</button>
                </form>
            </div>

        </div>

        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                    <h3 class="box-title-center"><h2>Time Units list</h2></h3> 
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Time unit ID</th>
                    <th>Time unit Type</th>
                    <th>Creation Date</th>
            </tr>
                </thead>
                <tbody>
                  <div>
                      @foreach($timeunits as $timeunit)  
                  <tr>       
                        <td> {{ $timeunit->time_unit_id }} </td>
                        <td> {{ $timeunit->kind }} </td>
                        <td> {{ $timeunit->created_at }} </td>
                  </tr>           
                      @endforeach  
            </div> 
                          
                </tbody>
                <tfoot>
                <tr>
                    <th>Time unit ID</th>
                    <th>Time unit Type</th>
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
    
@endsection