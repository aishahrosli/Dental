 <?php
 require "auth.php" ;

  function appStatus($status){

  $statuses = [
      1 => 'NEW',
      2 => 'UPCOMING',
      3 => 'COMPLETED'
  ];
 
  return $statuses[$status];
}
  
 $id = $_GET['id'];
  
 
  $query = mysqli_query($db,"SELECT * FROM appointment  as a LEFT JOIN patient as p ON a.user_ID=p.user_ID LEFT JOIN treatment as t ON t.treatment_ID = a.treatment_ID  WHERE app_ID='$id'");
   
  
  
  if(mysqli_num_rows($query) == 0){
    
   
    echo '<script>window.history.back()</script>';
    
  }else{
  
   
    $data = mysqli_fetch_assoc($query);
  
  }
  ?>


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title> Completed Appointment</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../src/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../src/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../src/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../src/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../src/dist/css/adminlte.min.css">
  <!-- Ionicons -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../src/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

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
      <!-- Navbar Search -->

      <li class="nav-item badge-danger" >
        <a class="nav-link" href="../logout.php" onclick="return confirm('Are you sure?');" style="color: white;">
          Logout <i class="  fas fa-sign-out-alt"></i>
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
          <a href="#" class=" d-block"> ADMIN </a>
        </div>
      </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 

        <!-- Dashboard -->    
        <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard                
              </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="app-all.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Schedule
              </p>
            </a>           
         </li>

        <!-- View Appointment -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-calendar"></i>
              <p>
                View Appointment
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="app-request.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Appointment Request</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app-upcoming.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Upcoming Appointment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app-complete.php" class="nav-link active">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Completed Appointment</p>
                </a>
              </li>            
            </ul>
         </li>

         <!-- Create Appointment -->
         <li class="nav-item">
            <a href="app-add.php" class="nav-link">
              <i class="fas fa-plus-square nav-icon"></i>
              <p>
                Create Appointment
              </p>
            </a>           
         </li>

          <!-- Treatment -->
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase-medical"></i>
              <p>
                Treatment
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="treat-list.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>View Treatment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="treat-add.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Add Treatment</p>
                </a>
              </li>       
            </ul>
        </li>

         <!-- Dentist -->
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Dentist
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="dentist-list.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>View Dentist</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dentist-add.php" class="nav-link">
                  <i class="fas fa-caret-right nav-icon"></i>
                  <p>Add Dentist</p>
                </a>
              </li>       
            </ul>
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
              <li class="breadcrumb-item active">Completed Appointment</li>
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
          <div class="col-md-12">
          <form action="#" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">View the completed patient appointment</h3>
              </div>
              <div class="card-body">
               
               <h6><b> Patient ID  # <?php echo ucwords ( $data['user_ID']); ?> </h6><br></b>
                <h6>Patient &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  :&nbsp <?php echo ucwords ( $data['fullname']); ?></h6> 
                <h6>IC Number &nbsp&nbsp&nbsp&nbsp :&nbsp <?php echo ( $data['IC']); ?> </h6>
                <h6>Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  :&nbsp <?php echo ucwords ( $data['gender']); ?></h6> 
                <h6>App date &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  :&nbsp </b><?php echo date("d-M-Y", strtotime(($data['date']))) ; ?></h6> 
                <h6>App session &nbsp&nbsp :&nbsp </b><?php echo ucwords ( $data['time']); ?></h6> 
                <h6>Treatment &nbsp&nbsp&nbsp&nbsp&nbsp  :&nbsp</b> <?php echo ucwords( $data['treatment_name']); ?></h6> 

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </form>

          <input type="button" class="btn badge-danger" name="back" value="Back" onclick="goBack();">  
          </div>
          
          <!-- /.col (right) -->
        </div>
      </div><!-- /.container-fluid -->
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
<!-- Select2 -->
<script src="../src/plugins/select2/js/select2.full.min.js"></script>
 
<!-- InputMask -->
<script src="../src/plugins/moment/moment.min.js"></script> 
<!-- date-range-picker -->
<script src="../src/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../src/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../src/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../src/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../src/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../src/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../src/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../src/dist/js/demo.js"></script>
 
 <script>
   
   function goBack() {
  window.history.back()
}

 </script>

</body>
</html>
