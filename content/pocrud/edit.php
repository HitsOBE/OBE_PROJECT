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

    require '../database/database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
if ( $id==null) {
        header("Location: ../../index1.php");
    }


    if ( !empty($_POST)) {
        // keep track validation errors
        $code = null;
        $faculty = null;
        $depart = null;
        $program = null;
        $range = null;
        $outcome = null;
        // keep track post values

        $faculty = $userData['faculty_code'];
        $depart = $userData['department'];
        $program = $_GET['cc'];
        $range = $_POST['range'];
        $outcome = $_POST['co_outcome'];

        // validate input
        $valid = true;

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE po set faculty_code = ? ,depart_code = ?,programme_code = ?,po_code = ?,po_outcome = ? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($faculty,$depart,$program,$range,$outcome,$id));
            Database::disconnect();
            header("Location: ../../PEO.php?peo=$program");
        }
    }
?>

<div class="span10 offset1">
                    <div class="row">
                        <h3>Edit Programme Outcomes</h3>
                    </div>
<?php
                    $sql1 = mysql_query("SELECT po_code, po_outcome from po where id = '".$_GET['id']."'");
                    while($row = mysql_fetch_array($sql1))
                    {
?>
                    <form class="form-horizontal" action="" method="post">


                      <div class="control-group <?php echo !empty($facultyError)?'error':'';?>">
                        <label class="control-label hidden">Faculty Code</label>
                        <div class="controls">
                            <input name="faculty_code" type="hidden" class="form-control" style="width:300px"  placeholder="Course Code" value="<?php echo !empty($faculty)?$faculty:'';?>">
                            <?php if (!empty($facultyError)): ?>
                                <span class="help-inline"><?php echo $facultyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($departErrorError)?'error':'';?>">
                        <label class="control-label hidden">Department Code</label>
                        <div class="controls">
                            <input name="depart" type="hidden" class="form-control" style="width:300px"  placeholder="Department Code" value="<?php echo !empty($depart)?$depart:'';?>">
                            <?php if (!empty($departError)): ?>
                                <span class="help-inline"><?php echo $departError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group hidden <?php echo !empty($programError)?'error':'';?>">
                        <label class="control-label">Programme Code</label>
                        <div class="controls">
                            <input name="program" type="hidden" class="form-control" style="width:300px"  placeholder="programme Code" value="<?php echo !empty($program)?$program:'';?>">
                            <?php if (!empty($programError)): ?>
                                <span class="help-inline"><?php echo $programError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group hidden <?php echo !empty($codeError)?'error':'';?>">
                        <label class="control-label">Course Code</label>
                        <div class="controls">
                            <input name="course_code" type="hidden" class="form-control" style="width:300px"  placeholder="course_code" value="<?php echo !empty($code)?$code:'';?>">
                            <?php if (!empty($codeError)): ?>
                                <span class="help-inline"><?php echo $codeError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($programError)?'error':'';?>">
                        <label class="control-label">PO Code</label>
                        <select name="poc" required class="form-control" style="width:300px;">
                        <option disabled selected value="">Your Previous selection was <?php echo $row['po_code']; ?></option>
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
                            <textarea name="co_outcome" required type="text" class="form-control" style="width:300px" placeholder="Programme Outcome" value="<?php echo $row['po_outcome'];?>"><?php echo $row['po_outcome'];?> </textarea>
                            <?php if (!empty($outcomeError)): ?>
                                <span class="help-inline"><?php echo $outcomeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>

                      <?php } ?>
                      <div class="form-actions" style="margin-top:20px;">
                          <button type="submit" class="btn btn-success">Edit</button>
                          <?php $program = $_GET['cc'];
                           echo "<a class='btn' href='../../CourseOutcomes.php?pro=$program'>Back</a>"; ?>
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
