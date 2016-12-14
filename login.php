<?php
	include('config.php');
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//email and password sent from form

		$myemail = mysqli_real_escape_string($db,$_POST['email']);
		$mypassword = mysqli_real_escape_string($db,$_POST['[password']);

		$sql = "SELECT id FROM admin WHERE email = '$myemail' and passcode = '$mypassword'";
		$result = mysqli_query($db,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];

		$count = mysqli_num_rows($result);

		//If result matched $myemail and $mypassword, table row must be 1 row

		if($count == 1){
			session_register('myemail');
			$_SESSION['login_user'] = $myemail;

			header('location: dashboard.php');
		} else {
				$error = "Your Email or Password is invalid."
		}
	}
?>
<html>
	<head>
		<title>Login Page - Test</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">
		<style>
			@font-face{
				font-family: 'owlFont';
				src:url('font/owl.ttf') format('truetype');
			}
		</style>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
	</head>
	<body>
		<div class="slideshow">
			<img src="http://malsup.github.com/images/beach1.jpg" width="100%" />
			<img src="http://malsup.github.com/images/beach2.jpg" width="100%" />
			<img src="http://malsup.github.com/images/beach3.jpg" width="100%" />
			<img src="http://malsup.github.com/images/beach4.jpg" width="100%" />
			<img src="http://malsup.github.com/images/beach5.jpg" width="100%" />
		</div>	
		<div class="left"></div>
		<div class="center">
			<div id="circle">
				<div id="icon">
					<p style="font-family:owlFont; font-size: 220px; color:#45b04c">g</p>
				</div>
			</div>			
		</div>
		<div class="right">
			<div class="container">
				<a href="http://www.preelabs.com" target="_blank"><img src="img/preelabs.png" width="300px"></a>
				<h3 style="margin-top:-60px">Preelabs PowerPree Application</h3>
				<p>Please enter your login credentials</p>
				<form action="action_page.php" method="post" accept-charset="UTF-8">
					<input type="email" name="email" id="email" placeholder="Enter Email..." maxlength="50">
					<br>
					<input type="password" name="password" id="password" placeholder="Enter Password..." maxlength="20">
					<br>
					<input type="submit" name="Submit">
				</form>
				<a id="forgotpassbtn">Forgot Password</a>
			</div>
		</div>
		<script type="text/javascript">
			function main(){
				$('.slideshow').cycle({ fx: 'shuffle' });
			}
			$(document).ready(main);
		</script>
	</body>
</html>