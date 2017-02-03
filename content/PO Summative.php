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
      <!--<h3>Test</h3>  -->

   <div class="row">
    <div class="col-sm-8 col-sm-push-4">
    <img src="content/hits.jpg" width=400 height=60 />
    </div>
    </div>



    <div style="margin-top: 25px;" class="row">

    <div class="col-md-3">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">User Name</span>
        <input class="form-control" type="text" placeholder="Name" aria-describedby="basic-addon1" />
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

        <div class="col-md-3">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course Name</span>
        <input class="form-control" type="text" placeholder="course" aria-describedby="basic-addon1" />
        </div>
        </div>

<div class="col-md-3">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Batch:</span>
        <input class="form-control" type="text" placeholder="Batch" aria-describedby="basic-addon1" />
        </div>
        </div>

</div>
<div class="row">
<div class="col-md-offset-3">
 <table class="table table-bordered" style="width:40%; margin-top: 50px;">
<thead>

<tr>
<th>No</th>
  <th>Course code</th>
  <th>course</th>
<th>sem</th>
<th>Credit</th>
  <th>PO1</th>
<th>PO2</th>
<th>PO3</th>
</tr>
 </thead>

  <tbody>
  <tr>
  <td>1</td>
 <td>PCA402</td>
 <td>Object Oriented Analyses and design</td>
<td>4</td>
<td>3</td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
</tr>
 <tr>
  <td>2</td>
    <td>PCA717</td>
  <td>Data mining</td>
<td>5</td>
<td>4</td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
</tr>

 </tbody>
 </table>

</div>
<div class="col-md-offset-2">
 <table class="table table-bordered" style="width:40%; margin-top: 50px;">
<thead>

<tr>
<th>No</th>
  <th>Course code</th>
  <th>course</th>
  <th>PO4</th>
<th>PO5</th>
<th>PO6</th>
<th>PO7</th>
<th>PO8</th>
<th>PO9</th>
<th>PO10</th>
<th>PO11</th>
<th>PO12</th>
</tr>
 </thead>

  <tbody>
  <tr>
  <td>1</td>
 <td>PCA402</td>
 <td>Object Oriented Analyses and design</td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
</tr>
 <tr>
  <td>2</td>
    <td>PCA717</td>
  <td>Data mining</td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
<td><input class="form-control" type="text" style="width:40px;" aria-describedby="basic-addon1" /></td>
</tr>

 </tbody>
 </table>
 </div>
 </div>
<div class="form-group row">
    <div class="col-sm-offset-6">
      <button  type="submit" class="btn btn-primary">Submit</button>
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

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>
