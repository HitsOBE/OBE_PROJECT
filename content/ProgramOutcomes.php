   <?php
//    session_start();

    //if(!$_SESSION['email'])
    //{

       // header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
    //}

   $cou = $_GET['course'];

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
    <img src="content/hits.jpg" width=400 height=60 />
    </div>
    </div>

       <div style="margin-top: 25px;" class="row">

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
          $res = "SELECT course_name from syllabus where course_code='".$cou."'";
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
         $sql = "SELECT s.id, s.co_range, s.co_outcome FROM workload w left join co s on w.course_code = s.course_code where w.course_code = '".$cou."' && s.assigned = 0";
         $query = mysql_query($sql);
         $num = mysql_num_rows($query);
       ?>
<button type="button" style="margin-left:1000px;margin-top:10px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Simple Report</button>
        <div class="row" style="margin-top: 50px;">
        <div class"col-md-6">
         <?php if($num == null || $num < 1)
         {
           echo "<div class='alert alert-info' role='alert'><center><strong>No Results Found</strong></center><br><strong>Why is this happening?</strong><br>1) You have mapped CO with PO <br>2) You may not have created a course Outcome <br><br><strong>Possible Workarounds:-</strong><br>1) You can create a new CO by going to Course Outcomes page<br>2) Delete the CO record which is mapped with PO</div>";
         }else {
         echo "<form action='content/poco.php?pro=$cou' method='post'>"; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th rowspan="2"><center>Course Outcomes(CO)</center></th>
                        <th colspan="12"><center>Programme Outcomes</center></th>
                    </tr>

                    <tr>
                        <th>PO1</th>
                        <th>PO2</th>
                        <th>PO3</th>
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
                  <?php
                   include 'database/database.php';
                   $fc = $userData['faculty_code'];
                   //$selected = @$_POST['cou'];
                   $pdo = Database::connect();
                   $sql = "SELECT s.id, s.co_range, s.co_outcome FROM workload w left join co s on w.course_code = s.course_code where w.course_code = '".$cou."' && s.assigned = 0";
                   $result = mysql_query($sql);
                    foreach($pdo->query($sql)  as $row)
                   {
                      echo "<tr>";
                      echo "<center><td><input type='hidden' name='co[]' value='".$row['co_range']."'>". $row['co_range'] . "</td></center>";
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po1[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po2[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po3[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po4[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po5[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po6[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po7[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po8[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po9[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po10[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required  name="po11[]" class="form-control"/></center></td>';
                      echo '<td><center><input type="number" maxlength="1" max="3" required name="po12[]" class="form-control"/></center></td>';
                  echo '</tr>';
                }

?>  
                </tbody>
            </table>
            <div class="form-group row">
        <div class="col-sm-offset-5 col-sm-10">
         <div class="col-sm-offset-5 col-sm-10">
      <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
    </div>
  </div>
        </div>
        </div>

        </form>
<?php } ?>
    </div>

    <div style="width:300px;border:5px solid blue; padding: 25px; margin: 25px; margin-left: 800px; margin-top:10px;">
<p style="font:10px;"><strong>Note:</strong></p>
<p style="color:lime;"><strong>1 - Strong Contribution</strong></p> 
<p style="color:#660066;"><strong>2 - Weak Contribution</strong></p> 
<p style="color:red;"><strong>3 - No Contribution</strong></p> 
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div style="margin-left:290px;" class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width:800px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">CO PO Mapping</h4>
      </div>
      <div class="modal-body">
        <p>Records You have entered so far...</p>
        <table class="table table-bordered">
        <tr>
        <th>S.NO</th>
        <th>Course Outcomes</th>
        <th>PO1</th>
        <th>PO2</th>
        <th>PO3</th>
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
        <?php
        $sql = "SELECT * from co_po_mapping where course_code = '".$_GET['course']."'";
        $result = mysql_query($sql);
        $i = 1;
        while($row = mysql_fetch_array($result))
        {
          echo '<tr>';
          echo '<td>'.$i.'</td>';
          echo '<td>'.$row['co_code'].'</td>';
          echo '<td>'.$row['po1'].'</td>';
          echo '<td>'.$row['po2'].'</td>';
          echo '<td>'.$row['po3'].'</td>';
          echo '<td>'.$row['po4'].'</td>';
          echo '<td>'.$row['po5'].'</td>';
          echo '<td>'.$row['po6'].'</td>';
          echo '<td>'.$row['po7'].'</td>';
          echo '<td>'.$row['po8'].'</td>';
          echo '<td>'.$row['po9'].'</td>';
          echo '<td>'.$row['po10'].'</td>';
          echo '<td>'.$row['po11'].'</td>';
          echo '<td>'.$row['po12'].'</td>';
          echo '</tr>';
          $i++;
        }
        ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
    </div>
</body>
</html>
