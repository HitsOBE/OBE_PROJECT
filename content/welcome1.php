   <?php  
//    session_start();  
      
    //if(!$_SESSION['emailid'])  
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

    th
      {
        text-align:center;      
      }

      .hid
      {
        visibility: collapse;
      }

      .mov
      {

      }
      
      table {
    border-collapse: separate;
    empty-cells: hide;

    .123
    {
      position: absolute;
      top: 0;
      right: 0;
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
	    <p  class='text-info' > <?php  //echo $_SESSION['emailid'];  ?>  </p>
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
    <img src="hits.jpg" width=300 height=150 />
    </div>
    </div>
    
    
    <div style="margin-top: 25px;" class="row">
    
    <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">UserName</span>
        <input class="form-control" type="text" placeholder="Type Faculty's Name" aria-describedby="basic-addon1" />
        </div>
        </div>
        
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Department</span>
        <input class="form-control" type="text" placeholder="Type your Department" aria-describedby="basic-addon1" />
        </div>
        </div>
        
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course Name</span>
        <input class="form-control" type="text" placeholder="Type your course" aria-describedby="basic-addon1" />
        </div>
        </div>
        </div>
        
    <div style="margin-top: 25px;" class="row">
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Batch</span>
        <input class="form-control" type="text" placeholder="Type your course" aria-describedby="basic-addon1" />
        </div>
        </div>
        

         <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">MCA Vths em</span>
        <input class="form-control" type="text" placeholder="Type your course" aria-describedby="basic-addon1" />
        </div>
        </div>
        

         <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Choose Assesment</span>
        <input class="form-control" type="text" placeholder="Type your course" aria-describedby="basic-addon1" />
        </div>
        </div>
        </div>

    <div class="row">
    <div class=col-md-offset-10>
    <button style="margin-top:10px; margin-bottom:10px; text-align: left;" name="Add Po" class="btn btn-primary 123" type="submit">Add PEO</button>
    </div>
    
    </div>
    <form>
    <div>
        <table class="table table-bordered">
      <thead>
      <tr>
        <th width="2%">S.No</th>
        <th width="2%">Roll No</th>
        <th width="3%">Name of the students</th>
        <th width="5%" colspan="5">CO Attainment</th>
        <th width="3%" colspan="6">BTL Attainment</th>
        <th width="5%">Likert Scale</th>
        <th width="2%">Corrective Action Plan</th>
      </tr>
      </thead>
      <tbody>
      
      <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td><strong>C01</strong></td>
        <td><strong>C02</strong></td>
        <td><strong>C03</strong></td>
        <td><strong>C04</strong></td>
        <td><strong>C05</strong></td>
        <td width="4%"><strong>BTL<br>1</strong></td>
        <td width="4%"><strong>BTL<br>2</strong></td>
        <td width="4%"><strong>BTL<br>3</strong></td>
        <td width="4%"><strong>BTL<br>4</strong></td>
        <td width="4%"><strong>BTL<br>5</strong></td>
        <td width="4%"><strong>BTL<br>6</strong></td>
        <td>-</td>
        <td>-</td>
      </tr>

      <tr>
        <td>-</td>
        <td>-</td>
        <td><strong>Max Marks</strong></td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>-</td>
        <td>-</td>
      </tr>
      <tr>
        <td>1</td>
        <td>1343001</td>
        <td>POORNA PRAKASH P</td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td>-</td>
        <td>-</td>
      </tr>

      <tr>
        <td>2</td>
        <td>1343002</td>
        <td>NAFEEZ N</td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td><input class="form-control" style="width:20px;" ></td>
        <td>-</td>
        <td>-</td>
      </tr>
      <tr>
        <td colspan="3"><center>Average CO Attainment %</center></td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
      </tr>
    </tbody>
  </table>
  </div>
  <div style="text-align:center">
  <input aling="center" type="submit" class="btn btn-primary" name="submit" value="Submit"/>
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
  <p>Hindustan University</p>
</footer>

</body>
</html>

