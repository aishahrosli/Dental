<?php require "auth.php"; 

  $treatment_q = $db->query("SELECT * FROM treatment");


 ?>

 <?php          

    if(isset($_POST['submit'])) 
    {

      $date = date('Y-m-d',strtotime($_POST['date']));
      $time=$_POST['time'];
      $treatment_name=$_POST['treatment_name'];
      $userID= $auth["user_ID"];

      $query = $db->query("UPDATE appointment SET deposit=2 WHERE receipt_number='$billcode'");
       


      $billDescription = "Deposit Payment";
      $billAmount = getDepositAmount()*100;
      $billReturnUrl = "http://localhost:8080/dental/patient/app-validate.php";
      $billCallbackUrl = "http://localhost:8080/dental/patient/app-validate.php";
      $billTo = $auth['fullname'];
      $billEmail = $auth['email'];
      $billPhone = $auth['phoneNo'];
      $depo = getDepositAmount();


      $code = createBill($GLOBALS['toyyib_deposit_code'], $treatment_name, $billDescription, $billAmount, $billReturnUrl, $billCallbackUrl, $billTo, $billEmail,$billPhone);


      $receipt = $GLOBALS['toyyib_url'].$code;

      $sql = "INSERT INTO appointment (date,time,treatment_ID,user_ID, receipt_number, receipt_url, deposit_amount) VALUES ('$date','$time', '$treatment_name', '$userID', '$code', '$receipt', $depo)";

      if(mysqli_query($db, $sql)=== TRUE){

        header("Location:".$receipt);exit();

      } else
      {

         echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
      }    

      } 

mysqli_close($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title>Dental | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../src/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../src/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../src/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../src/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
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
          <a href="#" class=" d-block"> WELCOME <?php echo "" .  strtoupper($auth['username']); ?> </a>
        </div>
      </div>

     <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 

        <!-- Home -->    
        <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home                
              </p>
            </a>
        </li>

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
            <a href="#" class="nav-link active">
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
            <h1 class="m-0">Appointment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Appointment</li>
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
          <form action="#" method="post">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Appointment Booking</h3>
              </div>
              <div class="card-body">
                
                <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                         <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div><input type="text" name="date" id="reservationdate_new" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                       
                    </div>
                </div>


                <!-- Time -->
                <div class="form-group">
                  <label> Appointment time slot:</label>

                  <select name="time" id="time" placeholder = "Choose your preffered session" class="form-control select2" style="width: 100%;">
                    
                    <option value="">Select Time Slot</option>
                    <!-- <option value="8.00am">8.00am-9.00am</option>
                    <option value="9.00am">9.00am-10.00am</option>
                    <option value="10.00am">10.00am-11.00am</option>
                    <option value="11.00pm">11.00am-12.00pm</option>
                    <option value="11.00pm">12.00pm-1.00pm</option>
                    <option value="2.00pm">2.00pm-3.00pm</option>
                    <option value="3.00pm">3.00pm-4.00pm</option>
                    <option value="4.00pm">4.00pm-5.00pm</option> -->


                                         
                  </select>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Time -->
                <div class="form-group">
                  <label> Required Treatment:</label>

                  <select name="treatment_name" id="treatment" placeholder = "Choose your preffered treatment" class="form-control select2" style="width: 100%;">
                    <?php while ($row = $treatment_q->fetch_assoc()) { ?>
                                      <option value="<?= $row['treatment_ID'] ?>"><?= $row['treatment_name'] ?></option>
                                    <?php } ?>       
                  </select>
                  <!-- /.input group -->
                </div> <br>
                <!-- /.form group -->

                <div class="form-group">
                  <label> Deposit Payment: </label>
                  <input class="form-control" type="text" name="" value="RM50" readonly>
                </div>

               <input type="submit" class=" btn badge-primary save" name="submit" value="Proceed To Payment">  
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
          </form>

          </div>
          
          <!-- /.col (right) -->
        </div>        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
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
<!-- TOASTR -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- dropzonejs -->
<!-- <script src="../src/plugins/dropzone/min/dropzone.min.js"></script> -->
<!-- AdminLTE App -->
<script src="../src/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../src/dist/js/demo.js"></script>
 
<!-- Page specific script -->
<script>

   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


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


    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'D MMMM yyyy',
        minDate:new Date()
    });   

    $('#reservationdate_new').blur(function() {

        if ($("#reservationdate_new").val()) {

            var listoption = ["8.00am-9.00am", "9.00am-10.00am", "10.00am-11.00am", "11.00am-12.00pm", "12.00pm-1.00pm", "2.00pm-3.00pm", "3.00pm-4.00pm", "4.00pm-5.00pm"];

            $.ajax({
              url: "app-app-validate.php",
              dataType: "json",
              data: {
                "selecteddate": $("#reservationdate_new").val(),
                "function": "querydate"
              },
              type: "post",
              success:function (data) {

                console.log(data)
                $("#time").find('option').not(':first').remove();

                if (data == 'Time slot free'){
                  for (i=0; i<listoption.length; i++) 
                  {
                    $("#time").append($("<option></option>")
                      .attr("value", listoption[i])
                      .text(listoption[i]));
                  }
                } else {
                  var arrayreturn = [];

                  for (j=0; j<data.datebook.length; j++) 
                  {
                    arrayreturn.push(data.datebook[j].timeslot)
                  }

                  array1 = listoption.filter(function(val) {
                    return arrayreturn.indexOf(val) == -1;
                  });

                  for (i=0; i<array1.length; i++) 
                  {
                    $("#time").append($("<option></option>")
                      .attr("value", array1[i])
                      .text(array1[i]));
                  }
                }
              }
            })
        }
    });


    
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
   
</script>

</body>
</html>
