<?php if($_POST && isset($_POST['assignmentList'])){
	
	// Fetch Assignment List
	$assignmentL_sql = mysqli_query($conn, "select * from cAssignment where course_code = '$login_course_code'");
	
	while ($assignmentL = mysqli_fetch_array($assignmentL_sql,MYSQLI_ASSOC)){
		$assignment_id = $assignmentL['id'];
		
		mysqli_query($conn, "insert into cScore (user_id, assignment_id, status, score) values ('$login_user_id', '$assignment_id', 0,
		0)" );
	}
	
	header("location: logout.php");
}

?>
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard: CodeBinary Virtual Learning Platform</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="description" content="Project CodeBinary Virtual Learning Platform">
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
<style>
html {
		scroll-behavior: smooth;
		overflow-x: hidden;
	}
</style>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" id="keywords" placeholder="Highlight..">
					</div>
				</form>
				<div class="navbar-btn navbar-btn-right">
					<a class="btn btn-danger" href="logout.php" title="One-touch Logout"><i class="fa fa-sign-out"></i> <span>One-touch Logout</span></a>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#feedback">Feedback Form</a></li>
								<li><a href="https://codebinary.in/privacy-policy.html" target="_blank">Privacy Policy</a></li>
								<li><a href="https://codebinary.in/terms-of-service.html" target="_blank">Terms of Service</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-user"></i> <span><?php echo $login_fname . ' ' . $login_lname; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-apartment"></i> <span><?php echo $login_institute; ?></span></a></li>
								<li><a href="#"><i class="lnr lnr-bullhorn"></i> <span><?php echo "C.A. Code: $login_ambassador" ; ?></span></a></li>
								<li><a href="#"><i class="lnr lnr-layers"></i> <span><?php echo "Course Code: $login_course_code" ; ?></span></a></li>
								<li><a href="#"><i class="lnr lnr-unlink"></i><span style="color:red"><?php echo "Account Expires on $login_do_expire"; ?></span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="student-assignment-form.php"><button type="button" class="btn btn-success"><i class="fa fa-plus-square"></i>Submit Assignment</button></a></li>
						<li><a href="#library" class=""><i class="lnr lnr-book"></i> <span>Library</span></a></li>
						<li><a href="#assignment" class=""><i class="lnr lnr-pencil"></i> <span>Assignment List</span></a></li>
						<li><a href="#mentor" class=""><i class="lnr lnr-briefcase"></i> <span>Mentor Details</span></a></li>
						<li><a href="#project" class=""><i class="lnr lnr-rocket"></i> <span>LIVE Project Details</span></a></li>
						<li><a href="#score" class=""><i class="lnr lnr-chart-bars"></i> <span>Score Graph</span></a></li>
						<li><a href="#progress" class=""><i class="lnr lnr-star-half"></i> <span>Progress Reports</span></a></li>
						<li><a href="#feedback" class=""><i class="lnr lnr-thumbs-up"></i> <span>Feedback Form</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		
		<div class="main" id="search_para">
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<i class="fa fa-check-circle"></i> Welcome <?php echo $login_fname; ?> to CodeBinary's own Virtual Learning Plaform
						</div>
						<div class="col-lg-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-briefcase"></i></span>
									<p>
										<span class="title">Course Mentor</span>
										<span class="number">
										<?php
											   
													if($row['umentor_id']!=NULL){
														echo '
														<span class="badge badge-success">&nbsp;Assigned</span>';
													}
													else {
														echo '<span class="badge badge-danger">&nbsp;Not Assigned</span>';
													}
													
											   
												?>
										</span>
									</p>
							</div>
						</div>
						
						<div class="col-lg-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-rocket"></i></span>
									<p>
										<span class="title">LIVE Project</span>
										<span class="number">
										<?php
											   
													if($row['ulive_project_id']!=NULL){
														echo '
														<span class="badge badge-success">&nbsp;Assigned</span>';
													}
													else {
														echo '<span class="badge badge-danger">&nbsp;Not Assigned</span>';
													}
													
											   
												?>
										</span>
									</p>
							</div>
						</div>
						
						<div class="col-lg-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-certificate"></i></span>
									<p>
										<span class="title">Course Certificate</span>
										<span class="number">
										<?php
											   
													if($row['ucerti_status']!=0){
														echo '
														<span class="badge badge-success">&nbsp;Issued</span>';
													}
													else {
														echo '<span class="badge badge-danger">&nbsp;Not Issued</span>';
													}
													
											   
												?>
										</span>
									</p>
							</div>
						</div>
						
						<div class="col-lg-3">
							<div class="metric">
								<span class="icon"><i class="fa fa-certificate"></i></span>
									<p>
										<span class="title">Project Certificate</span>
										<span class="number">
										<?php
											   
													if($row['ucerti_status']!=0){
														echo '
														<span class="badge badge-success">&nbsp;Issued</span>';
													}
													else {
														echo '<span class="badge badge-danger">&nbsp;Not Issued</span>';
													}
													
											   
												?>
										</span>
									</p>
							</div>
						</div>
					</div>
							
					<div class="row">
						<div class="col-lg-12"  id="library">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-book"></i> &nbsp;<b>Library</b></h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								</div>
							<div class="panel-body" style="overflow-x:auto;">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Title</th>
											<th>Author</th>
											<th>Course Code</th>
											<th>Access Link</th>
										</tr>
									</thead>
										<tbody>
											<?php
													while($libraryC = mysqli_fetch_array($libraryC_sql,MYSQLI_ASSOC))
												{
													echo '<tr>
													<td>' . $libraryC['title'] . '</br>&nbsp;</td>
													<td>' . $libraryC['author'] . '</td>
													<td>' . $libraryC['course_code'] . '</td>
													<td><a href="' . $libraryC['r_link'] . '" target="_blank"><small>View</small></a><td>
													</tr>';
												
												}
												
													while($genericLC = mysqli_fetch_array($genericLC_sql,MYSQLI_ASSOC))
												{
													echo '<tr>
													<td>' . $genericLC['title'] . '</br>&nbsp;</td>
													<td>' . $genericLC['author'] . '</td>
													<td>' . $genericLC['course_code'] . '</td>
													<td><a href="' . $genericLC['r_link'] . '" target="_blank">View</a><td>
													</tr>';
												
												}
													
												
											
											?>
										</tbody>
								</table>
							</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6" id="score">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-chart-bars"></i> &nbsp;<b>Score Graph</b></h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								</div>
							<div class="panel-body">
								<div id="curve_chart"></div>
							</div>
							</div>
						</div>
						
						<div class="col-lg-6"  id="mentor">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-briefcase"></i> &nbsp;<b>Mentor Details</b></h3>
								<div class="right">
									<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								</div>
							<div class="panel-body">
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<h3 class="name"><?php echo $mentorDrow['fname'] . ' ' . $mentorDrow['lname']; ?></h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-6 stat-item">
												<span><b>Institution</b></span></br><?php echo $mentorDrow['institution']; ?>
											</div>
											<div class="col-md-3 stat-item">
												<span><b>Country</b></span></br><?php echo $mentorDrow['country']; ?>
											</div>
											<div class="col-md-3 stat-item">
												<span><b>Say Hello!</b></span></br><a href="mailto:<?php echo $mentorDrow['email']?>" target="_blank" style="color:white"><i class="lnr lnr-envelope"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12" id="assignment">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-pencil"></i> &nbsp;<b>Assignment List</b></h3>
								<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								</div>
							<div class="panel-body"  style="overflow-x:auto;">
								<table class="table table-striped" id="tblData">
									<thead>
										<tr>
											<th>Title</th>
											<th>Status</th>
											<th>Score</th>
											<th>Review</th>
											<th>Project Link</th>
										</tr>
									</thead>
									<tbody>
										<?php
												$progress=0;
												while($assignmentCT = mysqli_fetch_array($assignmentC_sql,MYSQLI_ASSOC))
												{
													echo '<tr>
                                                    <td>' . $assignmentCT['title'] . '</br>
                                                            <span>
                                                                <a href="' . $assignmentCT['r_link'] . '" target="_blank"><small style="color:blue">Description</small></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>';
														if($assignmentCT['status'] == 0){
															echo '<span class="label label-warning">PENDING</span>';
														}
														else{
															echo '<span class="label label-success">COMPLETED</span>';
														}
														
                                                    echo '</td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h5>' . $assignmentCT['score'] . '</h5>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h5>' . $assignmentCT['comments'] . '</h5>
                                                        </div>
                                                    </td>
													<td><a href="' . $assignmentCT['r_link'] . '" target="_blank">View</a></td>
													</tr>';
													
													$progress= $progress + $assignmentCT['score'];
												}
												
												?>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-md-12 text-right">
										<?php 
									
										if (!mysqli_num_rows($scoreC_sql)) {
											echo '<form action="" method="post">
											<input type="hidden" name="assignmentList" value="assignmentList" />
											<button class="btn btn-primary" type="submit">View *requires re-login</button>
											</form>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
						<div class="col-lg-6" id="project">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-database"></i> &nbsp;<b>LIVE Project Details</b></h3>
								<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								</div>
							<div class="panel-body">
								<?php 
									if($row['ulive_project_id']!=NULL){
										
										echo '<h4><b>Project- ' . $projectCrow['pname'] . '</b></h4></br>
									<p><b>In Ownership of: </b>' . $projectCrow['owner'] . '</br>
									<b>Sponsored by: </b>' . $projectCrow['sponsor'] . '</br></br>
									<b>Repository Availble on: </b><a href="' . $projectCrow['r_link'] . '">Github</a>';
										
									}
								
								?>	
							</div>
							</div>
						</div>
						
						<div class="col-lg-6" id="progress">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-star-half"></i> &nbsp;<b>Progress Reports</b></h3>
								<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
								</div>
							<div class="panel-body">
								<ul class="list-unstyled task-list">
									<li>
										<h5>Overall Progress</h5>
										<div class="progress">
											<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progress; ?>%">
											<span class="sr-only"><?php echo $progress; ?></span>
											</div>
										</div>
									</li>
								</ul>
									<button type="button" class="btn btn-danger btn-lg" onclick="exportTableToExcel('tblData')"><i class="fa fa-download"></i> &nbsp;Download Report</button></br></br>
							</div>
							</div>
						</div>
					
						<div class="col-lg-12" id="feedback">
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="lnr lnr-thumbs-up"></i> &nbsp;<b>Feedback Form</b></h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
									</div>
								</div>
								<div class="panel-body">
								<form class="feedbackForm" action="contactform.php" method="post">
									<input type="hidden" class="form-control" name="profile" value="<?php echo $login_fname . ' ' . $login_lname . ' ' . $login_utype . ' ' . $login_course_code ; ?>" /> 
									<textarea class="form-control" placeholder="Write here..." name="feedback" rows="4"></textarea></br>
									<button type="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> &nbsp;Post</button>
								</form>
								</div>
							</div>
						</div>
				</div>
				
				<div class="container-fluid">
					<p class="copyright">&copy; Copyright 2019 <a href="http://codebinary.in/" target="_blank">CodeBinary Private Limited</a></br>
					<a href="https://community.codebinary.in/" target="_blank">CodeBinary Community Page</a><br>
					<a href="https://github.com/projectcodebinary" target="_blank">Find Us on GitHub</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="assets/scripts/main.js"></script>
	
	<script type="text/javascript">
	window.addEventListener("DOMContentLoaded", function(e) {
    var myHilitor2 = new Hilitor("searcj_para");
    myHilitor2.setMatchType("left");
    document.getElementById("keywords").addEventListener("keyup", function(e) {
      myHilitor2.apply(this.value);
    }, false);
  }, false);

	</script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Assignment', 'Score'], 
		<?php
		
			$assignmentG_sql = mysqli_query($conn,"select * from cAssignment join cScore where cAssignment.id = cScore.assignment_id and user_id = '$login_user_id'");
			
			while($assignmentG = mysqli_fetch_array($assignmentG_sql,MYSQLI_ASSOC)){
            echo "['".$assignmentG['assignment_id']."', ".$assignmentG['score']."],";
			} 
		?>
        ]);

        var options = {
          title: '',
		  hAxis: {title: 'AssignmentID'},
		  vAxis: {title: 'Score'},
          curveType: 'function'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script> 
</body>
</html>
