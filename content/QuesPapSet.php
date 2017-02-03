   <?php
//    session_start();

    //if(!$_SESSION['email'])
    //{

       // header("Location: welcome.php");//redirect to login page to secure the welcome page without login access.
    //}
   $times = intval($_GET['num']);
       $as = $_GET['as'];
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
    <img src="content/hits.jpg" width=400 height=60 />
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
      </div>
        </form>


<div style="margin-top: 50px;" class="row">
<div class="col-md-offset-1 col-md-5">
<?php echo "<form action='content/qp.php?as=$as&course=$course' method='post'>" ?>
<table class="table table-bordered" id="dynamic_field" style="width:200px">
       <thead>
       <tr>
        <th>
        <center>ASSESMENT</center>
        </th>
       <th colspan="5"><center><?php if($as == "i1") echo "Internal Assesment 1";
       else if($as == "i2") echo "Internal Assesment 2"; else echo "Model Exam"; ?></center></th>
       </tr>
       </thead>
       <thead>
       <tr>
        <th style="width:1%"><center>QUESTION PAPER NO</center></th>
        <th><center>CO</center></th>
        <th><center>BTL</center></th>
        <th><center>MARKS</center></th>
        <th><center>Description</center></th>
        <th><center>Category</center></th>
    </tr>
    </thead>
    <tbody>
    <?php
    $Qstr = array();
    for($i = 1; $i<=$times;$i++)
    {
      echo '<tr>';
        echo '<td><input class="form-control" required type="text"  maxlength="3"name="ques[]" style="width:60px;"/></td>';
        echo '<td><input class="form-control" required type="text" maxlength="3" name="code[]" style="width:60px;"/></td>';
        echo '<td><input class="form-control" required type="text"  maxlength="5" name="btl[]" style="width:60px;"/></td>';
        echo '<td><input class="form-control" required type="text" maxlength="3" onchange="tambah();" name="marks[]" style="width:50px;"/></td>';
        echo '<td><input class="form-control" required type="text" name="desc[]" style="width:400px;"/></td>';
        echo '<td><select name="category[]" class="form-control" required style="width:100px;">
        <option selected>Select</option>
        <option value="A">Part A</option>
        <option value="B">Part B</option>
        <option value="C">Part C</option>
        </select></td>';
echo '</tr>';
}

?>

<tr>
<td><center>Total marks</center></td>

<td></td>
<td></td>
<td id="hasil"></td>
      </tr>
      </tbody>
  </table>
</div>
</div>

<p style="margin-left:90px"><strong>Note:</strong>Once you click confirm, you cannot edit or add more questions to the question paper settings</p>
  <div style="text-align:center">
  <input type="submit" class="btn btn-primary" name="submit" value="Confirm"/>
  </div>

             </form>




</body>
</html>
