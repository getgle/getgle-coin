<?php
session_start();

$amount = $_POST["amount"];
$user = $_SESSION["username"];
$pass = $_SESSION["password"];
$pass_file = file_get_contents("wallets/$user" . "_qwl");
$sendmoney = $_POST["transfer"];
$sendwallet = file_get_contents("wallets/$sendmoney" . "_coins");
$wallet = file_get_contents("wallets/$user" . "_coins");
$currentyear = date("d/m/Y, h:i:s");
$history = file_get_contents("wallets/$user" . "_history");
$sendhistory = file_get_contents("wallets/$sendmoney" . "_history");
$ok = "yes";
if($amount > $wallet){
	echo "thats more money than you have get the fuck outta here broke ass nigga :^)<br><a href='wallet.php'>go back</a>";
	$ok = "no";
	}
if($amount < 0){
	echo "we dont negative ok<br><a href='wallet.php'>go back</a>";
	$ok = "no";
	}
if(!$sendmoney == ""){
if($ok == "yes"){
if($pass == $pass_file){
if(file_exists("wallets/$sendmoney" . "_qwl")){
	file_put_contents("wallets/$sendmoney" . "_history", "You have received $amount glee from $user $currentyear<br>" . $sendhistory);
	file_put_contents("wallets/$sendmoney" . "_coins", $sendwallet+$amount);
	file_put_contents("wallets/$user" . "_coins", $wallet-$amount);

	file_put_contents("wallets/$user" . "_history", "You have sent $amount glee to $sendmoney $currentyear<br>" . $history);
	header("Location: wallet.php");
}else{echo "user doesnt exist<br><a href='wallet.php'>go back</a>";}
}
}
}
?>