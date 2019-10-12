<?php
   include('functions.php');
   session_start();
   
   $user_check = $_SESSION['login_email'];
   
   $ses_sql = mysqli_query($conn,"select * from cUser where email = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_user_id = $row['id'];
   $login_fname = $row['fname'];
   $login_lname = $row['lname'];
   $login_institute = $row['institute'];
   $login_utype = $row['utype'];
   $login_mentor = $row['umentor_id'];
   $login_ambassador = $row['uambassador_id'];
   $login_course_code = $row['course_code'];
   $login_do_expire = $row['do_expire'];
   
   if(!isset($_SESSION['login_email'])){
      header("location:index.php");
      die();
   }
   
   if($login_utype == "STUDENT" || $login_utype == "DEMO"){
   include('operations-student.php');
   }
?>