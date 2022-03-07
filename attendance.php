<?php
include("connection.php");

$userName = $_POST['userName'];
$passWord = $_POST['passWord'];

$sql = "SELECT * FROM attendance WHERE username='$userName' AND password='$passWord'";

$rs = mysqli_query($con, $sql);

if(mysqli_num_rows($rs)==1)
{
	echo "Login Successfully"."<br>";
	session_start();
	$_SESSION["username"] = $userName;

	header('Location: index.php');
	
}else{
	echo "Incorrect Username Password";
}

?>