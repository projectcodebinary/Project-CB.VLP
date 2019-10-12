<?php
   include('session.php');
?>

<?php if($_POST && isset($_POST['assignment_url'])){
	
	$aurl = $_POST['assignment_url'];
	$aid = $_POST['assignment_id'];
	$auid = $_POST['user_id'] ;
	$aname = $_POST['user_name'] ;
	
	// Insert URL
	mysqli_query($conn, "update cScore set r_link = '" . $aurl . "' where user_id = '$auid' and assignment_id = '$aid'");
	
	$email_to = $mentorDrow['email'];
    
    $profile = $aname . ' ' . $login_course_code; // required
    $email_from = "submission@vlp.codebinary.in"; // required
    $subject = "Received. A new assignment submission from VLP"; // required
    $message = "Submission URL: " . $aurl; // required
 
    $email_message = "Submission Details:\n\n";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Profile: ".clean_string($profile)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $subject, $email_message, $headers);  
	
	echo "Your assignment has been submitted. Redirecting.... Please Wait!";
	header("refresh:1; url=dashboard.php");
	
}

?>