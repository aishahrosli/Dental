<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title>Dental | Login</title>

   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="src/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
   
</head>
<body class="hold-transition login-page" style="background-color: #6ba1b0 ;">
    
  <!-- preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/icon5.png"  alt="AdminLTELogo" height="100" width="100"><B>Dental Clinic</B> 
  </div>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="src/dist/img/icon.png" style="width: 76px;height: 76px"><br>
      <b>Dental Clinic Appointment System</b>
    </div><br>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start booking the appointment</p><br>

      <form action="login-patient.php" method="post">
        <div class="input-group mb-3">
          <input type="username" class="form-control" name="username" id="username" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
           
          <!-- /.col -->
          
          <div class="col-12  text-center">
            <button type="submit" id="login" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>--><br>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register an account </a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="src/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="src/dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
</body>

<?php  

 require "config.php";
 session_start();  

if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required"); window.location.href="login-patient.php"; </script>';  

      }  
      else  
      {  
           $username = mysqli_real_escape_string($db, $_POST["username"]);  
           $password = mysqli_real_escape_string($db, $_POST["password"]);  
           $query = "SELECT * FROM patient WHERE username = '$username'";  
           $result = mysqli_query($db, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = mysqli_fetch_array($result))  
                {  
                     if(password_verify($password, $row["password"]))  
                     {  
                          
                          $_SESSION["username"] = $username;
                          $_SESSION["role"] = "PATIENT";  
                            
                          echo '<script language="javascript">';
                          echo 'alert("Please make sure your profile is up-to-date");';
                          echo 'window.location.href="patient/profile.php";';
                          echo '</script>'; 
                           
                     }  
                     else  
                     {  
                          //return false;  
                      echo '<script language="javascript">';
                      echo 'alert("Wrong password");';
                      echo 'window.location.href="login-patient.php";';
                      echo '</script>'; 
                      
                     }  
                }  
           }  
           else  
           {  
                echo '<script language="javascript">';
                echo 'alert("Wrong username");';
                echo 'window.location.href="login-patient.php";';
                echo '</script>'; 
           }  
      }  
 }  



 ?>  
      


</html>
