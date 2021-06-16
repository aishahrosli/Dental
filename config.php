<?php 


require "helper.php";

$GLOBALS['toyyib_url'] = "https://dev.toyyibpay.com/";
$GLOBALS['toyyib_deposit_code'] = "95mfex6t";
$GLOBALS['toyyib_secret_key'] = 'c2sus5v8-5rlv-7ag0-bkzj-qocek7nddphf';
$db = mysqli_connect("localhost","root","","dental");


if (mysqli_connect_errno()){
	echo "error database connection : " . mysqli_connect_error();
}

?>