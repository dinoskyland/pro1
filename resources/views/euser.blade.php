@extends('layouts.app')

@section('content')
<div class="container">

<ul id="myTab" class="nav nav-tabs" role="tablist"> 
                <li role="presentation" class="active"><a data-target="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><h4>User Information</h4></a></li> 
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
                    <div class="col-sm-4">
                     <a href="{{ url('/register') }}" id="addsub" type="button" class="btn btn-success">Add User<a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User_id</th>
                  <th>Email</th>
                  <th>Creation Date</th>
                  <th>Register</th>
                </tr>
                </thead>
                <tbody>
                  <div>
                          @foreach($eusers as $euser)  
                     <tr>       
                            <td> {{ $euser->id }} </td>
                            <td> {{ $euser->email }} </td>
                            <td> {{ $euser->created_at }} </td>
                            <td> {{ $euser->register_id }} </td>
                     </tr>           
                          @endforeach  
                  </div> 
                          
                </tbody>
                <tfoot>
                <tr>
                <th>User_id</th>
                <th>Email</th>
                <th>Creation Date</th>
                <th>Register</th>
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



  </div><!-- myTab end -->
  </div><!-- tabpanel end -->



</div>


@endsection
