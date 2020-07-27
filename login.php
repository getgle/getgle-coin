<?php
session_start();
error_reporting(0);

$user = $_POST["username"];
$pass = $_POST["password"];
if($pass == file_get_contents("wallets/$user" . "_qwl")){
	echo "success";
	$_SESSION["username"] = $user;
	$_SESSION["password"] = $pass;
	header("Location: wallet.php");
}
else{
	echo "login failed xd<br><a href='index.php'>YOU HAVE TO GO BACK</a>";
}
?>