	<?php  

 require "config.php";
 session_start();  

if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) || empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required"); window.location.href="index.php"; </script>';  

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
                          
                          header("location:patient/login.php");  
                     }  
                     else  
                     {  
                          //return false;  
                      echo '<script language="javascript">';
                      echo 'alert("Wrong password");';
                      echo 'window.location.href="index.php";';
                      echo '</script>'; 
                      
                     }  
                }  
           }  
           else  
           {  
                echo '<script language="javascript">';
                echo 'alert("Wrong username");';
                echo 'window.location.href="index.php";';
                echo '</script>'; 
           }  
      }  
 }  



 ?>  
			