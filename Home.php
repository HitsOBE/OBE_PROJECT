<!DOCTYPE html>
<html lang="en">

<head>

  <?php
  ob_start();
Include("database/db_conection.php");
  if(isset($SESSION['id']))
  {
    header("location:index.php");
    exit();
  }
  else
  {
    $userData = getUserData($_SESSION['id']);
  }
    $sql = "Select id from workload where faculty_code = '".$userData['faculty_code']."'";
    $res = mysql_query($sql);
    $num = mysql_num_rows($res);
    $sql1 = "Select id from department where faculty_code = '".$userData['faculty_code']."'";
    $res1 = mysql_query($sql1);
    $num1 = mysql_num_rows($res1);
    $sql2 = "Select id from semester where faculty_code = '".$userData['faculty_code']."'";
    $res2 = mysql_query($sql2);
    $num2 = mysql_num_rows($res2);
    $sql3 = "Select id from batch where faculty_code = '".$userData['faculty_code']."'";
    $res3 = mysql_query($sql3);
    $num3 = mysql_num_rows($res3);
   ?>

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
    <link href="assets/agency.css" rel="stylesheet">
    <link href="assets/footer/demo.css" rel="stylesheet">
    <link href="assets/footer/footer.css" rel="stylesheet">

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
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
                <div class="fill" style="background-image:url('imgs/home.png');"></div>
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

      <?php
      $sqlw = mysql_query("Select * from login where faculty_code = '".$userData['faculty_code']."'");
      while($row = mysql_fetch_array($sqlw))
      {
        if($row['gender'] == 'male' || $row['gender'] == 'Male')
          echo "<h2><center>Welcome Home! Mr.".$row['facultyname']."</center></h2>";
        else if($row['gender'] == 'female' || $row['gender'] == 'Female')
          echo "<h2><center>Welcome Home! Mr.".$row['facultyname']."</center></h2>";
        else
          echo "<h2><center>Welcome Home! ".$row['facultyname']."</center></h2>";
        
?>
<div class="panel panel-primary" style="width:500px">
    <div class="panel-heading">
        <h3 class="panel-title">Profile</h3>
    </div>
    <div class="panel-body">
      <label>
        Faculty Name:
      </label>
      <strong style="margin-left:40px;"><?php echo $row['facultyname']; ?></strong><br>
      <label style="margin-top:20px">
        Faculty Code:
      </label>
      <strong style="margin-left:40px;"><?php echo $row['faculty_code']; ?></strong><br>
      <?php
      $sql = mysql_query("SELECT l.faculty_code,l.department, d.depart_code, d.depart_name from login as
        l,department as d where l.department = d.depart_code And l.faculty_code = '".$userData['faculty_code']."'");
      while($row1 = mysql_fetch_array($sql))
      { ?>
      <label style="margin-top:20px">
      Department:
      </label>
      <strong style="margin-left:50px;"><?php echo $row1['depart_name']; ?></strong><br>
    <?php }?>
      <label style="margin-top:20px">
        Designation:
      </label>
      <strong style="margin-left:50px;"><?php echo $row['designation']; ?></strong><br>
      <label style="margin-top:20px">
        Email ID:
      </label>
      <strong style="margin-left:75px;"><?php echo $row['emailid']; ?></strong><br>
    </div> 
</div>
<?php } ?>
<div class="panel panel-primary" style="width:500px;margin-left:570px;margin-top:-295px">
    <div class="panel-heading">
        <h3 class="panel-title">Workloads</h3>
    </div>
    <div class="panel-body">
      <label style="margin-top:">
        Total Workload:
      </label>
      <strong style="margin-left:97px;"><?php echo $num; ?></strong><br>

      <label style="margin-top:20px">
        Total Departments:
      </label>
      <strong style="margin-left:75px;"><?php echo $num1; ?></strong><br>

      <label style="margin-top:20px">
        Total Semesters:
      </label>
      <strong style="margin-left:91px;"><?php echo $num2; ?></strong><br>

      <label style="margin-top:20px">
        Total Batches:
      </label>
      <strong style="margin-left:106px;"><?php echo $num3; ?></strong><br>
      <?php
      if($num == 0)
      {
        echo "<div class='alert alert-info' role='alert'><center>It Seems you have'nt got a workload. You will be redirected there in few seconds</center></div>";
        header( "refresh:5;url=workload.php" );
      } ?>
    </div>
    <div class="panel-footer"><a href="workload.php" class="btn btn-primary">Create Workload</a></div>
</div>

<?php
  if(isset($_POST['s1']))
  {
    $course = $_POST['cou'];
    $report = $_POST['report'];
    if(isset($_POST['as']))
    {
      $as = $_POST['as'];
    }
    header("Location:Report/$report.php?course=$course&as=$as");
  }
?>

<div class="panel panel-primary" style="width:500px;margin-left:570px;margin-top:40px">

    <div class="panel-heading">
        <h3 class="panel-title">Report Generation</h3>
    </div>
    <div class="panel-body">
      <?php
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on
        w.programme_code = s.programme_code AND w.faculty_code = '".$userData['faculty_code']."'");
       ?>
       <label>Select Course Name:</label>
         <?php echo "<form action='' method='post'>"; ?>
        <select name="cou" class="form-control" required id="combo" style="width:210px;">
         <option value="" selected="selected" >Course Name</option>
         <?php
           while($row = mysql_fetch_array($res))
         {
           echo'<option value="'.$row['course_code'].'">'.$name = $row['course_name'].'</option>';
           //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
         }
         ?>
       </select>
         <label style="margin-top:20px">Select Report Type:</label>
         <select name="report" class="form-control dr" required id="combo" style="width:250px;">
          <option class="hi" value="" selected="selected" disabled>Select one</option>
          <option class="hi" value="co">Course Outcomes</option>
          <option class="sh" name="showTex" value="mark_entry">Marks Entry</option>
        </select>

        <div id="ash">
        <label style="margin-top:20px">Select Assesment Type:</label>
         <select name="as" class="form-control" required id="drs" style="width:250px;">
          <option value="" selected="selected" disabled>Select one</option>
          <option value="i1">Internal Assesment 1</option>
          <option value="i2">Internal Assesment 2</option>
          <option value="Me">Modal Exam</option>
        </select>
        </div>
    </div>
    <div class="panel-footer"><label><strong>Note:</strong>If you haven't used our services, the report generation wont work. So please visit the services panel and start with Course Outcomes</label><button name="s1" type="submit" class="btn btn-primary">Go >> </button></div>
  </form>
</div>
</div>
<ul class="list-group" style="width:500px;margin-top:-347px;margin-left:100px">
  <li class="list-group-item active">Settings</li>
  <a href="Content/StudentUpload.php" class="list-group-item">Student Upload</a>
  <li class="list-group-item">Reset</li>
</ul>
        <!-- Footer -->
        <footer>
            <div class="row" style="margin-top:400px">
                <div class="col-lg-12">
                    <center><p>Hindustan University</p></center>
                </div>
            </div>
        </footer>
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
    <script>
        $(document).ready(function () {
          $("#ash").hide();
         $(".dr").on('change', function() {
      if ( this.value == "mark_entry")
      {
        $("#ash").show();
        $("#drs").prop('required',true);
      }
      else
      {
        $("#ash").hide();
        $("#drs").prop('required',false);
      }
    });
});
</script>
<script>

var locSearch = window.location.search.substring(1).split('&')[0];
if(locSearch){
   alert("There seems to be no records for the selected query");
}
    </script>

<div id="error" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<?php ob_end_flush(); ?>
</html>
