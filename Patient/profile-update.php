<?php
session_start();

if(isset($_POST['save'])){

  require "../config.php";

  $fullname= $_POST['fullname'];
  $IC= $_POST['IC'];
  $DOB = date('Y-m-d',strtotime($_POST['DOB']));
  $phoneNo= $_POST['phoneNo'];
  $email= $_POST['email'];
  $address= $_POST['address'];

  $update = mysqli_query($db,"UPDATE patient SET fullname='$fullname', IC='$IC', DOB='$DOB', phoneNo='$phoneNo', email= '$email', address='$address'  WHERE username = '". $_SESSION['username']."'") or die(mysqli_error());

  if($update){

     echo '<script language="javascript">';
        echo 'alert("The Information are Successfully Updated");';
        echo 'window.location.href="profile.php";';
      echo '</script>'; 

  }else{

    echo 'Failed to save data! ';    
    echo '<a href="profile_edit.php?id='.$id.'">Kembali</a>'; 

  }

}else{  
  echo '<script>window.history.back()</script>';

}
?>