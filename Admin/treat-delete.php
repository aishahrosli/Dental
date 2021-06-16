<?php

if(isset($_GET['id'])){

	require "../config.php";

	$id = $_GET['id'];

	$cek = mysqli_query($db, "SELECT * FROM treatment WHERE treatment_ID='$id'");

	if(mysqli_num_rows($cek) == 0){

		echo "<script>alert('Data not exist!');window.history.back()</script>";

	}else{

		$del = mysqli_query($db, "DELETE FROM treatment WHERE treatment_ID='$id'");

		if($del){

			echo 'Treatment is succesfully delete! ';		
			header ('Location:treat-list.php');	

		}else{

			echo 'Error delete treatment! ';		
			echo '<a href="treat-list.php">Back</a>';	

		}

	}

}else{

	echo '<script>window.history.back()</script>';

}
?>