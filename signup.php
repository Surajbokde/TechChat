<!DOCTYPE html>
<html>
<head>
	<title>TechChat</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="icon" href="./favicon.jfif" type="image/x-icon">
	<link rel="stylesheet" href="css/style.css">

</head>
<body class="body">
<div class="container">
	<div id="signup_form" class="well">
		<div class="head_form">
			<a href="index.php"> <span class="glyphicon glyphicon-remove"></span></a>
		</div>
		<h2><center>Sign Up</center></h2>
		<hr class="newhr">
		<form method="POST" action="register.php">
		Name: <input type="text" name="name" class="form-control field" required>
		<div style="height: 10px;"></div>
		Username: <input type="text" name="username" class="form-control field" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control field" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"> Sign Up</button> 
		<div class="login">
			Already have account? <br><a href="login.php"> Login</a></div>
		</div>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				session_start();
				if(isset($_SESSION['sign_msg'])){
					echo $_SESSION['sign_msg'];
					unset($_SESSION['sign_msg']);
				}
			?>
			</center>
		</div>
	</div>
</div>
</body>
</html>