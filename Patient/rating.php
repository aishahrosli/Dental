 <?php
 require "auth.php" ;

 
 $id = $_GET['id']; 
  
 
  $query = mysqli_query($db," SELECT * FROM patient as p join appointment  as a  ON p.user_ID=a.user_ID
                                                        left join treatment as t ON t.treatment_ID = a.treatment_ID
                                                        join bill as b ON a.app_ID= b.app_ID WHERE b.app_ID='$id'");
   
 
  
  if(mysqli_num_rows($query) == 0){
    
   
    echo '<script>window.history.back()</script>';
    
  }else{
  
   
    $data = mysqli_fetch_assoc($query);
  
  }
  ?>
<?php
 
 if(isset($_POST['save'])){
      
   $id = $_POST['id'];
   $rating=$_POST['rating'][0];
   $feedback=$_POST['feedback']; 
 
   $sql = mysqli_query($db,"UPDATE appointment SET rating = '$rating', feedback = '$feedback' WHERE app_ID='$id'") or die(mysqli_error());
   
 
   if($sql == TRUE) 
     {
     echo '<script language = "javascript">';
     echo 'alert("Thanks for your feedback");';
     echo 'window.location.href ="app-history.php";';
     echo '</script>'; 
     }
     else {  
     echo "Error : " .$sql. "<br>" .$db -> error; }
       }
       $db -> close();
     ?>
 

 
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
          <div class="col-md-10">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Completed Appointment</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="rating.php" method="post"><input type="hidden" name="id" value="<?php echo $id; ?>">       
                <div class="card-body">

                  <div class="form-group">
                    <label for="Fullname">Appointment Date</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo date("d-M-Y", strtotime(($data['date']))) ; ?>" readonly>
                  </div>

                  <div class="form-group">
                     
                        <label for="IC">Appointment timeslot </label>
                        <input type="text" class="form-control" name="IC" id="IC" value="<?php echo ($data['time']); ?>" readonly>
                      </div>                    

                    <div class="form-group">
                      <label>Treatment</label>                      
                      <input type="text" name="DOB" value="<?php echo  ucwords ($data['treatment_name']); ?>" class="form-control datetimepicker-input" data-target="#reservationdate"/ readonly>                     
                    </div>                    

                  <div class="form-group ">
                    <label for="address">Dentist</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo  ucwords ($data['dr_name']); ?>" readonly>
                  </div> 
                  
                  <div class="form-group rating">
                    <b> Rating </b><br>
                    <input type="radio" id="star5" name="rating[]"value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" name="rating[]" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" name="rating[]" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" name="rating[]" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" name=" rating[]" value="1" />
                    <label for="star1" title="text">1 star</label>
                  </div> <br><br><br><br>

                  <div class="form-group col-lg-6">
                   <label>Feedback</label>
                    <textarea class="form-control" name="feedback" id="feedback" required> </textarea> 
                  </div>
                     <input type="button" class="btn badge-danger" name="Cancel" value="Cancel" onclick="goBack();">  
                <input type="submit" class="btn badge-info float-right" name="save" value="Submit" onclick="return confirm('Are you sure?');"> 
                    
                </div><br>
                <!-- /.card-body -->

             
                  
                 
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




</body>
</html>
 
