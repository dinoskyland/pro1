@extends('layouts.app')

@section('content')

<div id="output" class="container">

    <!-- form begin -->
    <form action="{{ action('userController@sub_sum_post') }}" method="post">


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
                    <div class="col-sm-4">
<!--            
                    @foreach($eusers as $euser)  
                        <select name = "isub" id= "{{ $euser->id }}" onChange="makeSelect1(this)">
                            <option value= "Update">Update</option>
                            <option value= "Active" >Active </option>
                            <option value= "Suspend" >Suspend </option>
                            <option value= "Withdraw" >Withdraw</option>
                        </select>                                                                                        
                    @endforeach    
-->                    
                    </div>

                </div>
            </div>
            <div id ="output1"></div>
</form> 
    <!-- form end -->            
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


<script src="/axios/dist/axios.min.js"></script>
<script>

        function makeSelect1(itype1)
        {
          var ivalue1 = itype1.value;  
          var output1 = document.getElementById('output');
            if (ivalue1 == "Update")
            {
                alert("Update ID no : " + itype1.id);
               axios.get('{{route('adminLTE')}}',{                
                 params:{                
                   id: itype1.id
                 }
                 }).then(function(res) {

                    output1.className = 'container';
                    output1.innerHTML = res.data;
                    
                })
                .catch(function(err) {
                  output1.className = 'container';
                    output1.innerHTML = err.data;

                });
            }
            if (ivalue1 == "Active")
            {
                alert("Active ID no : " + itype1.id  );
                axios.post('{{route('sub_active')}}',
                {id : itype1.id}).then(function(res) {
                    //output.className = 'container';
                    //output.innerHTML = res.data;

                });
            }

            if (ivalue1 =="Suspend")
            {
             //   alert("Suspend ID no : " + itype.id  );
                axios.post('{{route('sub_suspend')}}',
                {id : itype1.id}).then(function(res) {
                    //output.className = 'container';
                    //output.innerHTML = res.data;

                });

            }
            if (itype1.value == "Withdraw")
            {
            //    alert("Withdraw ID no : " + itype.id );
                axios.post('{{route('sub_delete')}}',
                {id : itype1.id}).then(function(res) {
                    //output.className = 'container';
                    //output.innerHTML = res.data;

                });

            }

        }     



</script>


@endsection

