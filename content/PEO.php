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
          $course = $_GET['peo'];
          $res = "SELECT programme_name from programme where programme_code='".$course."'";
          $query = mysql_query($res);
        ?>
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course</span>
        <?php
        while($row = mysql_fetch_assoc($query))
        {
        echo '<input class="form-control" type="text" value="'.$row['programme_name'].'" disabled aria-describedby="basic-addon1" />';
        }
        ?>
        </div>
        </div>
      </div>
      </form>

    <div class="row">
    <div class=col-md-offset-10>
    <a href="content/pcrud/courseadd.php?peo=<?php echo $course; ?>" style="margin-top:10px;" name="Add Po" class="btn btn-primary">Add PEO</a>
    </div>

    </div>
        <table class="table">
      <thead>
      <tr>
        <th width="10px"></th>
        <th>Programme Educational Outcomes(PEO)</th>
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
                    $sql = "SELECT DISTINCT s.id, s.peo_code, s.peo_desc FROM workload w left join peo s on w.programme_code = s.programme_code where w.programme_code = '".$_GET['peo']."'";
                    echo '<tr>';
                    $rs = mysql_query($sql);
                    $results = mysql_fetch_array($rs);
                    $num = mysql_num_rows($rs);
                   foreach($pdo->query($sql) as $row)
                   {
                            echo '<tr>';
                            echo '<td>'. $row['peo_code'] . '</td>';
                            echo '<td>'. $row['peo_desc'] . '</td>';
                            echo '<td><a href="content/pcrud/edit.php?id='.$row['id'].'&cc='.$course.'" style="color:black"><span style="margin-left:15px;color:black" class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a href="content/pcrud/delete.php?id='.$row['id'].'&pro='.$course.'" style="color:black"> <span style="margin-left:25px;" class="glyphicon glyphicon-remove"></span></a></td>';
                            echo '</tr>';
                   }

                  ?>

      <tbody>
        </table>

        <div class=col-md-offset-10>
        <a href="content/pocrud/courseadd.php?po=<?php echo $course; ?>" style="margin-top:10px;" name="Add Po" class="btn btn-primary">Add PO</a>
        </div>
        <table class="table">
      <thead>
      <tr>
        <th width="10px"></th>
        <th>Programme Outcomes(PO)</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
        </thead>
      <tbody>
      <?php
                   $fc = $userData['faculty_code'];
                   $selected = @$_POST['cou'];
                   $pdo = Database::connect();
                   //$sql = "SELECT s.id, s.course_code, s.co_outcome FROM workload as w join co as s on s.programme_code = '".$pc."'";
                    $sql = "SELECT DISTINCT s.id, s.po_code, s.po_Outcome FROM workload w left join po s on w.programme_code = s.programme_code where w.programme_code = '".$_GET['peo']."'";
                    echo '<tr>';
                    $rs = mysql_query($sql);
                    $results = mysql_fetch_array($rs);
                   foreach($pdo->query($sql) as $row)
                   {
                            echo '<tr>';
                            echo '<td>'. $row['po_code'] . '</td>';
                            echo '<td>'. $row['po_Outcome'] . '</td>';
                            echo '<td><a href="content/pocrud/edit.php?id='.$row['id'].'&cc='.$course.'" style="color:black"><span style="margin-left:15px;color:black" class="glyphicon glyphicon-pencil"></span></a></td>
        <td><a href="content/pocrud/delete.php?id='.$row['id'].'&pro='.$course.'" style="color:black"> <span style="margin-left:25px;" class="glyphicon glyphicon-remove"></span></a></td>';
                            echo '</tr>';
                   }

                  ?>

      <tbody>
        </table>

        </div>

</body>
</html>
