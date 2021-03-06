<?php
   Include("../../database/db_conection.php");

if(isset($SESSION['id']))
{
  header("location:index.php");
  exit();
}
else
{
  $userData = getUserData($_SESSION['id']);
}

$peo = $_GET['peo'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login OBE Form</title>

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

<body>

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
                <a class="navbar-brand" href="index.html">Login OBE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../../Services.php">OBE Scoring</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
                <div class="fill" style="background-image:url('imgs/peo.png');"></div>
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
    <?php

        require '../database/database.php';

        if ( !empty($_POST)) {
            // keep track validation errors
            $code = null;
            $faculty = null;
            $depart = null;
            $program = null;
            $range = null;
            $outcome = null;
               $dupError = null;
            // keep track post values

            $faculty = $userData['faculty_code'];
            $depart = $userData['department'];
            $program = $_GET['peo'];
            $pec = $_POST['pcode'];
            $name = $_POST['name'];

            // validate input
            $valid = true;

            $sql2 = "SELECT peo_code from peo where peo_code = '".$pec."'";
            $result = mysql_query($sql2);
            $num = mysql_num_rows($result);
            if($num >= 1)
            {
                $valid = false;
                $dupError = "Please try adding a different PEO";
            }

            // insert data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO peo (faculty_code,depart_code,programme_code,peo_code,peo_desc) values(?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($faculty,$depart,$program,$pec,$name));
                Database::disconnect();
                header("Location: ../../peo.php?peo=".$_GET['peo']."");
            }
        }
    ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->

      <hr>
      <!--<h3>Test</h3>  -->
      <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Program Educational Outcome</h3>
                    </div>

                    <?php
                    $sql = mysql_query("Select programme_name from programme where programme_code = '".$_GET['peo']."'");
                    while($row = mysql_fetch_array($sql))
                    {
                    echo "<center><strong>You are adding Program Educational Outomes for ".$row['programme_name']."</strong></center>";
                  } ?>

                    <form class="form-horizontal" action="" method="post">


                      <div class="control-group <?php echo !empty($facultyError)?'error':'';?>">
                        <label class="control-label hidden">Faculty Code</label>
                        <div class="controls">
                            <input name="faculty_code" class="form-control" type="hidden" value="<?php echo !empty($faculty)?$faculty:''; ?>">
                            <?php if (!empty($facultyError)): ?>
                                <span class="help-inline"><?php echo $facultyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                      <div class="control-group <?php echo !empty($departError)?'error':'';?>">
                        <label class="control-label hidden">Department Code</label>
                        <div class="controls">
                            <input name="depart" type="hidden"  placeholder="course_code" value="<?php echo !empty($depart)?$depart:'';?>">
                            <?php if (!empty($departError)): ?>
                                <span class="help-inline"><?php echo $departError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group hidden <?php echo !empty($programError)?'error':'';?>">
                        <label class="control-label">Programme Code</label>
                        <div class="controls">
                            <input name="program" class="form-control" required style="width:300px" type="hidden"  placeholder="Programme code" value="<?php echo !empty($program)?$program:'';?>">
                            <?php if (!empty($programError)): ?>
                                <span class="help-inline"><?php echo $programError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($programError)?'error':'';?>">
                        <label class="control-label">PEO Code</label>
                        <select name="pcode" required class="form-control" style="width:300px;">
                        <option value="">Select A Value</option>
                        <option value="PEO1">PEO1</option>
                        <option value="PEO2">PEO2</option>
                        <option value="PEO3">PEO3</option>
                        <option value="PEO4">PEO4</option>
                        <option value="PEO5">PEO5</option>
                        <option value="PEO6">PEO6</option>
                        <option value="PEO7">PEO7</option>
                        <option value="PEO8">PEO8</option>
                        <option value="PEO9">PEO9</option>
                        <option value="PEO10">PE010</option>
                        <option value="PEO11">PEO11</option>
                        <option value="PEO12">PEO12</option>
                        </select>
                      </div>
                      <div class="control-group <?php echo !empty($outcomeError)?'error':'';?>">
                        <label class="control-label">PEO Description</label>
                        <div class="controls">
                            <textarea name="name" required class="form-control" style="width:300px" placeholder="Program Educational Outcome" value="<?php echo !empty($outcome)?$outcome:'';?>"></textarea>
                            <?php if (!empty($outcomeError)): ?>
                                <span class="help-inline"><?php echo $outcomeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="form-actions" style="margin-top:20px;">
                          <input type="submit" class="btn btn-success" value="Create">
                          <?php $peo = $_GET['peo'];
                           echo "<a class='btn' href='../../peo.php?peo=$peo'>Back</a>"; ?>
                        </div>

                </div></form>

     </div>
                        <?php
                        if(isset($dupError)){
                            echo
                        '<div style="margin-left:350px;margin-top:10px;width:500px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Duplicate Found!</strong>'.$dupError.'</div>'; }?>
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

</html>
