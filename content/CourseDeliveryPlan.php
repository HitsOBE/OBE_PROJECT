<?php
ob_start();
?>

    <div class="container">

        <!-- Marketing Icons Section -->
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
        $sql = mysql_query("Select course_name from syllabus where course_code = '".$_GET['cou']."'");
        while ($row = mysql_fetch_array($sql))
        {
        ?>
        <div class="col-md-4">
      <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">Course</span>
        <input class="form-control" type="text" value="<?php echo $row['course_name'] ?>" disabled aria-describedby="basic-addon1" />
        </div>
        </div>
        <?php
      }
        ?>
</div>
              <?php

    require 'database/database.php';
    if(isset($_POST['cdp']))
    {
    if ( !empty($_POST)) {
        // keep track validation errors
        $faculty = null;
        $period = null;
        $topic = null;
        $co = null;
        $btl = null;
        $tlo = null;
        $activities = null;
        $Assessment = null;
        // keep track post values
        $sql = mysql_query("select programme_code, sem_code, course_code from workload where course_code = '".$_GET['cou']."'");
        while($row = mysql_fetch_array($sql))
        {
        $faculty = $userData['faculty_code'];
        $depart = $userData['department'];
        $programme_code = $row['programme_code'];
        $sem = $row['sem_code'];
        $course = $_GET['cou'];
        $period = $_POST['period'];
        $topic = $_POST['topic'];
        $co = $_POST['co'];
        $btl = $_POST['btl'];
        $tlo = $_POST['tlo'];
        $activities = $_POST['activities'];
        $assessment = $_POST['assessment'];

      }


        // validate input
        $valid = true;

        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO cdp (faculty_code,depart_code,programme_code,semester_code,course_code,period,topic,pertaining_co,pertaining_btl,tlo,method_activity,assessment_tlo) values(?,?,?,?,?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array( $faculty,$depart,$programme_code,$sem,$course,$period,$topic,$co,$btl,$tlo,$activities,$assessment));
            Database::disconnect();
            echo '<div class="alert alert-success alert-dismissible" role="alert">';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            echo '<strong>Complete</strong> You successfully completed this form';
            echo '</div>';
            header("Location: CourseDeliveryPlan.php?cou=".$_GET['cou']."");
        }
    }
}

if(isset($_POST['cdp2']))
{
if ( !empty($_POST)) {
    // keep track validation errors
    $faculty = null;
    $period = null;
    $topic = null;
    $co = null;
    $btl = null;
    $tlo = null;
    $activities = null;
    $Assessment = null;
    // keep track post values
    $sql = mysql_query("select programme_code, sem_code, course_code from workload where course_code = '".$_GET['cou']."'");
    while($row = mysql_fetch_array($sql))
    {
    $faculty = $userData['faculty_code'];
    $depart = $userData['department'];
    $programme_code = $row['programme_code'];
    $sem = $row['sem_code'];
    $course = $_GET['cou'];
    $period = $_POST['period'];
    $topic = $_POST['topic'];
    $co = $_POST['co'];
    $btl = $_POST['btl'];
    $tlo = $_POST['tlo'];
    $activities = $_POST['activities'];
    $assessment = $_POST['assessment'];

  }


    // validate input
    $valid = true;

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO cdp (faculty_code,depart_code,programme_code,semester_code,course_code,period,topic,pertaining_co,pertaining_btl,tlo,method_activity,assessment_tlo) values(?,?,?,?,?,?,?,?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array( $faculty,$depart,$programme_code,$sem,$course,$period,$topic,$co,$btl,$tlo,$activities,$assessment));
        Database::disconnect();
        echo '<div class="alert alert-success alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo '<strong>Complete</strong> You successfully completed this form';
        echo '</div>';
        header("Location: Services.php");
    }
}
}

if(isset($_POST['cdp1']))
{
if ( !empty($_POST)) {
    // keep track validation errors
    $faculty = null;
    $period = null;
    $topic = null;
    $co = null;
    $btl = null;
    $tlo = null;
    $activities = null;
    $Assessment = null;
    // keep track post values
    $sql = mysql_query("select programme_code, sem_code, course_code from workload where course_code = '".$_GET['cou']."'");
    while($row = mysql_fetch_array($sql))
    {
    $faculty = $userData['faculty_code'];
    $depart = $userData['department'];
    $programme_code = $row['programme_code'];
    $sem = $row['sem_code'];
    $course = $_GET['cou'];
    $period = $_POST['period'];
    $topic = $_POST['topic'];
    $co = $_POST['co'];
    $btl = $_POST['btl'];
    $tlo = $_POST['tlo'];
    $activities = $_POST['activities'];
    $assessment = $_POST['assessment'];

  }


    // validate input
    $valid = true;

    // insert data
    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO cdp (faculty_code,depart_code,programme_code,semester_code,course_code,period,topic,pertaining_co,pertaining_btl,tlo,method_activity,assessment_tlo,pass) values(?,?,?,?,?,?,?,?,?,?,?,?,1)";
        $q = $pdo->prepare($sql);
        $q->execute(array( $faculty,$depart,$programme_code,$sem,$course,$period,$topic,$co,$btl,$tlo,$activities,$assessment));
        Database::disconnect();
    }
}
}
?>

  <form style="margin-top: 25px;" class="form-horizontal" action="" method="post">

                    <div class="control-group <?php echo !empty($facultyError)?'error':'';?>">
                        <label class="control-label hidden">Faculty Code</label>
                        <div class="controls">
                            <input name="faculty_code" type="hidden" value="<?php echo !empty($faculty)?$faculty:''; ?>">
                            <?php if (!empty($facultyError)): ?>
                                <span class="help-inline"><?php echo $facultyError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>

                    <div class="row">
  					<div class="col-md-6">
                      <div class="control-group <?php echo !empty($periodError)?'error':'';?>">
                        <label class="control-label">Period No:</label>
                        <div class="controls">
                            <input class="form-control" name="period" type="number" required  placeholder="Period No" value="<?php echo !empty($period)?$period:'';?>">
                            <?php if (!empty($periodError)): ?>
                                <span class="help-inline"><?php echo $periodError;?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                      </div>
                      </div>

                      <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($topicError)?'error':'';?>">
                        <label class="control-label">Topic / Session  topic:</label>
                        <div class="controls">
                            <input class="form-control" name="topic" type="text" required  placeholder="Topic / Session" value="<?php echo !empty($topic)?$topic:'';?>">
                            <?php if (!empty($topicError)): ?>
                                <span class="help-inline"><?php echo $topicError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      </div>
                      </div>

                      <div class="row">
                      <div class="control-group <?php echo !empty($coError)?'error':'';?>">
                        <label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;Pertaining CO/COs & BTL</label>
                        <div class="controls">
                        <div class="col-md-4">
                            <input class="form-control" name="co" type="text" maxlength="5" required  placeholder="Pertaining CO" value="<?php echo !empty($co)?$co:'';?>">
                        </div>
                        <div class="col-md-4">
                        <select name="btl" class="form-control" required id="combo" style="width:250px;">
                         <option value="" selected="selected" disabled>Select one</option>
                         <option value="BTL1">Remember</option>
                         <option value="BTL2">Understand</option>
                         <option value="BTL3">Apply</option>
                         <option value="BTL4">Analysis</option>
                         <option value="BTL5">Evaluate</option>
                         <option value="BTL6">Create</option>
                       </select>
                     </div>
                            <?php if (!empty($coError)): ?>
                                <span class="help-inline"><?php echo $coError;?></span>
                            <?php endif; ?>
                             <?php if (!empty($btlError)): ?>
                                <span class="help-inline"><?php echo $btlError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      </div>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($tloError)?'error':'';?>">
                        <label class="control-label">Topic Learning Outcome (TLO)</label>
                        <div class="controls">
                            <input class="form-control" name="tlo" type="text" required placeholder="Topic Learning Outcome" value="<?php echo !empty($tlo)?$tlo:'';?>">
                            <?php if (!empty($tloError)): ?>
                                <span class="help-inline"><?php echo $tloError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      </div>
                      </div>

                       <div class="row">
                      <div class="col-md-6">
                      <div class="control-group <?php echo !empty($activitiesError)?'error':'';?>">
                        <label class="control-label">Instructional Methods / Activities</label>
                        <div class="controls">
                          <select name="activities" class="form-control" required id="combo" style="width:250px;">
                           <option value="" selected="selected" disabled>Select one</option>
                           <option value="Blackboard">Blackboard</option>
                           <option value="LCD">LCD</option>
                           <option value="Quiz">Quiz</option>
                           <option value="Case Study">Case Study</option>
                           <option value="Role Play">Role Play</option>
                           <option value="Assignment">Assignment</option>
                           <option value="Discussion">Discussion</option>
                           <option value="Video">Video</option>
                           <option value="Problems">Problems</option>
                           <option value="Others">Others</option>
                         </select>
                            <?php if (!empty($activitiesError)): ?>
                                <span class="help-inline"><?php echo $activitiesError;?></span>
                            <?php endif;?>
                        </div>
                        </div>
                        </div>
                        </div>

                         <div class="row">
                      <div class="col-md-6">
                        <div class="control-group <?php echo !empty($assessmentError)?'error':'';?>">
                        <label class="control-label">Assessment Method for TLO</label>
                        <div class="controls">
                            <input class="form-control" name="assessment" type="text" required placeholder="Assesment Method" value="<?php echo !empty($assessment)?$assessment:'';?>">
                            <?php if (!empty($assessmentError)): ?>
                                <span class="help-inline"><?php echo $assessmentError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      </div>
                      </div>
                      <div style="margin-top: 10px;" class="form-actions">
                          <button type="submit" name="cdp" class="btn btn-primary">Next >></button>
                          <button style="margin-left:250px" name="cdp2" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>

     </div>

    </div>
    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>
<?php ob_end_flush(); ?>
</html>
