<?php 
    include('connect.php');
	$username='';
	$password='';
	$email='';
	if(isset($_POST['Submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$save=mysqli_query($conn,"INSERT into users(username,password,email)VALUE('".$username."','".$password."','".$email."')");
	echo '<script>window.location.href="login.php";</script>';
	}
?>
