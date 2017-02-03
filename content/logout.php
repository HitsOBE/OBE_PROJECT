    <?php  
   

session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}

/**   
	session_start();
	unset($_SESSION["email"]);
	$url = "index.php";
	if(isset($_GET["session_expired"])) {
		$url .= "?session_expired=" . $_GET["session_expired"];
	}
	header("Location:$url");
	
	*/
    ?>  