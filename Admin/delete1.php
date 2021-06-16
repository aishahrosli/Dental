<?php

	include('../config.php');

	if(isset($_GET['id'])){

		$id = $_GET['id'];


		#only status 1(new) can be deleted
		$appointment_q = $db->query("SELECT * FROM appointment WHERE app_ID=$id AND status=1");
		$appointment = $appointment_q->fetch_assoc();


		if(!$appointment){
			#not exist
			echo "<script>alert('Invalid appointment/appointment can\'t be deleted!');window.location='app-request.php';</script>";
			exit();
		}

		#delete appointment
		if($db->query("DELETE from appointment WHERE app_ID=$id")){

			echo "<script>alert('Appointment successfully deleted!');window.location='app-request.php';</script>";
			exit();

		}else{
			var_dump($db->error());exit();
		}

		var_dump($appointment);exit();

	}else{

		echo "<script>alert('Invalid parameter!');window.location='app_new.php';</script>";
	}	