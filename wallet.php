<img src="getcoin.png" height="600px" width="600px" style="float:right;">

<?php
session_start();
$user = $_SESSION["username"];
$pass = $_SESSION["password"];
$wallet = file_get_contents("wallets/$user" . "_coins");
echo "$user's dank af wallet<br>";
echo "<h2>you have $wallet glee</h2>";

if(isset($_POST["getcoin"])){
	file_put_contents("wallets/$user" . "_coins", $wallet+1);
}
?>
<form action="wallet.php" method="POST">
<input type="submit" name="getcoin" value="hit this button to get glee">(may take a second to update glee wallet)
</form>

<form action="transfer.php" method="POST">
give glee to another person: <input type="text" name="transfer" placeholder="put username here ok">
<input type="text" name="amount" placeholder="amount" style="width:70px"><input type="submit">
</form>
<?php
echo file_get_contents("wallets/$user" . "_history");
?>
<a href="../">go back to getgle homepage</a>