<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-tools | Subscription</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>

  .content {
      background-color: black;
  }
  #addsub {
      margin-left: 330px;
      margin-top: 21px;
  }
  
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">  

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
                    <?php
/*
                          $sql   = "SELECT subscription_id, user_id, activated_at, billing_date, status FROM subscriptions";

                          $result = $connClis->query($sql);

                          //echo "<option id='all'>All</option>";
                          if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                           // echo $row['pl_protocol_cd'];
                           //echo "<option id='{$row['user_id']}'>{$row['user_id']}</option>";
        
                            echo "<tr>
                            <td>{$row['subscription_id']}</td>
                            <td>{$row['user_id']}</td>
                            <td>{$row['activated_at']}</td>
                            <td>{$row['billing_date']}</td>
                            <td>{$row['status']}</td>
                            </tr>";

                                }
                            } else {
                                       //echo "0 results";
                          }   
                          */                 
                ?>
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

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>