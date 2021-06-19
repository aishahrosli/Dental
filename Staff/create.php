 <?php


require "auth.php";
 
  
if(isset($_GET['id'])){

       $id = $_GET['id'];

       $data_q = $db->query("SELECT *,a.app_ID as appointment_id FROM appointment as a
        LEFT JOIN patient as p ON p.user_ID = a.user_ID
        LEFT JOIN treatment as t ON t.treatment_ID = a.treatment_ID
        WHERE a.app_ID='$_GET[id]'");
       $data = $data_q->fetch_assoc();

       #if data not exist
       if(!$data){
        var_dump('appointment not exist!');exit();
       }

       #check if bill aready created;

      $bill_q = $db->query("SELECT * FROM bill as b WHERE b.app_ID='$_GET[id]'");
      $bill = $bill_q->fetch_assoc();


      if($bill){

        #bill aready created
        var_dump("Bill already created!");exit();
      }


      if(isset($_POST['save'])) {

        $dr_name=$_POST['dr_name'];
        $ttlPrice = 0;



        $treatment_ttl = 0;
        $item = [];
        foreach($_POST['treatment'] as $key => $treatment){

          if($treatment != ""){

            $qty = $_POST['quantity'][$key];             
            $price = $_POST['price'][$key];

            $item[] = [
              'name' => $treatment,
              'quantity' => $qty,
              'price' => $price
            ];


            $treatment_ttl = $treatment_ttl+($qty*$price);
          }
        
        }

        foreach ($_POST['m_medicine'] as $key => $value) {

          $item[] = [
            'name' => $_POST['m_medicine'][$key],
            'quantity' => $_POST['m_quantity'][$key],
            'price' => $_POST['m_price'][$key]
          ];

          #calculate total medicine price
          $ttlPrice = $ttlPrice+(($_POST['m_price'][$key])*($_POST['m_quantity'][$key]));

        }

        
        $item = json_encode($item); //var_dump($item);exit();

        #medicine price + treatment price;
        $treatment_q = $db->query("SELECT * FROM treatment WHERE treatment_ID='$data[treatment_ID]'");
        $treatment = $treatment_q->fetch_assoc();

        $basic_quantity = $_POST['basic_quantity'];
        $treatment_fee = $treatment['fees'];

        $grandTotal = (($treatment_fee*$basic_quantity)+$ttlPrice+$treatment_ttl)-50.00;

        $insert = "INSERT INTO bill (dr_name,app_ID, medicine, price) VALUES ('$dr_name', '$data[appointment_id]', '$item', '$grandTotal')";

        if(mysqli_query($db, $insert)){

         $last_id = $db->insert_id;

          echo "<script>alert('Bill successfully generated');window.location.href='view.php?id=$last_id'</script>";

        }else{

var_dump(mysqli_error($db));exit();
          echo "<script>alert('Failed to generate bill!')</script>";
        }

      }

  }else{

          echo '<script>alert("Invalid parameter id!");window.history.back()</script>';
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="76x76" href="../src/dist/img/icon.png">
  <link rel="icon" type="image/png" href="../src/dist/img/icon.png">
  <title> Completed Appointment</title>

  <?php require "header.php"; ?>
   
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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Appointment</a></li>
              <li class="breadcrumb-item active">Create Invoice</li>
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
                <h3 class="card-title">Patient's Detail</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <form  method="post">
   
                  <div class="containerbook">
            
                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="fullname"> Full name</label>
                          <input type="text" class="form-control" name="fullname" id="fullname" value="<?php echo  ucwords ($data['fullname']); ?>" readonly>
                        </div> 
                    
                        <div class="col-6">
                         <label for="phoneNo">IC number</label>
                          <input type="IC" class="form-control" name="IC" id="IC" value="<?php echo  $data['IC']; ?>" readonly>
                        </div>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="phoneNo">Phone number</label>
                          <input type="phoneNo" class="form-control" name="phoneNo" id="phoneNo" value="<?php echo  $data['phoneNo']; ?>" readonly>
                        </div>
                    
                        <div class="col-6">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" name="email" id="email" value="<?php echo  $data['email']; ?>" readonly>
                        </div>
                      </div> 
                    </div>

                  <div class="form-group">
                    <label for="address">Home Address</label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo  ucwords ($data['address']); ?>" readonly>
                  </div> <br>

                  
                  <h3 class="card-title">Appointment Detail</h3> <br> <hr>

                  <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="date">Appointment's date</label>
                          <input type="text" class="form-control" name="date" id="date" value="<?php echo  date("d-M-Y", strtotime(($data['date']))) ; ?>" readonly>
                        </div> 
                    
                        <div class="col-6">
                         <label for="time">Appointment's time slot</label>
                          <input type="IC" class="form-control" name="time" id="time" value="<?php echo  $data['time']; ?>" readonly>
                        </div>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-6">
                          <label for="treatment">Treatment</label>
                          <input type="treatment" class="form-control" name="treatment" id="phoneNo" value="<?php echo ucwords( $data['treatment_name']); ?>" readonly>
                        </div>
                    
                        <div class="col-6">
                          <label for="fees">Treatment fees</label>
                          <input type="fees" class="form-control" name="fees" id="fees" value="RM <?php echo  $data['fees']; ?>" readonly>
                        </div>
                      </div> 
                    </div>                   
            
                    <label for="dr_name"><b>Dentist</b> </br></label>
                    <select name="dr_name" id="dr_name" class="form-control">
                   
                       <option>---Dentist Name--</option>
                                    
                           <?php

                              $sql = mysqli_query($db, "SELECT dr_name From dentist");
                              $row = mysqli_num_rows($sql);
      
                              while ($row = mysqli_fetch_array($sql)){
                              echo "<option value='". $row['dr_name'] ."'>" .$row['dr_name'] ."</option>" ;
                              }
                            ?>
                    </select> </br>

           
  <form method="POST"><b>Treatment
    <table id="treat" class="treat" >
      <th><input type="text" class="form-control" name="basic_treatment" value="<?php echo ucwords($data['treatment_name'])?>" readonly/></th>
      <th><input type="text" class="form-control" name="basic_quantity" placeholder="Enter quantity" /></th>       
    </table><br>
    
    <table id="dynamic" class="test"> Other treatment
      <th><input type="text" class="form-control" name="treatment[]" placeholder="Enter treatment" /></th>
      <th><input type="text" class="form-control" name="quantity[]" placeholder="Enter quantity" /></th>
      <th><input type="text" class="form-control" name="price[]" placeholder="Enter price" /></th>
      <th><button type="button" class="form-control btn badge-info" name="add" id="add_input">Add</button></th>
    </table><br>

    <table id="m_dynamic" class="test" > Medicine Drescription
      <th><input type="text" class="form-control" name="m_medicine[]" placeholder="Enter medicine" /></th>
      <th><input type="text" class="form-control" name="m_quantity[]" placeholder="Enter quantity" /></th>
      <th><input type="text" class="form-control" name="m_price[]" placeholder="Enter price (for a unit)" /></th>
      <th><button type="button" class="form-control btn badge-info" name="add" id="add_input_medicine">Add</button></th>
    </table>
  </form>

<script>
  
$(document).ready(function() {
var i = 1;
$('#add_input').click(function() {
i++;
$('#dynamic').append('<tr id="row' + i + '">                                                                                                                                                                                  <th><input type="text"  class="form-control" name="treatment[]" placeholder="Enter medicine"/> </th>                                                                                                                           <th><input type="text"  class="form-control" name="quantity[]" placeholder="Enter quantity"/></th>                                                                                                                            <th><input type="text" class="form-control" name="price[]" placeholder="Enter price (for a unit)"/>                                                                                                                          </th><td><button type="button" name="remove" id="' + i + '" class="btn_remove btn badge-danger form-control">Remove</button></td>                                                                                                                           </tr>');
});

$(document).on('click', '.btn_remove', function() {
var button_id = $(this).attr("id");
$('#row' + button_id + '').remove();
});
$('#submit').click(function() {
$.ajax({
url: "insert.php",
method: "POST",
data: $('#add_me').serialize(),
success: function(data) {
alert(data);
$('#add_me')[0].reset();
}
});
});


//medicine .js

var m = 1;
$('#add_input_medicine').click(function() {
i++;
$('#m_dynamic').append('<tr id="m_row' + m + '">                                                                                                                                                                                  <th><input type="text"  class="form-control" name="m_medicine[]" placeholder="Enter medicine"/> </th>                                                                                                                           <th><input type="text"  class="form-control" name="m_quantity[]" placeholder="Enter quantity"/></th>                                                                                                                            <th><input type="text" class="form-control" name="m_price[]" placeholder="Enter price (for a unit)"/>                                                                                                                          </th><td><button type="button" name="remove" id="' + m + '" class="m_btn_remove btn badge-danger form-control">Remove</button></td>                                                                                                                           </tr>');
});

  $(document).on('click', '.m_btn_remove', function() {
    var button_id = $(this).attr("id");
    $('#m_row' + button_id + '').remove();
  });

});
</script>       

       


             <br><br>

               <input type="button" class="btn badge-danger" name="Cancel" value="Cancel" onclick="goBack();">  
                <input type="submit" class="btn badge-info float-right" name="save" value="Submit" onclick="return confirm('Are you sure?');">  
 
 </div></form>
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

</body>
</html>
