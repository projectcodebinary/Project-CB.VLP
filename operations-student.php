<?php 
	// Fetching Mentor Details 'mentorD'
	$mentorD_sql = mysqli_query($conn,"select * from cMentor where id = '$login_mentor' ");
	$mentorDrow = mysqli_fetch_array($mentorD_sql,MYSQLI_ASSOC);
	
	// Fetching Course Library 'libraryC'
	$libraryC_sql = mysqli_query($conn,"select * from cCourse where course_code = '$login_course_code' ");
	
	// Fetching Generic Library 'genericLC'
	$genericLC_sql = mysqli_query($conn,"select * from cCourse where course_code = 'GENERIC' ");
	
	// Fetching Project 'projectC'
	$projectC_sql = mysqli_query($conn,"select * from cProject join cUser where cUser.ulive_project_id = cProject.id and cUser.id = '$login_user_id'");
	$projectCrow = mysqli_fetch_array($projectC_sql,MYSQLI_ASSOC);
	
	// Check Score status
	$scoreC_sql = mysqli_query($conn,"select * from cAssignment join cScore where cAssignment.id = cScore.assignment_id and user_id = '$login_user_id'");
	
	// Fetching Assignment Scores'assignmentC'
	$assignmentC_sql = mysqli_query($conn,"select * from cAssignment join cScore where cAssignment.id = cScore.assignment_id and user_id = '$login_user_id'");

?>