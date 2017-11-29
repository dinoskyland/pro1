<div class="wrapper">  
    <!-- Main content -->

    <section class="content">
    <div container>
       <ul class="nav nav-tabs" >
            <li class="active"><a href="#">Subscription summary</a></li>
            <li><a href="#">Product features</a></li>
            <li><a href="#">Search subscriptions</a></li>
        </ul>
     
    </div>  
  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                     <h3 class="box-title-center"><h2>Subscription lists</h2></h3> 
                    </div>
                    <div class="col-sm-4">
                     <button id="addsub"type="button" class="btn btn-success">Add Subscription</button>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Subscription_id</th>
                  <th>User_id</th>
                  <th>Activated_at</th>
                  <th>Billing_date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <div>
                          @foreach($subs as $sub)  
                     <tr>       
                            <td> {{ $sub->subscription_id }} </td>
                            <td> {{ $sub->user_id }} </td>
                            <td> {{ $sub->activated_at }} </td>
                            <td> {{ $sub->billing_date }} </td>
                            <td> {{ $sub->status }} </td>
                     </tr>           
                          @endforeach  
                  </div> 
                          
                </tbody>
                <tfoot>
                <tr>
                <th>Subscription_id</th>
                <th>User_id</th>
                <th>Activated_at</th>
                <th>Billing_date</th>
                <th>Status</th>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- ./wrapper -->
</div>  