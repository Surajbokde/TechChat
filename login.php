<!-- login page -->
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
	<div id="login_form" class="well">
		<div class="head_form">
			<a href="index.php"> <span class="glyphicon glyphicon-remove"></span></a>
		</div>
		<h2><center>Login</center></h2>
		
		<hr class="newhr">
		<form method="POST" action="login.php">
		Username: <input type="text" name="username" class="form-control field" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control field" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Login</button>
		<div class="signup">
			Don't have account? <br><a href="signup.php"> Sign up</a></div>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				session_start();
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
				
				include('conn.php');

				function check_input($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$username=check_input($_POST['username']);
					
					if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
						$_SESSION['msg'] = "Username should not contain space and special characters!"; 
						header('location: index.php');
					}
					else{
						
					$fusername=$username;
					
					$password = check_input($_POST["password"]);
					$fpassword=md5($password);
					
					$query=mysqli_query($conn,"select * from `user` where username='$fusername' and password='$fpassword'");
					
					if(mysqli_num_rows($query)==0){
						$_SESSION['msg'] = "Login Failed, Invalid Input!";
						header('location: index.php');
					}
					else{
						
						$row=mysqli_fetch_array($query);
						if ($row['access']==1){
							$_SESSION['id']=$row['userid'];
							?>
							
							<script>
								window.location.href='admin/';
							</script>
							<?php
						}
						else{
							$_SESSION['id']=$row['userid'];
							?>
							
							<script>
								window.location.href='user/';
							</script>
							<?php
						}
					}
					
					}
				}
			?>
			</center>
		</div>
	</div>
</div>
</body>
</html>
