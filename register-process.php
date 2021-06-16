<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "dental");

$username=$_POST['username'];
$password =$_POST['password'];

$fullname=$_POST['fullname'];
$IC=$_POST['IC'];

$DOB = date('Y-m-d',strtotime($_POST['DOB']));

$gender=$_POST['gender'];
$phoneNo=$_POST['phoneNo'];
$email=$_POST['email'];
$address=$_POST['address'];

	if($con === false)
	{
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$password = mysqli_real_escape_string($con, $_POST["password"]);  
    $password = password_hash($password, PASSWORD_DEFAULT);  

	$sql = "INSERT INTO patient (username,password,fullname,IC,DOB,gender,phoneNo,email,address)
	VALUES('$username','$password','$fullname','$IC','$DOB','$gender','$phoneNo','$email','$address')";

	if(mysqli_query($con, $sql))
	{
		$_SESSION['user_id']=$row['user_ID'];
		header ('Location:index.php');
    	echo "Records inserted successfully";

} 	else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

mysqli_close($con);
?>