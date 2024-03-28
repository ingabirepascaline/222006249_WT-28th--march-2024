<?php
$connection= new mysqli("localhost","root","","mytest");
if ($connection->connect_error) {
	die("connection failed:".$connection->connect_error);
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$email =$_POST['email'];
	$password =$_POST['password'];
	$sql="insert into user (email,password)values('$email','$password')";


	if ($connection->query($sql)==TRUE) {
		echo "REGISTRATION SUCCESSFUL!";
				header("location:login.html");
		exit();
	}else{
		echo "error:".$sql."<br>".$connection->connect_error;
	}
}
$connection->close();

?>