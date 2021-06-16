<?php

	include('../config.php');

	if(isset($_GET['id'])){

		$id = $_GET['id'];


		#only status 1(new) can be deleted
		$dentist_q = $db->query("SELECT * FROM dentist WHERE dentist_ID=$id");
		$dentist = $dentist_q->fetch_assoc();


		if(!$dentist){
			#not exist
			echo "<script>alert('Invalid dentist/dentist can\'t be deleted!');window.location='app-request.php';</script>";
			exit();
		}

		#delete dentist
		if($db->query("DELETE from dentist WHERE dentist_ID=$id")){

			echo "<script>alert('Dentist successfully deleted!');window.location='dentist-list.php';</script>";
			exit();

		}else{
			var_dump($db->error());exit();
		}

		var_dump($dentist);exit();

	}else{

		echo "<script>alert('Invalid parameter!');window.location='dentist-list.php';</script>";
	}	