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
                <a class="navbar-brand" href="../../home.php">Login OBE</a>
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
                <div class="fill" style="background-image:url('imgs/po.png');"></div>
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
            $program = $_GET['po'];
            $range = $_POST['poc'];
            $outcome = $_POST['pout'];

            // validate input
            $valid = true;

            $sql2 = "SELECT po_code from po where po_code = '".$range."'";
            $result = mysql_query($sql2);
            $num = mysql_num_rows($result);
            if($num >= 1)
            {
                $valid = false;
                $dupError = "Please try adding a different PO";
            }

            // insert data
            if ($valid) {
                $pdo = Database::connect();
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO po (faculty_code,depart_code,programme_code,po_code,po_outcome) values(?,?,?,?,?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($faculty,$depart,$program,$range,$outcome));
                Database::disconnect();
                header("Location: ../../PEO.php?peo=$program");
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
                        <h3>Create a Programme Outcome</h3>
                    </div>

                    <?php
                    $sql = mysql_query("Select programme_name from programme where programme_code = '".$_GET['po']."'");
                    while($row = mysql_fetch_array($sql))
                    {
                    echo "<center><strong>You are adding Programme Outcomes for ".$row['programme_name']."</strong></center>";
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
                            <input name="depart" type="hidden"  placeholder="program_code" value="<?php echo !empty($depart)?$depart:'';?>">
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
                      <div class="control-group hidden <?php echo !empty($codeError)?'error':'';?>">
                        <label class="control-label">Programme Code</label>
                        <div class="controls">
                            <input name="course_code" type="hidden" class="form-control" style="width:300px"  placeholder="Course Code" value="<?php echo !empty($code)?$code:'';?>">
                            <?php if (!empty($codeError)): ?>
                                <span class="help-inline"><?php echo $codeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($programError)?'error':'';?>">
                        <label class="control-label">PO Code</label>
                        <select name="poc" required class="form-control" style="width:300px;">
                        <option value="">Select A Value</option>
                        <option value="PO1">PO1</option>
                        <option value="PO2">PO2</option>
                        <option value="PO3">PO3</option>
                        <option value="PO4">PO4</option>
                        <option value="PO5">PO5</option>
                        <option value="PO6">PO6</option>
                        <option value="PO7">PO7</option>
                        <option value="PO8">PO8</option>
                        <option value="PO9">PO9</option>
                        <option value="PO10">P010</option>
                        <option value="PO11">PO11</option>
                        <option value="PO12">PO12</option>
                        </select>
                      </div>
                      <div class="control-group <?php echo !empty($outcomeError)?'error':'';?>">
                        <label class="control-label">Programme Outcome Actual</label>
                        <div class="controls">
                            <textarea name="pout" required class="form-control" style="width:300px" placeholder="Programme Outcome" value="<?php echo !empty($outcome)?$outcome:'';?>"></textarea>
                            <?php if (!empty($outcomeError)): ?>
                                <span class="help-inline"><?php echo $outcomeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>


                      <div class="form-actions" style="margin-top:20px;">
                          <input type="submit" class="btn btn-success" value="Create">
                          <?php $program = $_GET['po'];
                           echo "<a class='btn' href='../../PEO.php?peo=$program'>Back</a>"; ?>
                        </div>
                        <?php
                        if(isset($dupError)){
                            echo
                        '<div style="margin-left:350px;margin-top:10px;width:500px;" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Duplicate Found!</strong>'.$dupError.'</div>'; }?>
                </div></form>

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
