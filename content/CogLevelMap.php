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
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 900px}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid text-center">
	<h1  class='text-info' >Welcome to OBE Form</h1>


	</div>
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
      <p><a href="#">Lin
      </a></p>
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
      <!--<h3>Test</h3>  -->

      <div class="row">
    <div class="col-sm-8 col-sm-push-4">
    <img src="content/hits.jpg" width=400 height=60 />
    </div>
    </div>
      <form>
       <div style="margin-top: 25px;" class="row">

    <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Faculty Name</span>
        <input class="form-control" type="text" placeholder="Type Faculty's Name" aria-describedby="basic-addon1" />
        </div>
        </div>

        <?php
        $sql = mysql_query("SELECT l.faculty_code,l.department, d.depart_code, d.depart_name from login as
          l,department as d where l.department = d.depart_code And l.faculty_code = '".$userData['faculty_code']."'");
        while($row = mysql_fetch_array($sql))
        {
         ?>

        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Department</span>
        <input class="form-control" type="text" value="<?php echo $row['depart_name'] ?>" disabled aria-describedby="basic-addon1" />
        </div>
        </div>
        <?php } ?>

        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course Name</span>
        <input class="form-control" type="text" placeholder="Type your course" aria-describedby="basic-addon1" />
        </div>
        </div>
        </div>

        <div class="row" style="margin-top: 50px;">
        <div class"col-md-4 col-md-offset-3">
            <table class="table table-bordered" style="width:50%">
                <thead>
                    <tr>
                        <th rowspan="2">
                        Course
                        </th>
                        <th colspan="7">
                        <center>% of bloom's level</center>
                        </th>
                    </tr>

                    <tr>
                        <th>
                          L1
                        </th>
                        <th>
                          L1
                        </th>
                        <th>
                          L1
                        </th>
                        <th>
                          L1
                        </th>
                        <th>
                          L1
                        </th>
                        <th>
                          L1
                        </th>
                        <th>
                          Overall %
                        </th>
                    </tr>
                </thead>

                <tbody>
                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                </tr>

                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                </tr>

                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                </tr>

                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                </tr>

                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                       <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                </tr>

                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                </tr>

                <tr>
                    <td>
                        C01
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                    <td>
                        <input class="form-control" style="width:10px;">
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
        </div>
        </div>

        </form>

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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
