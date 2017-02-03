<?php  
     
    include("database/db_conection.php");  
      
      
      
        //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }
      
      //echo 'hii', $dbcon1;
      
      
     // echo 'hii';
      
    if(isset($_POST['login']))  
    {  
        $user_email=$_POST['email'];  
        $user_pass=$_POST['pass'];  
        //$user_pass=hash("sha512", $user_pass);
        $user_pass=md5($user_pass);
        
        //echo 'Email ID : ', $user_email;
        //echo '<br> Password : ', $user_pass;
        
      
        $check_user="select id from login WHERE emailid='$user_email' AND password='$user_pass'";  
        
        
      
        $run=mysql_query($check_user, $dbcon1) or die ('error reading database');  
      
      
      
        if(mysql_num_rows($run) == 1)  
        {  
            
            //Login Successful
            //session_regenerate_id();
            $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  

            //session_write_close();
            echo "<script>window.open('welcome.php','_self')</script>";  
            
            $data = mysql_fetch_array($run,1);
            $_SESSION['id'] = $data['id'];
             header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.  
             exit();
      
        }  
        else  
        {  
        //Login failed
            echo "<script>window.open('index.php','_self')</script>";  
            header("location: index.php");
            exit();
        
        
         // echo "<script>alert('Email or password is incorrect!')</script>";
    /*
          header("Location: index.php");//redirect to login page to secure the welcome page without login access. 
          exit;
          */
        }  
    }   
    ?>  
    <?php  
 //session starts here  
	
		//Unset the variables stored in session
	//unset($_SESSION['user_email']);
	//unset($_SESSION['SESS_FIRST_NAME']);
	//unset($_SESSION['SESS_LAST_NAME']);
      
    ?>  
	
    <html>  
    <head lang="en">  
        <meta charset="UTF-8">  
        <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">  
        <title>Login</title>  
    </head>  
    <style>  
        .login-panel {  
            margin-top: 150px;  
      
    </style>  
      
    <body>  
      
   <!--
    <div class="container">  
        <div class="row">  
            <div class="col-md-4 col-md-offset-4">  
                <div class="login-panel panel panel-success">  
                    <div class="panel-heading">  
                        <h3 class="panel-title">Sign In</h3>  
                    </div>  
                    <div class="panel-body">  
                        <form role="form" method="post" action="login.php">  
                            <fieldset>  
                                <div class="form-group"  >  
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                                </div>  
                                <div class="form-group">  
                                    <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                                </div>  
      
      
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >  
      
                                <!-- Change this to a button or input when using this as a form -->  
                              <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
       <!--                     </fieldset>  
                        </form>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
      -->
      
	  <?php
	  
	   echo 'Welcome';
	   
	   ?>
	  
    </body>  
      
    </html>  
      
   