<?php
$user = $_POST["username"];
$pass = $_POST["password"];

if(!file_exists("wallets/$user" . "_qwl")){
file_put_contents("wallets/$user" . "_qwl", "$pass");
file_put_contents("wallets/$user" . "_coins", "0");
file_put_contents("wallets/$user" . "_history", "");

echo "User created :^) <br><a href='index.php'>login</a>";
header("Location: index.php");
}else{
	echo "username already exists<br><a href='index.php'>YOU HAVE TO GO BACK</a>";
}
?>