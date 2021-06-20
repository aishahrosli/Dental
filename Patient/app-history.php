<?php require "auth.php";
function appStatus($status){

  $statuses = [
      1 => 'Pending',
      2 => 'Approves',
      3 => 'Complete'
  ];
 
  return $statuses[$status];
}

 
$userID=$auth['user_ID'];  

  $query= mysqli_query($db, "SELECT *,a.app_ID as appointment_id,b.bill_ID as bill_id FROM appointment as a LEFT JOIN bill as b ON b.app_ID=a.app_ID LEFT JOIN patient as p ON a.user_ID=p.user_ID  left join treatment as t ON t.treatment_ID = a.treatment_ID WHERE a.user_ID = '$userID' AND a.status = 3");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title> Appointment List</title>

  <?php require "header.php" ?>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
       
    </ul>

   <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Logout -->
      <li class="nav-item badge-danger" >
        <a class="nav-link" href="../logout.php" onclick="return confirm('Are you sure?');" style="color: white;">
          Logout <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../src/dist/img/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dental Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         
        <div class="info">
          <a href="#" class=" d-block"> WELCOME <?php echo "" .  strtoupper($auth['username']); ?> </a>
        </div>
      </div>

     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 

        <!-- Home    
        <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home                
              </p>
            </a>
        </li>--> 

        <!-- Profile -->
         <li class="nav-item">
            <a href="profile.php" class="nav-link">
              <i class="fas fa-user nav-icon"></i>
              <p>
                My Profile
              </p>
            </a>           
         </li>

        <!-- View Appointment -->
         <li class="nav-item">
            <a href="app-list.php" class="nav-link">
              <i class="far fa-calendar-alt nav-icon"></i>
              <p>
                Appointment
              </p>
            </a>           
         </li>

         <!-- Add Appointment -->
         <li class="nav-item">
            <a href="app-add.php" class="nav-link">
              <i class="fas fa-plus-square nav-icon"></i>
              <p>
                Book Appointment
              </p>
            </a>           
         </li>

        <!-- History -->
         <li class="nav-item menu-open">
            <a href="app-history.php" class="nav-link active">
              <i class="fas fa-history nav-icon"></i>
              <p>
                 Appointment History
              </p>
            </a>           
         </li>    

        </ul>
     </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Appointment</a></li>
              <li class="breadcrumb-item active">List Appointment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Completed Appointment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Treatment</th>
                    <th>My Star Rating & Feedback</th>
                    <th>Action</th>                     
                    <th>Invoice</th>
                    
                  </tr>                   
                  </thead>
                  
                  <tbody>
                    <?php
            $no = 0;
            while ($data = mysqli_fetch_array ($query))
            {
            ?>
                  <tr>
                    <td><?php echo ++$no;?></td>
                    <td><?php echo date("d-M-Y", strtotime($data['date']))?></td>
                    <td><?php echo ucwords($data['time'])?></td> 
                    <td><?php echo ucwords($data['treatment_name'])?></td>                    
                    <td><?php echo ($data['rating'])?><br><?php echo  ($data['feedback'])?></</td>
                    <td><a href="rating.php?id=<?= $data['app_ID'] ?>"><input type="button" class="btn badge-success" name="view" value="Rate"></a></td> 
                    <td>
                      <a href="invoice.php?id=<?= $data['bill_id'] ?>"><input type="button" class="btn badge-success" name="view" value="View Invoice"></a>
                    </td>
                  </tr>
                  
 <?php } ?>  
                 
                  </tbody>
                   
                 
                </table>
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../src/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../src/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../src/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../src/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- AdminLTE App -->
<script src="../src/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../src/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
