   <?php
//    session_start();

    //if(!$_SESSION['email'])
    //{

       // header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
    //}
      $pro = $_GET['course'];
      $asse = $_GET['as'];
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
  <script language="javascript">
<script>
$('.add').blur(function() {
    var sum = 0;
    $(this).closest('tr').find('.add').each(function() {   //.qtys of current row,
    sum += Number($(this).val());
    });
    $(this).closest('tr').find('.qty_total').val(sum);     // total of current row
});
</script>
<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
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
      </div>

    <div style="margin-top: 25px;" class="row">
      <?php
        $course = $_GET['course'];
        $res = "SELECT batch_code from workload where course_code='".$course."'";
        $query = mysql_query($res);
      ?>
      <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Batch</span>
      <?php
      while($row = mysql_fetch_assoc($query))
      {
      echo '<input class="form-control" type="text" value="'.$row['batch_code'].'" disabled aria-describedby="basic-addon1" />';
      $bat = $row['batch_code'];
      }
      ?>
      </div>
      </div>


      <?php
        $course = $_GET['course'];
        $res = "SELECT sem_code from workload where course_code='".$course."'";
        $query = mysql_query($res);
      ?>
      <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Semester</span>
      <?php
      while($row = mysql_fetch_assoc($query))
      {
      echo '<input class="form-control" type="text" value="'.$row['sem_code'].'" disabled aria-describedby="basic-addon1" />';
      }
      ?>
      </div>
      </div>

      <?php
        $course = $_GET['course'];
        $res = "SELECT programme_name from programme where programme_code=(select programme_code from syllabus where course_code = '".$course."')";
        $query = mysql_query($res);
      ?>
      <div class="col-md-4">
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Programme</span>
      <?php
      while($row = mysql_fetch_assoc($query))
      {
      echo '<input class="form-control" type="text" value="'.$row['programme_name'].'" disabled aria-describedby="basic-addon1" />';
      }
      ?>
      </div>
      </div>
        </div>
    <button type="button" style="margin-left:1000px;margin-top:10px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">View Simple Report</button>

        <?php
        $stu = "SELECT roll_number, name from students where assigned_".$_GET['as']." = 0 ORDER BY roll_number";
        $query = mysql_query($stu);
        echo '<br><label>Select a student from the list below to continue</label>';
        echo '<div class="mform" style="display:none;border:1px solid black;overflow:auto;margin-left:560px;margin-top:-25px;padding-bottom:10px;">';
        $mark = "SELECT qes_no, max_mark, btl_code, co_code from qp_set where course_code='".$course."' order by qes_no";
        $query1 = mysql_query($mark);
        echo "<form action='content/me.php?as=$asse&course=$pro&bat=$bat' method='Post'>";
        echo '<p style="margin-top:15px;">You are now entering marks for </p><input class="form-control" style="width:90px;margin-top:-35px;margin-left:210px"  name="roll" id="demo"></h6><br>';
        echo '<table style="margin-left:120px;">';
        echo '<br>';
        while($row = mysql_fetch_assoc($query1))
        {
          echo '<tr>';
          echo '<td><label>'.$row['qes_no'].'</label><input name="ques[]" type="hidden" value="'.$row['qes_no'].'"></td>';
          echo '<td><input type="number" required name="marks[]" class="form-control" style="width:80px;margin-left:70px;" min="-1" max="'.$row['max_mark'].'"></td>';
          echo '<td><strong><p style="margin-left:160px;">Max Marks Alloted: '.$row['max_mark'].'<strong></p><input name="max[]" type="hidden" value="'.$row['max_mark'].'"></td>';
          echo '<td><input type="hidden" name="btl[]" value="'.$row['btl_code'].'"></td>';
          echo '<td><input type="hidden" name="co[]" value="'.$row['co_code'].'"></td>';
          echo '</tr>';
        }
        echo '</table>';
        echo '<button type="submit" style="width:600px;margin-left:4px;margin-top:10px;" class="btn btn-success">Enter Marks</button>';
        echo '<button type="reset" style="width:600px;margin-left:4px;margin-top:10px;" class="btn btn-danger a2">Close</button>';
        echo '</form>';
        echo '<strong>Note:</strong>If the particular student attend the exam or the test, enter the values as -1';
        echo '</div>';
        echo '<ul class="list-group" onchange="showCustomer(this.value)" style="width:350px;">';
        
        while($row = mysql_fetch_assoc($query))
        {?>

          <li class='list-group-item'><span class='badge'><?php echo $row['roll_number'] ?> </span><a class='a1' onClick="document.getElementById('demo').value = <?php echo $row['roll_number'] ?>" style='text-decoration:none;color:black'><?php echo $row['name'] ?></a></li>
       <?php  }
        echo '</ul>';
        ?>
    </div>

    <script>
     $(".a1").click(function(){
    $(".mform").toggle("hide");
});

      $(".a2").click(function(){
    $(".mform").toggle("hide");
});

     //document.getElementById('demo').innerHTML = Sample;
    </script>

    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Marks Report</h4>
      </div>
      <div class="modal-body">
        <p>Records You have entered so far...</p>
        <table class="table table-bordered">
        <tr>
        <th>Roll Number</th>
        <th>Name</th>
        <th>Marks Awarded</th>
        </tr>
        <?php
        $sqr = mysql_query("SELECT roll_number,name from students where assigned_".$_GET['as']." = 1 order by roll_number");
        while($row = mysql_fetch_array($sqr))
        {
          echo '<tr>';
          echo '<td>'.$row['roll_number'].'</td>';
          echo '<td>'.$row['name'].'</td>';
          $sqla = mysql_query("SELECT sum(marks) as sum from mark_entry where roll_no = '".$row['roll_number']."' && course_code = '".$_GET['course']."'");
          while($row1 = mysql_fetch_array($sqla))
          {
          echo '<td>'.$row1['sum'].'</td>';
          }
          echo '</tr>';
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
