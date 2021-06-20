
<?php
 

if(isset($_POST['save'])){

 require "auth.php"; 



      $rating=$_POST['rating'];
      $feedback=$_POST['feedback'];
      $id=$_POST['id'];
      $appID=$data['app_ID'];  

      var_dump($appID);exit(); 
    
      $update = mysqli_query($db,"UPDATE appointment SET rating='$rating', feedback='$feedback' WHERE app_ID = '$appID' ")  or die(mysqli_error());
 
     if($update){

     echo '<script language="javascript">';
        echo 'alert("The Information are Successfully Updated");';
        echo 'window.location.href="app-history.php";';
      echo '</script>'; 

  }else{

    echo 'Failed to save data! ';    
    echo '<a href="app-history.php?id='.$id.'">Back</a>'; 

  }

}else{  
  echo '<script>window.history.back()</script>';

}
?>