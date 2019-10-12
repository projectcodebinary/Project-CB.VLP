<?php
   include('session.php');
   
	if ($login_utype == "DEMO"){
    include('demo-panel.php');
}

    if ($login_utype == "STUDENT"){
    include('student-panel.php');
}
?>
  