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
                        <a href="contact.php">Contact</a>
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
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('imgs/qps.png');"></div>
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
        // keep track post values

        $faculty = $_POST['faculty_code'];
        $depart = $_POST['depart'];
        $program = $_POST['program'];
        $code = $_POST['course_code'];
        $range = $_POST['range'];
        $outcome = $_POST['co_outcome'];

        // validate input
        $valid = true;

        if (empty($faculty)) {
            $facultyError = 'Please enter Faculty Code';
            $valid = false;
        }

        if (empty($depart)) {
            $departError = 'Please enter department Code';
            $valid = false;
        }

        if (empty($program)) {
            $programError = 'Please enter programme Code';
            $valid = false;
        }


        if (empty($code)) {
            $codeError = 'Please enter Course Code';
            $valid = false;
        }

        if (empty($range)) {
            $rangeError = 'Please enter course range';
            $valid = false;
        }

        if (empty($outcome)) {
            $outcomeError = 'Please enter Course Outcome';
            $valid = false;
        }

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO co (faculty_code,depart_code,programme_code,course_code,co_range,co_outcome) values(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($faculty,$depart,$program,$code,$range,$outcome));
            Database::disconnect();
            header("Location: ../CourseOutcomes.php");
        }
    }
?>
      <div class="span10 offset1">
                    <div class="row">
                        <h3>Create a Customer</h3>
                    </div>

                    <form class="form-horizontal" action="courseadd.php" method="post">


                      <div class="control-group <?php echo !empty($facultyError)?'error':'';?>">
                        <label class="control-label">Faculty Code</label>
                        <div class="controls">
                            <input name="faculty_code" type="text"  placeholder="course_code" value="<?php echo !empty($faculty)?$faculty:'';?>">
                            <?php if (!empty($facultyError)): ?>
                                <span class="help-inline"><?php echo $facultyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($departError)?'error':'';?>">
                        <label class="control-label">Department Code</label>
                        <div class="controls">
                            <input name="depart" type="text"  placeholder="course_code" value="<?php echo !empty($depart)?$depart:'';?>">
                            <?php if (!empty($departError)): ?>
                                <span class="help-inline"><?php echo $departError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($programError)?'error':'';?>">
                        <label class="control-label">Programme Code</label>
                        <div class="controls">
                            <input name="program" type="text"  placeholder="course_code" value="<?php echo !empty($program)?$program:'';?>">
                            <?php if (!empty($programError)): ?>
                                <span class="help-inline"><?php echo $programError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($codeError)?'error':'';?>">
                        <label class="control-label">Course Code</label>
                        <div class="controls">
                            <input name="course_code" type="text"  placeholder="course_code" value="<?php echo !empty($code)?$code:'';?>">
                            <?php if (!empty($codeError)): ?>
                                <span class="help-inline"><?php echo $codeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($rangeError)?'error':'';?>">
                        <label class="control-label">Course Range</label>
                        <div class="controls">
                            <input name="range" type="text"  placeholder="course_code" value="<?php echo !empty($range)?$range:'';?>">
                            <?php if (!empty($rangeError)): ?>
                                <span class="help-inline"><?php echo $rangeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($outcomeError)?'error':'';?>">
                        <label class="control-label">Course Name</label>
                        <div class="controls">
                            <input name="co_outcome" type="text" placeholder="co_outcome" value="<?php echo !empty($outcome)?$outcome:'';?>">
                            <?php if (!empty($outcomeError)): ?>
                                <span class="help-inline"><?php echo $outcomeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="../CourseOutcomes.php">Back</a>
                        </div>
                    </form>
                </div>

     </div>
            ?>
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->

        <!-- /.row -->

        <!-- Features Section -->
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <center><p>Hindustan University</p></center>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
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
