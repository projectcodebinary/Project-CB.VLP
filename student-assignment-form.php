<?php
   include('session.php');
?>

<!doctype html>
<html lang="en">

<head>
	<title>Assignment Submission: CodeBinary Virtual Learning Program</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="Project CodeBinary Virtual Learning Platform">
    <meta name="author" content="CodeBinary">
    <meta name="keywords" content="CodeBinary, Virtual Learning Programme, Virtual Learning Platform">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="shortcut icon" href="assets/img/codebinary_trans.png" />
</head>

<body>
	<div id="wrapper">
		<div class="main" style="width:100%; padding-top: 0px; overflow-x:hidden;">
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Assignment Submisson for <b><?php echo $login_fname . ' ' . $login_lname; ?><b></h3>
					<div class="row">
						<div class="col-md-12">
							<div class="panel"></br>
								<div class="panel-body">
									<form action="submit-assignment.php" method="post">
									<input type="hidden" value="<?php echo $login_user_id; ?>" name="user_id" />
									<input type="hidden" value="<?php echo $login_fname . ' ' . $login_lname; ?>" name="user_name" />
									<label>Assignment Name</label>
									<select class="form-control" name="assignment_id">
									<?php
												while($assignmentCT = mysqli_fetch_array($assignmentC_sql,MYSQLI_ASSOC))
												{
													if ($assignmentCT['r_link'] ==NULL){
														echo '<option value="' . $assignmentCT['assignment_id'] . '">' . $assignmentCT['title'] . '</option>';
													}
												}
												
												?>
									</select>
									<br>
									<label>Project URL</label>
									<textarea class="form-control" placeholder="Enter URL" rows="4" name="assignment_url" required></textarea>
									<br>
									<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> &nbsp;Submit</button>
									</form>
								</div>
								<div class="panel-heading">
									<h6 class="panel-title" style="color:red"><small><i class="fa fa-exclamation-triangle"></i> &nbsp;This action can't be undone!</small></h6>
								</div>
							</div>
						</div>
						</div>
				</div>
			</div>
		</div>
		
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2019 <a href="http://codebinary.in/" target="_blank">CodeBinary</a>. All Rights Reserved.</br>
				<a href="https://community.codebinary.in/" target="_blank">CodeBinary Community Page</a><br>
				<a href="https://github.com/projectcodebinary" target="_blank">Find Us on GitHub</a></p>
			</div>
		</footer>
	</div>
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
