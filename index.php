<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Dental Clinic Appointment</title>

<link rel="stylesheet" href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body{
	margin:0;
	padding:0;
	font-family:"Myanmar Text", Arial, Helvetica, sans-serif;
	color:black;
	background:white;
}
h2 
{
	color:white;
}
.container{
	max-width:999px;
	width:96%;
	margin:auto;
}
.content h2{
	background:#4682B4;
	padding:10px;
	border-radius:5px;
	margin-bottom:20px;
}

div.login{
	float:left;
	width:500px;
	height:450px;
	border-style:solid;
	display:inline-block;
	background-image:url("img/banner.jpg");
	color:#FFF;
    }

input[type="text"],input[type="password"]{
	height:27px;
	width: 200px;
	font-size:18px;
	border:none;
	margin-bottom:20px;
	border-radius:4px;
	background-color:#fff;
	padding-left:20px;
}
.btn-login{
	padding:10px 20px;
	cursor:pointer;
	color:#fff;
	border-radius:4px;
	border:none;
	background-color:black;
	border-bottom:4px;
	margin-bottom:20px;
}
div.footer {
	padding: 10px 0;
	background-color:transparent;
	position: relative;
	clear: both;
	color:#000;
}
div.left 
{
	float : left;
	width : 99%;
}
div.right 
{
	float : right;
	height:450px;
	width : 45%;
	background-image:url("img/pic05.jpg");
	color : white;
}

</style>
</head>

<body>    
     <div class="container">
     <div class="content">
        <h2><center>WELCOME TO ONLINE DENTAL CLINIC APPOINTMENT </center></h2></div>
  
  <div class="login">
     <center> 
    <div class="left">
	<form action="patient-login.php" method="post"><br>
	<img src="img/icon.png" height="90" width="100"><br>
	  Username: <br> <input type="text" name="username"><br>
	  Password : <br> <input type="password" name="password"><br><br>
	  <input type="submit" value="Login" name="login" class="btn-login">
	</form>
	<form action="reg.php" method="post">
	 Don't have an account? 
	 <input type="submit" value="Register" class="btn-login">
	</form>   
     </center>
   </div>
	<div class="right"><br>
	<center><b>CONTACT US</b><br>
	<i class="fa fa-clock-o">&nbsp;MONDAY - THURSDAY 
	<br>(8:00 A.M - 10:00 P.M)</i><br>
	<i class="fa fa-clock-o">&nbsp;FRIDAY(8:00 A.M - 10:00 P.M)
	<br>break (12:15 P.M - 2.45 P.M)</i><br>
	<i class="fa fa-clock-o">&nbsp; WEEKENDS & PUBLIC HOLIDAY<br>
	(CLOSED)</i><br>
<!--	<i class="fa fa-map-marker">&nbsp;
		DENTAL CLINIC,<br>
No. 119, JALAN MERDEKA,<br>
		 TAMAN MELAKA RAYA,,<br>
		75000 MALACCA TOWN,<br>
		MELAKA, MALAYSIA.</i><br> -->
	<i class="fa fa-phone">&nbsp;PHONE : 06-553 4439</i><br> 
	<i class="fa fa-print">&nbsp;FAX : 06-555 2077</i><br> 	<br>
	<a href="information.php"><img src="img/select5.png" height="90" width="90"></a> &nbsp;<br>
	<button class="btn-login" style=" height:50px ; width:220 ;cursor:pointer;" onclick="location.href = 'login.php'" >ADMIN/STAFF LOGIN</button>
	</center>
	</div>
   </div> 
   
    
 
</body>
</html>