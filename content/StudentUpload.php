<?php
   Include("../database/db.php");

   if(isset($SESSION['id']))
   {
     header("location:index.php");
     exit();
   }
   else
   {
     $userData = getUserData($_SESSION['id']);
   }
   ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <script src="jquery.js"></script>
    <meta name="author" content="">
    
    <title>Login OBE Form - Student Upload</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body><p class="hidden" id="fc"><?php echo $userData['faculty_code']; ?></p>

    <!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../Home.php">Login OBE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../Services.php">OBE Scoring</a>
                    </li>
                    <li>
                        <a href="../contact.php">Contact</a>
                    </li>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                    </ul>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('imgs/welcome.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imgs/SU.png');"></div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>

    <!-- Page Content -->
    <div class="container">
    
    <h1 class="">Student Upload</h1>

    <?php
    if (isset($_POST['submit'])) {
  if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
    echo "<h1>" . "File ". $_FILES['filename']['name'] ." uploaded successfully." . "</h1>";
    //echo "<h2>Displaying contents:</h2>";
    //readfile($_FILES['filename']['tmp_name']);
  }

  //Import uploaded file to Database
  $handle = fopen($_FILES['filename']['tmp_name'], "r");
  $headers = fgetcsv($handle, 1000, ",");
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

    $import="INSERT into students(roll_number,name,depart_code,programme_code,semester_code,batch_code,course_code,section_code) values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')";

    mysql_query($import) or die(mysql_error());
  }

  fclose($handle);

  print "Import done";
  header( "refresh:5;url=../Services.php" );

  //view upload form
}else {

  print "Upload new csv by browsing to file and clicking on Upload<br />\n";

  print "<form enctype='multipart/form-data' action='StudentUpload.php' method='post'>";

  print "File name to import:<br />\n";

  print "<input size='50' class='btn btn-info' type='file' name='filename' accept='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel,text/comma-separated-values, text/csv, application/csv' ID='fileSelect'><br />\n";

  print "<input class='btn btn-success' type='submit' name='submit' value='Upload'></form>";

}

?>
<div style="width:300px;border:25px solid green; padding: 25px; margin: 25px; margin-left: 800px;margin-top:-170px">
<p class="lead">If you dont have the template of the sample file, Please click the link to download the csv file:-</p>
<a href="sample.csv" download>Sample Template</a>    
</div>
  

     <footer>
         <div class="row">
             <div class="col-lg-12">
                 <center><p>Hindustan University</p></center>
             </div>
         </div>
     </footer>

    </div>

    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>
<?php ob_end_flush(); ?>
</html>
