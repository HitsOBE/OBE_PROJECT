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

    <form>
    <div style="margin-top: 25px;" class="row">

    <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">UserName</span>
        <input class="form-control" type="text" placeholder="Type Faculty's Name" aria-describedby="basic-addon1" />
        </div>
        </div>

        <?php
        $sql = mysql_query("SELECT l.faculty_code,l.department, d.depart_code, d.depart_name from login as
          l,department as d where l.department = d.depart_code And l.faculty_code = '"$userData['faculty_code']."'");
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
        <span class="input-group-addon" id="basic-addon1">Formative Assessment</span>
        <input class="form-control" type="text" placeholder="Type your course" aria-describedby="basic-addon1" />
        </div>
        </div>
        </div>

    <div class="row">
    <div style="margin-left:-55px;">


        <table class="table table-bordered" style="width:50%; margin-top: 40px;">
      <thead>
      <tr>
        <th style="font-size: 12px;" width="1%">S.No</th>
        <th style="font-size: 12px;" width="1%">Roll No</th>
        <th style="font-size: 12px;" width="2%">Name of the students</th>
        <th style="font-size: 12px;" width="2%">ClassTest</th>
        <th style="font-size: 12px;" width="2%">MCQ</th>
        <th style="font-size: 12px;" width="2%">QUIZ</th>
        <th style="font-size: 12px;" width="2%">MINI PROJECT</th>
        <th style="font-size: 12px;">Casestudy</th>
        <th>Seminar</th>
        <th style="font-size: 12px;">Course Partipating</th>
        <th style="font-size: 12px;">Group disscussion</th>
        <th style="font-size: 12px;">Assignment</th>
        <th style="font-size: 12px;">Total</th>
        <th style="font-size: 12px;">Likert Scale</th>
        <th style="font-size: 12px;" colspan="5"><center>CO Attainment</center></th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td width="1%">-</td>
        <td width="1%">-</td>
        <td width="2%">co</td>
        <td width="2%">-</td>
        <td width="2%">-</td>
        <td width="2%">-</td>
        <td width="2%">-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>co1</td>
        <td>co2</td>
        <td>co3</td>
        <td>co4</td>
        <td>co5</td>
      </tr>

      <tr>
        <td width="1%">-</td>
        <td width="1%">-</td>
        <td width="2%">BTL</td>
        <td width="2%">-</td>
        <td width="2%">-</td>
        <td width="2%">-</td>
        <td width="2%">-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
      </tr>

      <tr>
        <td width="1%">-</td>
        <td width="1%">-</td>
        <td width="2%"><strong>Max Marks</strong></td>
        <td width="2%">2</td>
        <td width="2%">2</td>
        <td width="2%">2</td>
        <td width="2%">2</td>
        <td>2</td>
        <td>8</td>
        <td>16</td>
        <td>50</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        <td>%</td>
        </tr>
      <tr>
        <td width="1%">1</td>
        <td width="1%">1343001</td>
        <td width="2%">POORNA PRAKASH P</td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td>-</td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        </tr>

      <tr>
        <td width="1%">2</td>
        <td width="1%">1343002</td>
        <td width="2%">NAFEEZ N</td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td>-</td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        </tr>

      <tr>
        <td width="1%">3</td>
        <td width="1%">1343007</td>
        <td width="2%">AKCHHAY CHAURASIYA</td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td width="2%"><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td>-</td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
        <td><input class="form-control" style="width:40px;" ></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
      <td colspan="3"><center>Average CO attainment(%)</center></td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
        <td class="mov">0</td>
      </tr>
    </tbody>
  </table>

  </div>

  </div>

  <div style="text-align:center">
  <input aling="center" type="submit" class="btn btn-primary" name="submit" value="Submit"/>
  </div>
  </form>

</body>
</html>
