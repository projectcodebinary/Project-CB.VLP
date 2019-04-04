<?php
		$dbhost = "localhost";
		$dbuser = "admin";
		$dbpass = "admin";
		$db = "code-binary-v1";
		
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);
                
                if(! $conn ){
                    die('Could not connect: ' . mysqli_error());
                 }  
?>