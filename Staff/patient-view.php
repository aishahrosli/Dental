<?php
 
require "auth.php";
 
   
  $id = $_GET['id'];
  
 
  $query = mysqli_query($db,"SELECT * FROM patient  WHERE user_ID='$id'");
   
  
  
  if(mysqli_num_rows($query) == 0){
    
   
    echo '<script>window.history.back()</script>';
    
  }else{
  
   
    $data = mysqli_fetch_assoc($query);
  
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title> Add Appointment</title>

 <?php require "header.php"; ?>

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

        <!-- List of all registered patient -->    
        <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
              <p>
                View Patient                
              </p>
            </a>
        </li>

        <!-- List of all appointment -->    
        <li class="nav-item">
            <a href="appointment.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                View Appointment                
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
            <h1 class="m-0">Patient Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Patient</a></li>
              <li class="breadcrumb-item active">Patient Detail</li>
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
          <form action="#" method="post"><input type="hidden" name="status" value="1">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">The detail of patient's information</h3>
              </div>
              <form action="" method="post">
                <div class="card-body">

                  <div class="form-group">
                    <label for="Fullname">Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo  ucwords ($data['fullname']); ?>" readonly>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="IC">IC Number</label>
                        <input type="text" class="form-control" name="IC" id="IC" value="<?php echo  ucwords ($data['IC']); ?>" readonly>
                      </div>                    

                    <div class="col-6">
                      <label>Date of Birth:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" name="DOB" value="<?php echo date("d-M-Y", strtotime(($data['DOB']))) ; ?>" class="form-control datetimepicker-input" readonly data-target="#reservationdate"/>                       
                        </div>
                    </div>
                  </div> <br>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="phoneNo">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNo" id="phoneNo" value="<?php echo  strtoupper ($data['phoneNo']); ?>" readonly>
                      </div> 
                    
                      <div class="col-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo  $data['email']; ?>" readonly>
                      </div>
                    </div> 
                  </div>

                  <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo  ucwords ($data['address']); ?>" readonly>
                  </div> 
                  
                </div><br>
                <!-- /.card-body -->

             <input type="button" class="btn badge-info" name="cancel" value="Back" onclick="goBack();">  
                 
              </form>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->
            
          </form>

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


</body>
</html>
