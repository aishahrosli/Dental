<?php require "auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title>Dental | Home</title>

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
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home                
              </p>
            </a>
        </li> -->   

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
                All Appointment
              </p>
            </a>           
         </li>

         <!-- Add Appointment -->
         <li class="nav-item">
            <a href="app-list.php" class="nav-link">
              <i class="fas fa-plus-square nav-icon"></i>
              <p>
                Add Appointment
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
            <h2 class="m-0">Our Treatment</h2>
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
              <!--<div class="card-header">
                <h3 class="card-title">Our Treatment</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">

               <div class="container">
 
  
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <h5> <b>Crown and Bridge</h5></b>
          <img src="../img/treatment/crown.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>Crowns are usually used to protect and restore badly carious and broken down teeth, root filled teeth and/or for cosmetics. Meanwhile, a bridge is a dental prosthesis which fills a space that a tooth previously occupied</p></i>
          </div>        
      </div>
    </div>

    <div class="col-md-4">
      <div class="thumbnail">
         <h5><b>Denture</h5></b>
          <img src="../img/treatment/denture.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>Dentures are prosthetic devices constructed to replace missing teeth, and are supported by the surrounding soft and hard tissues of the oral cavity. </p></i>
          </div>        
      </div>
    </div>

    <div class="col-md-4">
      <div class="thumbnail">
         <h5><b>Extraction</b></h5>
          <img src="../img/treatment/extraction.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>Teeth, which are too badly decayed or broken, malpositioned wisdom teeth and severe crowding are some of the reasons why teeth are extracted.</p></i>
          </div>        
      </div>
    </div>

    <div class="col-md-4">
      <div class="thumbnail">
         <h5><b>Filing</b></h5>
          <img src="../img/treatment/filling.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>This involves fillings and there is a wide range of material available to fill teeth like amalgam (metal alloy) fillings and tooth coloured fillings such as composites, compomers and glass ionomer cements.</p></i>
          </div>        
      </div>
    </div>
    <div class="col-md-4">
          <div class="thumbnail">
             <h5><b>Implants</b></h5>
              <img src="../img/treatment/implant.jpg" alt="Lights" style="width:100%">
              <div class="caption">
                <i><p>A dental implant is used to support one or more false teeth. It is a titanium screw that can replace the root of a tooth when it fails. Just like a tooth root, it is placed into the jawbone.</p></i>
              </div>        
          </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
         <h5><b>Orthodontics</b></h5>
          <img src="../img/treatment/orthodontic.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>Orthodontics is concerned with the growth and development of the teeth, jaws and face. We aim to harmonize the teeth and the face to give you, the patient, a better bite and beautiful smile.</p></i>
          </div>        
      </div>
    </div>

    <div class="col-md-4">
      <div class="thumbnail">
         <h5><b>Scaling</b></h5>
          <img src="../img/treatment/scalling.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>Scaling is “cleaning” of teeth, to remove plaque build-up, tartar deposits effectively cleaning the gums. Scaling is done with an ultrasonic cleaning device which vibrates on the surface of the teeth. </p></i>
          </div>        
      </div>
    </div>   

    <div class="col-md-4">
      <div class="thumbnail">
         <h5><b>Whitening</b></h5>
          <img src="../img/treatment/whitening.jpg" alt="Lights" style="width:100%">
          <div class="caption">
            <i><p>Tooth whitening lightens teeth and helps to remove stains and discoloration. Whitening improves the shade of teeth.</p></i>
          </div>        
      </div>
    </div>

  </div>
</div>
 
 
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
    <strong>Copyright &copy; Nurul Aishah Binti Rosli B031910219 .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
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
<!-- jQuery UI 1.11.4 -->
<script src="../src/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../src/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../src/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../src/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../src/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../src/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../src/plugins/moment/moment.min.js"></script>
<script src="../src/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../src/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../src/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../src/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- TOASTR -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../src/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../src/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../src/dist/js/pages/dashboard.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../src/plugins/moment/moment.min.js"></script>
<script src="../src/plugins/fullcalendar/main.js"></script>
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
