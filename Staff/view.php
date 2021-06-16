<?php

require "auth.php";
 
  $id = $_GET['id'];


    $bill_q = $db->query("SELECT * FROM bill WHERE bill_ID='$id'");
    $bill = $bill_q->fetch_assoc();


    $medicines = json_decode($bill['medicine']);

    if(!$bill){
      var_dump('Xde');exit();
    }

  
 
 $query = mysqli_query($db,"SELECT * FROM patient as p join appointment  as a  ON p.user_ID=a.user_ID
                                                        left join treatment as t ON t.treatment_ID = a.treatment_ID
                                                        join bill as b ON a.app_ID= b.app_ID WHERE b.app_ID='$bill[app_ID]'");

    
  
  
  if(mysqli_num_rows($query) == 0){
    
   
    
    
  }else{
  
   
    $data = mysqli_fetch_assoc($query);

     
    $formated_date = date("d M Y", strtotime($data['created_at']));



  }

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title> Invoice </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../src/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../src/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../src/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../src/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../src/dist/css/adminlte.min.css">
  <!-- invoice style -->
  <link rel="stylesheet" href="invoice.css">

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
            <a href="patient.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                View Patient                
              </p>
            </a>
          </li>

          <!-- List of all appointment -->    
          <li class="nav-item">
            <a href="appointment.php" class="nav-link active">
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
            <h1 class="m-0">Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Invoice</a></li>
              <li class="breadcrumb-item active">View Invoice</li>
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
              <!--<div class="card-header">
                <h3 class="card-title"> </h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="containerbook" style="background-color: white">

  <div class="invoice-box">
  <table cellpadding="0" cellspacing="0">
    <tr>
      <td>
          <img src="../img/dental.jpg" style="height:100px; max-width:300px;">
      </td>
      <td colspan="5" align="right">
          <?php echo " Invoice #: ".( $data['bill_ID']); ?> <br> Created : <?= $formated_date; ?><br><br>
          Dentist : <?php echo "".ucwords($data['dr_name']);?>

      </td>
    </tr>

    <tr class="information">
      <td colspan="4">
        <table>
          <tr>
            <td>
              <b>DENTAL CLINIC</b><br>
              No. 119, Jalan Merdeka, <br>
              Taman Melaka Raya, <br>
              75000 Malacca Town, Melaka<br>  
              Tel No : 06-553 4439<br>
              Email &nbsp: dentalclinic@yahoo.com 
               <br><br><br>

              Patient : <?php echo "".ucwords($data['fullname']);?><br>
              IC No &nbsp : <?php echo "".($data['IC']);?><br>
              <!--<?//php echo "".ucwords($data['address']);?> <br>-->
              Tel No  &nbsp: <?php echo "".($data['phoneNo']);?> <br>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <tr class="heading">
      <td colspan="3">Treatment</td>
      <td>Price /unit</td>
      <td>Quantity</td>
      <td>Price</td>
      <td></td>
    </tr>

    <tr class="details" style="text-transform: capitalize;">
      <td colspan="3"><?php echo "".($data['treatment_name']);?> </td>
      <td>RM <?= $data['fees']; ?></td>
      <td>1</td>
      <td>RM <?= $data['fees']; ?></td>
    </tr>
    <?php foreach ($medicines as $key => $medicine) { ?>
      <tr class="details" style="text-transform: capitalize;">
      <td colspan="3"><?= $medicine->name ?> </td>
      <td>RM <?= $medicine->price ?></td> <!--/$medicine->quantity-->
      <td><?= $medicine->quantity ?></td>
      <td>RM <?= $medicine->price*$medicine->quantity ?></td>
    </tr>

    <?php } ?>

    <td colspan="5"></td>
      <td>- Deposit RM 50 </td>

    <tr class="total">
      <td colspan="5"></td>
      <td>Total: RM   <?= $bill['price']; ?></td>

    </tr>
         
    
      
    
  </table>

 <!-- <button onclick="myFunction()">Print this page</button> -->

<script>
function myFunction() {
  window.print();
}
</script>
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
<script src="../src/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../src/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../src/plugins/jszip/jszip.min.js"></script>
<script src="../src/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../src/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../src/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../src/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../src/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../src/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../src/dist/js/demo.js"></script>
<!-- Page specific script -->

</body>
</html>
