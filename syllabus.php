<?php
   Include("database/db_conection.php");

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
                <a class="navbar-brand" href="Home.php">Login OBE</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Services.php">OBE Scoring</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
                <div class="fill" style="background-image:url('imgs/wl.png');"></div>
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

        <!-- Marketing Icons Section -->
        <div class="row">
    <?php
     if(isset($_POST['feedback_save.php']))
    {
        echo 'FEEEEEEEEEEEEEEEEED';
  }

    ?>

      <hr>
      <!--<h3>Test</h3>  -->


        <?php

    require 'database/database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $course = null;
        $name = null;
        $credit = null;
        $depart = null;
        $programme = null;
        $sem = null;
        // keep track post values


        $sem = $_POST['sem'];
        $depart = $_POST['department'];
        $programme = $_POST['programme'];
        $course = $_POST['course'];
        $name = $_POST['name'];
        $credit = $_POST['credit'];


        // validate input
        $valid = true;




        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO syllabus (course_code,course_name,credit,depart_code,programme_code,sem_code) values(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($course,$name,$credit,$depart,$programme,$sem));
            Database::disconnect();
            echo '<div class="alert alert-success alert-dismissible" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>Complete</strong> You successfully completed this form';
            echo '</div>';
            //header("Location: CourseDeliveryPlan.php");
        }
    }
?>

  <form style="margin-top: 25px;" class="form-horizontal" action="syllabus.php" method="post">

                    <div class="row">
                      <?php
                      $sql = mysql_query("select * from semester");
                       ?>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($tloError)?'error':'';?>">
                        <label class="control-label">Semester Code:</label>
                        <select name="sem" class="form-control" required>
                          <option value="" selected >Select one</option>
                          <?php
                          while($row = mysql_fetch_array($sql))
                          {
                            echo'<option value="'.$row['sem_code'].'">'.$name = $row['sem_code'].'</option>';
                          }
                            ?>
                        </select>
                      </div>
                      </div>
                      </div>


                      <?php
                      $sql = mysql_query("select * from department");
                       ?>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($tloError)?'error':'';?>">
                        <label class="control-label">Department Code:</label>
                        <select name="department" class="form-control" required>
                          <option value="" selected >Select one</option>
                          <?php
                          while($row = mysql_fetch_array($sql))
                          {
                            echo'<option value="'.$row['depart_code'].'">'.$name = $row['depart_code'].'</option>';
                          }
                            ?>
                        </select>
                      </div>
                      </div>
                      </div>

                      <?php
                      $sql = mysql_query("select * from programme");
                       ?>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($tloError)?'error':'';?>">
                        <label class="control-label">Programme Code:</label>
                        <select name="programme" class="form-control" required>
                          <option value="" selected >Select one</option>
                          <?php
                          while($row = mysql_fetch_array($sql))
                          {
                            echo "<option value='".$row['programme_code']."'>".$name = $row['programme_code']."</option>";
                          }
                            ?>
                        </select>
                      </div>
                      </div>
                      </div>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($activitiesError)?'error':'';?>">
                        <label class="control-label">Course Code</label>
                        <div class="controls">
                            <input class="form-control" name="course" required type="text" placeholder="Course Code" value="<?php echo !empty($course)?$course:'';?>">
                            <?php if (!empty($activitiesError)): ?>
                                <span class="help-inline"><?php echo $activitiesError;?></span>
                            <?php endif;?>
                        </div>
                        </div>
                        </div>
                        </div>

                         <div class="row">
                      <div class="col-md-6">
                        <div class="control-group <?php echo !empty($assessmentError)?'error':'';?>">
                        <label class="control-label">Course Name</label>
                        <div class="controls">
                            <input class="form-control" name="name" type="text" required placeholder="Course Name" value="<?php echo !empty($name)?$name:'';?>">
                            <?php if (!empty($assessmentError)): ?>
                                <span class="help-inline"><?php echo $assessmentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      </div>
                      </div>

                        <div class="row">
                      <div class="col-md-6">
                        <div class="control-group <?php echo !empty($assessmentError)?'error':'';?>">
                        <label class="control-label">Credits</label>
                        <div class="controls">
                            <input class="form-control" name="credit" required type="text" placeholder="Credits" value="<?php echo !empty($credit)?$credit:'';?>">
                            <?php if (!empty($assessmentError)): ?>
                                <span class="help-inline"><?php echo $assessmentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      </div>
                      </div>
                      <div style="margin-top: 10px;" class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="../index1.php">Back</a>
                        </div>
                    </form>
                </div>

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

</html>
