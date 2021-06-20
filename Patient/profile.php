<?php require "auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title>Dental | Profile</title>

     <?php require "header.php" ?>

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
          <a href="#" class=" d-block"> WELCOME <?php echo "" .  strtoupper($auth['username']); ?> </a>
        </div>
      </div>

     <!-- Sidebar Menu -->
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
         <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
         <li class="nav-item">
            <a href="app-history.php" class="nav-link">
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
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">My Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">

                  <div class="form-group">
                    <label for="Fullname">Fullname</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo  ucwords ($auth['fullname']); ?>" readonly>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="IC">IC Number</label>
                        <input type="text" class="form-control" name="IC" id="IC" value="<?php echo  ucwords ($auth['IC']); ?>" readonly>
                      </div>                    

                    <div class="col-6">
                      <label>Date of Birth:</label>
                         
                          
                          <input type="text" name="DOB" value="<?php echo date("d-M-Y", strtotime(($auth['DOB']))) ; ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/ readonly>                       
                        
                    </div>
                  </div> <br>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-6">
                        <label for="phoneNo">Phone Number</label>
                        <input type="text" class="form-control" name="phoneNo" id="phoneNo" value="<?php echo  strtoupper ($auth['phoneNo']); ?>" readonly>
                      </div> 
                    
                      <div class="col-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo  $auth['email']; ?>" readonly>
                      </div>
                    </div> 
                  </div>

                  <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo  ucwords ($auth['address']); ?>" readonly>
                  </div> 
                  
                </div><br>
                <!-- /.card-body -->

             
                  <a href="profile-edit.php"> 
          <li class= "btn badge-primary"> Edit Profile </li></a>
                 
              </form>
          </div>

          </div>
          

        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php require "footer.php" ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script>
  $(function () {
  
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "8000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
   
    $.ajax({
      url: "app-app-validate.php",
      dataType: "json",
      type: "post",
      data:{
        "function": "reminder"
      },
      success: function (response) {

        console.log(response)
        if (response != "No appointment today") {
          toastr.error("Your upcoming appointment :- <br />Date: " + response.date + "<br />Timeslot: " + response.timeslot + "", "Appointment Reminder")
        }

      }
    })

  })

</script>

</body>
</html>
