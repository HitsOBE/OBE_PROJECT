<?php

  Include("database/db_conection.php");

if(isset($SESSION['id']))
{
  header("location:index.php");
  exit();
}
else
{
  $userData = getUserData($_SESSION['id']);
}


$query = @mysql_query("SELECT emailid from login where emailid='"$userData['emailid']."'");

	if(mysql_num_rows($query) > 0)
	{
		echo 'pass';
	}
	else
	{
		echo 'fail';
	}
	?>
