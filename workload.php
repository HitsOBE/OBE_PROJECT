<?php
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
    <script>
    function grad()
    {
      var text =  document.getElementById("fc").innerHTML;
    	$('#grad').empty();
    	$('#grad').append("<option>Loading....</option>");
    	$.ajax({
    		type:"POST",
    		url:"Programme.php?fc="+text,
    		contentType:"application/json; charset=utf-8",
    		dataType:"json",
    		success:function(data)
    		{
    			$('#grad').empty();
    			$('#grad').append("<option value='0'>--Select Programme--</option>");
    			$.each(data,function(i,item)
    			{
    				$('#grad').append('<option value="'+data[i].programme +'">'+data[i].programme+'</option>');
    			});
    		},
    		complete:function()
    		{

    		}
    	});

    }

    function course(sid)
    {
  			$('#course').empty();
    				$('#course').append("<option>Loading....</option>");
    				$.ajax({
  			  		type:"POST",
  			  		url:"course.php?sid="+sid,
  			  		contentType:"application/json; charset=utf-8",
  			  		dataType:"json",
  			  		success:function(data)
  			  		{
  			  			$('#course').empty();
  			  			$('#course').append("<option value='0' selected>--Select Course--</option>");
  			  			$.each(data,function(i,item)
  			  			{
  			  				$('#course').append('<option value="'+data[i].course +'">'+data[i].course+'</option>');
  			  			});
  			  		},
  			  		complete:function()
  			  		{

  			  		}
  			  	});
    }

    $(document).ready(function()
    {
    	grad();
    	$("#grad").change(function(){
    		var gradid = $("#grad").val();
    		course(gradid);
    		});
    })
    </script>
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
        }
    ?>


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
      $sqlw = mysql_query("Select * from department where depart_code = '".$userData['department']."'");
      while($row = mysql_fetch_array($sqlw))
      {
      echo "<h5 style='margin-left:800px;'><strong>Department:".$row['depart_name']."<strong></h5>";
        }
      ?>
        <?php

    require 'database/database.php';

    if ( !empty($_POST)) {
        // keep track validation errors
        $faculty = null;
        $depart = null;
        $programme = null;
        $sem = null;
        $course = null;
        $batch = null;
        // keep track post values


        $faculty = $userData['faculty_code'];
        $sem = $_POST['sem'];
        $depart = $userData['department'];
        $programme = $_POST['pou'];
        $course = $_POST['cou'];
        $batch = $_POST['batch'];


        // validate input
        $valid = true;


        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO workload (faculty_code,depart_code,programme_code,sem_code,course_code,batch_code) values(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($faculty,$depart,$programme,$sem,$course,$batch));
            Database::disconnect();
            echo '<div class="alert alert-success alert-dismissible" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>Complete</strong> You successfully completed this form. You will be shortly redirected to services page';
            echo '</div>';
            header("refresh:5;url=Services.php");
            $sql = mysql_query("UPDATE syllabus set Assigned = 1 where course_code = '".$course."'");
        }
    }
?>

  <form style="margin-top: 25px;" class="form-horizontal" action="Workload.php" method="post">

                    <div class="row">
                    <div class="col-md-6">
                    <div class="control-group hidden <?php echo !empty($facultyError)?'error':'';?>">
                        <label class="control-label hidden">Faculty Code</label>
                        <div class="controls">
                            <input name="faculty_code" type="text" class="form-control" placeholder="Faculty Code" value="<?php echo !empty($faculty)?$faculty:''; ?>">
                            <?php if (!empty($facultyError)): ?>
                                <span class="help-inline"><?php echo $facultyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      </div></div>
                    <div class="row">
  					<div class="col-md-6">
                      <div class="control-group <?php echo !empty($periodError)?'error':'';?>">
                        <label class="control-label">Semester code:</label>
                        <select name="sem" class="form-control" required id="combo" style="width:210px;">
                         <option value="" selected="selected" >Choose Semester</option>
                         <?php
                         $sem = mysql_query("SELECT sem_code, sem_name from semester where faculty_code = '".$userData['faculty_code']."'");
                           while($row0 = mysql_fetch_array($sem))
                         {
                           echo'<option value="'.$row0['sem_code'].'">'.$name = $row0['sem_name'].'</option>';
                           //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
                         }
                         ?>
                       </select>
                    </div>
                      </div>
                      </div>

                      <?php
                        $res = mysql_query("SELECT course_name,programme_code,course_code  from syllabus");
                      ?>

                      <div class="row">
                      <div class="col-md-6">
                      <div class="control-group hidden <?php echo !empty($departerror)?'error':'';?>">
                        <label class="control-label hidden">Department Code:</label>
                        <div class="controls">
                            <input class="form-control" name="department" type="text"  placeholder="department" value="<?php echo !empty($depart)?$depart:'';?>">
                            <?php if (!empty($departerror)): ?>
                                <span class="help-inline"><?php echo $departerror;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      </div>
                      </div>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($tloError)?'error':'';?>">
                        <label class="control-label">Programme Code:</label>
                        <select name="pou" required="required" class="form-control" id="grad" style="width:210px;">

                       </select>
                      </div>
                      </div>
                      </div>

                      <?php
                        $res = mysql_query("SELECT course_name,programme_code,course_code  from syllabus");
                      ?>
                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($activitiesError)?'error':'';?>">
                        <label class="control-label">Course Code</label>
                        <select name="cou" required="required" class="form-control" id="course" style="width:210px;">

                       </select>
                        </div>
                        </div>
                        </div>

                        <div class="row">
               <div class="col-md-6">
                          <div class="control-group <?php echo !empty($periodError)?'error':'';?>">
                            <label class="control-label">Batch code:</label>
                            <select name="batch" class="form-control" required id="combo" style="width:210px;">
                             <option value="" selected="selected" >Choose Batch</option>
                             <?php
                             $sem = mysql_query("SELECT batch_code, batch_name from batch where faculty_code = '".$userData['faculty_code']."'");
                               while($row0 = mysql_fetch_array($sem))
                             {
                               echo'<option value="'.$row0['batch_code'].'">'.$name = $row0['batch_name'].'</option>';
                               //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
                             }
                             ?>
                           </select>
                        </div>
                          </div>
                          </div>

                      <div style="margin-top: 10px;" class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="../home.php">Back</a>
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
<?php ob_end_flush(); ?>
</html>
