   <?php
//    session_start();

    //if(!$_SESSION['email'])
    //{

       // header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
    //}

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>FeedBack Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Content/css/bootstrap.min.css">
  <link rel="stylesheet" href="Content/css/panel.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="Content/js/bootstrap.min.js"></script>
  <script>
        $(document).ready(function(){
            $("#animate").click(function(){
                $("div").animate({left: '250px'});
    });
});
</script>
<style>
     
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
	   </button>

      <!-- <a class="navbar-brand" href="#">Logo</a>  -->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
<!--      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul> -->
	    <p  class='text-info' > <?php  //echo $_SESSION['email'];  ?>  </p>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        <li><a href="Welcome.php"><span class="glyphicon glyphicon-home"></span> Homepage</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <!--<p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>  -->
    </div>
    <div class="col-sm-8 text-left">
      <!--<h1>Welcome to Feedback Form</h1>  -->
      <p> <?php // include('feedback.php'); // feedback Script  ?> </p>

	  <?php
	   if(isset($_POST['feedback_save.php']))
    {
	      echo 'FEEEEEEEEEEEEEEEEED';
	}

	  ?>

    
      <hr>
            <div style="margin-right: 50px;" class="ques">
      <p></p>
</div>
     <div class="row">
                <div class="col-lg-3 col-md-6" style="padding-left: 90px;">
                    <div class="panel panel-primary" style="height: 160px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3" >
                                    <i class="glyphicon glyphicon-road jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">CO1</div>
                                    <div>Course Outcomes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="CourseOutcomes.php"><span class="pull-left">View Details</span></a>
                                <a href="#"><span class="pull-right"><i class="glyphicon glyphicon-play"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-offset-3 col-md-6" >
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-globe jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">CO & PO </div>
                                    <div>Course Outcomes & Programme Outcome Mapping</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="ProgramOutcomes.php"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6" style="padding-left: 90px;">
                    <div class="panel panel-black" style="height: 160px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-book jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">CO/PO</div>
                                    <div>Attainment Report</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="AttainmentReport.php" class="dis"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-offset-3 col-md-6">
                    <div class="panel panel-red" style="height: 160px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-check jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">CDP</div>
                                    <div>Course Delivery Plan</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="CourseDeliveryPlan.php"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6" style="padding-left: 90px;">
                    <div class="panel panel-yellow" style="height:160px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-cog jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">QPS</div>
                                    <div>Question Paper Setting</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="QuesPapSet.php" id="animate"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-offset-3 col-md-6">
                    <div class="panel panel-grey" style="height:160px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-hand-right jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">ME</div>
                                    <div>Mark Entry</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="MarksEntry.php"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-md-6" style="padding-left: 90px;">
                    <div class="panel panel-orange" style="height:160px; width: 695px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-flag jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">PO & PEO</div>
                                    <div>Programme Outcome & Programme Educational Outcomes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="PEO.php"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-sm-2 sidenav">
      <!--<div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div> -->
    </div>
  </div>
</div>
<form>

<div style="margin-top: 10px;" class="form-actions">
    <button type="submit" name="cdp" class="btn btn-primary">Next >></button>
    <button style="margin-left:250px" name="cdp2" class="btn btn-warning">Submit</button>
    <a  style="margin-left:250px" class="btn btn-danger" href="../index1.php">Back</a>
  </div>
</form>
<footer class="container-fluid text-center">
  <p>Footer Text</p>

</footer>

</body>
</html>
