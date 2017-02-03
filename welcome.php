   <?php
//    session_start();

    //if(!$_SESSION['email'])
    //{

       // header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
    //}
      ob_start();
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>FeedBack Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Content/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/panel.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="Content/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */

    /* Set gray background color and 100% heig

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }

    .jg {
    font-size: 50px;
}

 .dis {
       pointer-events: none;
       cursor: default;
    } 
  </style>
</head>
<body>

      <!-- <a class="navbar-brand" href="#">Logo</a>  -->

	  <?php
	   if(isset($_POST['feedback_save.php']))
    {
	      echo 'FEEEEEEEEEEEEEEEEED';
	}

	  ?>

      <hr>
     <div class="row">
                <div class="col-lg-3 col-md-6" style="padding-left: 90px;margin-left:50px;">
                    <div class="panel panel-primary" style="height: 160px;">
                        <div class="panel-heading" style="height:115px;">
                            <div class="row">
                                <div class="col-xs-3" >
                                    <i class="glyphicon glyphicon-road jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">CO</div>
                                    <div>Course Outcomes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="#" data-toggle="modal" data-target="#coModal"><span class="pull-left">View Details</span></a>
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
                                <a href="#" data-toggle="modal" data-target="#poco"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6" style="padding-left: 90px;margin-left:50px;">
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
                                <a href="#" data-toggle="modal" data-target="#cdp"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6" style="padding-left: 90px;margin-left:50px;">
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
                                <a href="#" data-toggle="modal" data-target="#myModal"><span class="pull-left">View Details</span></a>
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
                                <a href="#" data-toggle="modal" data-target="#myModal1"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6" style="padding-left: 90px;margin-left:50px;">
                    <div class="panel panel-orange" style="height:170px;">
                        <div class="panel-heading" style="height:125px;">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-flag jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">PO & PEO</div>
                                    <div style="margin-left: 20px;">Programme Outcome & Programme Educational Outcomes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="#" data-toggle="modal" data-target="#peo"><span class="pull-left">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

             <div class="row">
                <div class="col-lg-3 col-md-offset-3 col-md-6" style="padding-left: 90px;margin-left:-75px;">
                    <div class="panel panel-orange" style="height:170px;">
                        <div class="panel-heading" style="height:125px;">
                            <div style="background-color:brown;height:125px;margin-top:-10px;" class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-hand-right jg"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">FA</div>
                                    <div>Formative Assesment</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="#" data-toggle="modal" data-target="#myModal2"><span class="pull-left" style="color:brown;">View Details</span></a>
                                <span class="pull-right"><i class="glyphicon glyphicon-play"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

<?php include ('content/modals.php'); ?>

<?php ob_end_flush();?>
</body>
</html>
