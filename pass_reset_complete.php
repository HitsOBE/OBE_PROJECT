<?php
	require("database/db.php");

	$newpass = $_POST['newpass'];
	$newpass1 = $_POST['newpass1'];
	$post_email = $_POST['email'];
	$code = $_GET['code'];

	if($newpass = $newpass1)
	{
		$enc_pass = md5($newpass);
		
		mysql_query("update login set password='$enc_pass' where emailid='$post_email'");
		mysql_query("update login set passreset='0' where emailid='$post_email'");

		echo "Your password has been  Updated <p><a href='index.php'>CLick here to login</a></p>";
	}

	else
	{
		echo "Password must match. <a href='reset.php?code=$code&email=$post_email'>Click here to go back</a>";
	}
?>