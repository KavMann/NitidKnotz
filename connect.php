<?php

    $servername="localhost";

	$username="root@localhost";

	$password="";

	$dbname="ntidknotz";

	

	$conn = mysqli_connect($servername, $username, $password,$dbname);

	

	

	if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}

?>



