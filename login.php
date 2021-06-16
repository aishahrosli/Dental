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
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="src/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="src/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="src/dist/img/icon.png" style="width: 76px;height: 76px"><br>
      <b>Dental Clinic Appointment System</b>
    </div><br>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p><br>

      <form action="login.php" method="post">
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
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>-->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>

<?php 
  require "config.php";
  if(isset($_POST['login'])) {

  session_start();



  $username = $_POST['username'];
  $password =  ($_POST['password']);


  $sql = "select * from staff where username='$username' and password='$password'";
  $result = mysqli_query ($db, $sql);

  if (mysqli_num_rows($result) > 0)
  {

      $_SESSION['role'] = 'STAFF';
      $_SESSION['username']=$username;
      $_SESSION['password']=$password;
       
      header('Location:staff/index.php');
      
    }
    

  else
   {
    $sql = "select * from admin where username='$username' and password='$password'";
    $result = mysqli_query ($db, $sql);

    if (mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);
    
    $_SESSION['role'] = 'ADMIN';
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    header('Location:admin/index.php');
    
      echo '</script>'; 
    }
      else
    {
      echo '<script language="javascript">';
      echo 'alert("Wrong username or password");';
      echo 'window.location.href="login.php";';
      echo '</script>'; 
      
    }

   }
  }


  ?>


</html>
