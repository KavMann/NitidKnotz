<?php
   include('connect.php');
   session_start();     
   @$user_check = $_SESSION['user1'];   
   $ses_sql = mysqli_query($conn,"select username from users where username = '$user_check' ");   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
   $login_session = $row['username'];
   if(!isset($_SESSION['user'])){
      //header("location:login.php");
	  	echo '<script>window.location.href="reg.php";</script>';
   }
?> 