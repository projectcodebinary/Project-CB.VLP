<?php
	include('functions.php') ;
	session_start();
	$login_error="";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $pwd = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM cUser WHERE email = '$email' and pwd = '$pwd'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
		
      if($count == 1) {
         $_SESSION['login_email'] = $email;
         header("location: dashboard.php");
      }else {
         $login_error = "Your Email or Password is invalid";
		 echo '<script>document.getElementById("login-form").reset();</script>';
      }
   }
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login: CodeBinary Virtual Learning Platform</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="Project CodeBinary's own Virtual Learning Platform. We believe in hassle-free access. Our platform ensures easy access to all resources, data and reports just a scroll away. Experience it to believe it.">
    <meta name="author" content="CodeBinary">
    <meta name="keywords" content="CodeBinary, Virtual Learning Programme, Virtual Learning Platform">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="shortcut icon" href="assets/img/codebinary_trans.png" />
	
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="assets/img/codebinary-small.png" alt="CodeBinary"></div>
								<p class="lead"><b>Login</b>: Virtual Learning Platform</p>
							</div>
							<form class="form-auth-small" action="" method="post" id="login-form">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
									<input type="email" class="form-control" id="signin-email" name="email" placeholder="Email" required>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password" placeholder="Password" required>
								</div>
								
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								
                            <div>
							<?php
							 if($login_error!="")
							 echo "<small style='color:red'>** $login_error</small>";
							?>
                            </div>
								<div class="bottom">
									</br>&copy; Copyright 2019 <strong>CodeBinary Private Limited</strong>.
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading"><b>All for one, One for all</b></h1>
						<p>We believe in hassle-free access. </p></br>
						<p>Our platform ensures easy access to all resources, data and reports just a scroll away. Experience it to believe it.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
