@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                     <h3 class="box-title-center"><h2>Users list</h2></h3> 
                    </div>
                    <div class="col-sm-4">
                     <button id="addsub"type="button" class="btn btn-success">Add User</button>
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


</div>
@endsection
