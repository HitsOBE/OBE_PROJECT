   <?php
//    session_start();

    //if(!$_SESSION['email'])
    //{

       // header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
    //}
       $as = $_GET['as'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Formative Assesment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
    function tambah() {
        var sum = 0;
        var cost = document.getElementsByName('marks[]');
        for (var i = 0; i < cost.length; i++) {
            sum += parseFloat(cost[i].value);
        }
        document.getElementById('hasil').innerHTML = sum;
    }
</script>
</head>
<body>



	  <?php
	   if(isset($_POST['feedback_save.php']))
    {
	      echo 'FEEEEEEEEEEEEEEEEED';
	}

	  ?>

      <hr>
      <!--<h3>Test</h3>  -->
      <div style="text-align:right ">
  <a href="Services.php" class="btn btn-primary">back</a>  </div>
      <div class="row">
    <div class="col-sm-8 col-sm-push-4">
    <img src="hits.jpg" width=400 height=60 />
    </div>
    </div>

<form>
      <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Faculty Name</span>
         <input class="form-control" type="text" value="<?php echo $userData['facultyname'] ?>" disabled aria-describedby="basic-addon1" />
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


        <?php
          $course = $_GET['course'];
          $res = "SELECT course_name from syllabus where course_code='".$course."'";
          $query = mysql_query($res);
        ?>
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course</span>
        <?php
        while($row = mysql_fetch_assoc($query))
        {
        echo '<input class="form-control" type="text" value="'.$row['course_name'].'" disabled aria-describedby="basic-addon1" />';
        }
        ?>
        </div>
        </div>

        <?php
        $course = $_GET['course'];
        $res = "SELECT course_name from syllabus where course_code='".$course."'";
        $query = mysql_query($res);
      ?>
      <div class="col-md-offset-3 col-md-5">
    <div style="margin-top:10px;margin-left:100px" class="input-group">
      <span class="input-group-addon" id="basic-addon1">Programme</span>
      <?php
      while($row = mysql_fetch_assoc($query))
      {
      echo '<input class="form-control" type="text" value="'.$row['course_name'].'" disabled aria-describedby="basic-addon1" />';
      }
      ?>
      </div>
      </div>
      </div>
        </form>

<div class="row" style="margin-top:20px;">
<div class="col-md-4">
<p><strong>CS - Case Study</strong></p>
</div>
<div class="col-md-4">
<p><strong>RP - Role Play</strong></p>
</div>
<div class="col-md-4">
<p><strong>MCQ - Multiple Choice Questions</strong></p>
</div>
</div>
<div class="row">
<div class="col-md-4">
<p><strong>MiniP - Lab Mini Project</strong></p>
</div>
<div class="col-md-4">
<p><strong>GD - Group Discussion</strong></p>
</div>
<div class="col-md-4">
<p><strong>RW - Record Work</strong></p>
</div>
</div>
<div class="row">
<div class="col-md-4">
<p><strong>PP - Poster Presentation</strong></p>
</div>
<div class="col-md-offset-4 col-md-4">
<p><strong>PP - Assignment</strong></p>
</div>
</div>
<div style="margin-top: 50px;" class="row">
<div class="col-md-12">
<table class="table table-bordered" id="dynamic_field">
       <thead>
       <tr>
       <th colspan="8"><center><?php if($as == "FA1") echo "Formative Assesment 1";
       else if($as == "FA2") echo "Formative Assesment 2";
       else if($as == "FA3") echo "Formative Assesment 3";  
       else if($as == "FA4") echo "Formative Assesment 4"; 
       else echo "Formative Assesment 5"; ?></center></th>
       </tr>
       </thead>
       <thead>
       <tr>
        <th><center>Roll Number</center></th>
        <th><center>Name</center></th>
        <th><center>Type Of Assesment</center></th>
        <th><center>Co No</center></th>
        <th><center>CO Details</center></th>
        <th><center>BTL</center></th>
        <th><center>Marks</center></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <?php 
      $sql5 = "SELECT roll_number, name from students where course_code = '".$_GET['course']."' && assigned_".$_GET['as']." = 0 order by roll_number";
      $query5 = mysql_query($sql5);
      while($row = mysql_fetch_assoc($query5))
      {
          echo '<form action="content/fa_add.php?as='.$_GET['as'].'&course='.$_GET['course'].'" method="post">';
          echo '<tr>';
          echo '<td><input type="hidden" name="roll" value='.$row['roll_number'].'>'.$row['roll_number'].'</td>';
          echo '<td><input type="hidden" name="name" value='.$row['name'].'>'.$row['name'].'</td>';
          echo '<td><select name="ast" style="width:80px;" class="form-control">
<option
value="CS">CS</option>
<option
value="RP">RP</option>
<option
value="MCQ">MCQ</option>
<option
value="Assign">Assign</option>
<option
value="MiniP">MiniP</option>
<option
value="GD">GD</option>
<option
value="RW">RW</option>
<option
value="PP">PP</option>
<option
value="QU">QU</option></select>
</td> ';
          echo '<td><select name="no" class="form-control">
<option
value="1">1</option>
<option
value="2">2</option>
<option
value="3">3</option>
<option
value="4">4</option>
<option
value="5">5</option>
<option
value="6">6</option></select>
</td>';
          echo '<td><select name="details" class="form-control">
<option
value="Define and understand the main concepts and terms of Data Mining and data warehousing.">Define and understand the main concepts and terms of Data Mining and data warehousing.</option>
<option
value="Demonstrate their ability to conduct data extraction, transformation and loading (ETL)">Demonstrate their ability to conduct data extraction, transformation and loading (ETL)</option>
<option
value="Compare and Contrast the dominant data mining algorithms.">Compare and Contrast the dominant data mining algorithms.</option>
<option
value="Evaluate and Select appropriate data mining algorithm for analytical applications and analyze the results generated.">Evaluate and Select appropriate data mining algorithm for analytical applications and analyze the results generated.</option>
<option
value="Design and understand the process required to construct data warehouse.">Design and understand the process required to construct data warehouse.</option>
<option
value="Design and understand the process required to construct data warehouse.">Design and understand the process required to construct data warehouse.</option></select>
</td>';
          echo '<td><select name="btl" class="form-control">
<option
value="1">Remember</option>
<option
value="2">Understand</option>
<option
value="3">Apply</option>
<option
value="4">Analysis</option>
<option
value="5">Evaluate</option>
<option
value="6">Create</option>
</td> 
';
          echo '<td><input type="number" name="marks" style="width:80px;" max="100" class="form-control" required></td>';
          echo '<td><button type="submit" style="width:50px;" class="btn btn-primary">GO</button></td>';
          echo '</tr>';
          echo '</form>';
      }
    ?>
      </tbody>
  </table>
</div>
</div>

<p style="margin-left:90px"><strong>Note:</strong>Once you click confirm, you cannot edit or add more FA to the settings</p>
  <div style="text-align:center">
  <input type="submit" class="btn btn-primary" name="submit" value="Confirm"/>
  </div>

             </form>




</body>
</html>
