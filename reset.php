<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HU OBE Software</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        
        <link rel="shortcut icon" href="assets/ico/favicon1.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed1.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed1.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed1.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed1.png">

    </head>

    <body>
    	<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="index.html">HITS Feedback Form</a>  -->
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
					<!--	<li>
							<span class="li-text">
								Put some text or
							</span> 
							<a href="#"><strong>links</strong></a> 
							<span class="li-text">
								here, or some icons: 
							</span> 
							<span class="li-social">
								<a href="#"><i class="fa fa-facebook"></i></a> 
								<a href="#"><i class="fa fa-twitter"></i></a> 
								<a href="#"><i class="fa fa-envelope"></i></a> 
								<a href="#"><i class="fa fa-skype"></i></a>
							</span>
						</li>  -->
					</ul>
				</div>
			</div>
		</nav>

		<div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-2 text">
                            <h1><strong>HU</strong> OBE Software</h1>
								<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>OBE </h3>
                            		<p>LOGIN</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
<?php 
	require("database/db.php");

	$db_email = null;
	$db_code = null;

	if(isset($_GET['code']))
	{
		$get_email = $_GET['email'];
		$get_code = $_GET['code'];

		$query = @mysql_query("select * from login where emailid='$get_email'");

		while($row = mysql_fetch_assoc($query))
		{
			$db_code = $row['passreset'];
			$db_email = $row['emailid'];
		}
		if($get_email == $db_email && $get_code == $db_code)
		{
				echo "
					<form action='pass_reset_complete.php?code=$get_code' method='post'>
					Enter a new password<br><input type='password' name='newpass'><br>
					Re-Enter your password<br><input type='password' name='newpass1'><p>
					<input type='hidden' name='email' value='$db_email'>
					<input type='submit' value='Update Password!'>
					</form> 
				";
		}

	}
	if(!isset($_GET['code']))
	{
	echo "
	<div id='login' class='form-bottom'>
	<form role='form' class='registration-form' action='reset.php' method='post'>
	<div class='form-group'>
	<label class='sr-only' for='form-email'>Email</label>
	<input type='text' name='email' placeholder='Email' class='form-email form-control' id='form-email' required>
	<input type='submit' value='Submit' name='submit'>
	</form>
	      </div>
                    </div>
                    <div class='row'>
<!--                    	<div class='col-sm-6 book'>
                    		<img src='assets/img/ebook_KK.png' alt=''>
                    	</div>
                      <div class='col-sm-5 form-box'>
                        	<div class='form-top'>
                        	
                            </div>
                     
                      </div>
             -->           </div>
                </div>
            </div>
	";

	if(isset($_POST['submit']))
	{
		$email = $_POST['email'];

		$query = mysql_query("Select * from login where emailid='$email'");
		$numrow = mysql_num_rows($query);

		if($numrow!=0)
		{
			while($row = mysql_fetch_assoc($query))
			{
				$db_email = $row['emailid'];
			}

			if($email == $db_email)
			{
				$code = rand(100000,1000000);
				$to = $db_email;
				$subject = "Password Reset";
				$body = "This is an automated email. Please DO NOT REPLY to this email. Thank YOU. click link below or paste it in your browser :- http://localhost/obe/reset.php?code=$code&email=$email

				";
				$headers = 'From: [your_gmail_account_username]@gmail.com' . "\r\n" .
       					'MIME-Version: 1.0'."\r\n".
       					'Content-Type:text/html;charset=utf-8';


				mysql_query("Update login set passreset='$code' where emailid='$email'");
				mail($to, $subject,$body,$headers);
				echo "Check your Email";
			}
		}
		else
		{
			echo "That email doesnt exist";
		}
	}
}
?>

</body>