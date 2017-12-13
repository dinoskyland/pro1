@extends('layouts.app')

@section('content')
    <div class="container">
    <!--
       <div class="row">
          <h1>Time Unit Management</h1>
       </div> 
    -->

    <ul id="myTab" class="nav nav-tabs" role="tablist"> 
                <li role="presentation" class="active"><a data-target="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><h4>Time Unit Information</h4></a></li> 
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            

    
            <div class="row">
           <div class="col-sm-8">
                        
                <form class="form-inline"  name="time" action="{{route('time_unit')}}" method="post">
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

    </div> <!-- tabpanel end -->
    </div> <!-- myTabContent end -->



    </div>
    
@endsection