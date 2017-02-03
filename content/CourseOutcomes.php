
<html lang="en">
<head>
  <title>FeedBack Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body link="black">



	  <?php
	   if(isset($_POST['feedback_save.php']))
    {
	      echo 'FEEEEEEEEEEEEEEEEED';

	}

    $cou = $_GET['pro'];
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


    <form action="" method="POST">
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
        $sql = mysql_query("Select course_name from syllabus where course_code = '".$cou."'");
        while ($row = mysql_fetch_array($sql)) {
          ?>
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course</span>
        <input class="form-control" type="text" value="<?php echo $row['course_name'] ?>" disabled aria-describedby="basic-addon1" />
        </div>
        </div>
<?php }
?>

<?php
  $sql =mysql_query("Select programme_code from syllabus where course_code = '".$cou."'");
  while($row = mysql_fetch_array($sql))
  $co = $row['programme_code'];
 ?>

    <div class="row">
    <div class=col-md-offset-10>
    <?php echo "<a style='margin-top:10px;' href='content/ccrud/courseadd.php?&cc=$cou' name='Add Po' class='btn btn-primary' type='submit'>Add CO</a>" ?>
    </div>

    </div>
        <table class="table">
      <thead>
      <tr>
        <th></th>
        <th>COURSE OUTCOMES(CO)</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
        </thead>
      <tbody>

      <?php
                   include 'database/database.php';
                   $fc = $userData['faculty_code'];
                   $selected = @$_POST['cou'];
                   $pdo = Database::connect();
                   //$sql = "SELECT s.id, s.course_code, s.co_outcome FROM workload as w join co as s on s.programme_code = '".$pc."'";
                    $sql = "SELECT s.id, s.co_range, s.co_outcome FROM workload w left join co s on w.course_code = s.course_code where w.course_code = '".$cou."'";
                    $rs = mysql_query($sql);
                    $num = mysql_num_rows($rs);
                    if($num == 0)
                    {
                      echo "<div class='alert alert-info' role='alert'><center>It Seems you have no Co Outcomes. Please Add one</div>";
                    }
                    else
                    {
                   foreach($pdo->query($sql) as $row)
                   {
                            echo '<tr>';
                            echo '<td>'. $row['co_range'] . '</td>';
                            echo '<td>'. $row['co_outcome'] . '</td>';
                            echo '<td><a href="content/ccrud/edit.php?id='.$row['id'].'&cc='.$cou.'" style="color:black"><span style="margin-left:15px;color:black" class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a href="content/ccrud/delete.php?co='.$row['co_range'].'&id='.$row['id'].'&pro='.$cou.'" style="color:black"> <span style="margin-left:25px;" class="glyphicon glyphicon-remove"></span></a></td>';
                            echo '</tr>';
                   }
                 }
                  ?>
                  </tbody>
        </table>
</form>

</body>
</html>
