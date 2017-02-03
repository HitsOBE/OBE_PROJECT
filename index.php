<?php
/*
session_start();
include("functions.php");
$message="";
if(count($_POST)>0) {
	if( $_POST["user_name"] == "admin" and $_POST["password"] == "admin") {
		//$_SESSION["user_id"] = 1001;
		$_SESSION["user_email"] = $_POST["user_email"];
		$_SESSION['loggedin_time'] = time();  
	} else {
		$message = "Invalid Username or Password!";
	}
}

if(isset($_SESSION["email"])) {
	if(!isLoginSessionExpired()) {
		header("Location:user_dashboard.php");
	} else {
		header("Location:logout.php?session_expired=1");
	}
}

if(isset($_GET["session_expired"])) {
	$message = "Login Session is Expired. Please Login Again";
}

*/
include 'login.php';
?>
<!DOCTYPE html>
<html lang="en">

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

		<!-- Top menu -->
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

        <!-- Top content -->
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
								
							       <div id="login" class="form-bottom">
			                    <form role="form" action="login.php" method="post" class="registration-form">
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email" required >
								    </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Password</label>
			                        	<input type="password" name="pass" placeholder="Password" class="form-password form-control" id="form-password" required >
								    </div>
			                        <button type="submit" class="btn" class="center"  name='login' value="login" >Submit</button>
									<span><?php// echo $error; ?></span>
									
									 <a  href="reset.php">Forget Password</a>
			                    </form>
		                    </div>

		                    <div id="error">
									 	<?php
									 	if(isset($_SESSION['error']))
									 	{
									 		echo '<div class="alert alert-danger" role="alert">';
  												echo '<strong>Login Failed!</strong>'.$_SESSION['error'].'';
											echo '</div>';
									 		unset($_SESSION['error']);									 		
									 	}
									 ?>
									 </div>
							
                           <!-- <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>   -->
                        </div>
                    </div>
                    <div class="row">
<!--                    	<div class="col-sm-6 book">
                    		<img src="assets/img/ebook_KK.png" alt="">
                    	</div>
                      <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        	
                            </div>
                     
                      </div>
             -->           </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

	
	
	
	