<?php
if(isset($_POST['feedback'])) {
 
    $email_to = "contact@codebinary.in";
    
    $profile = $_POST['profile']; // required
    $email_from = "feedback@vlp.codebinary.in"; // required
    $subject = "Received. A new feedback from VLP"; // required
    $message = $_POST['feedback']; // required
 
    $email_message = "Feedback Details:\n\n";
 
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

echo "Thank You for your feedback. Redirecting.... Please Wait!";
header("refresh:1; url=dashboard.php");

}
?>
