<?php
    if(isset($_POST['submit']))
    {
        $num = $_POST['num'];
        $as = $_POST['ia'];
        $as = $_POST['ia'];
        $course = $_POST['cou'];
        header("Location:QuesPapSet.php?num=$num&as=$as&course=$course");
    }

    if(isset($_POST['submit1']))
    {
        $course = $_POST['cou'];
        $as = $_POST['ia'];
        header("Location:MarksEntry.php?&as=$as&course=$course");
    }

    if(isset($_POST['submit2']))
    {
        $course = $_POST['cou'];
        header("Location:ProgramOutcomes.php?course=$course");
    }
    if(isset($_POST['submit3']))
    {
        $course = $_POST['cou'];
        header("Location:peo.php?peo=$course");
    }

    if(isset($_POST['submit4']))
    {
        $course = $_POST['cou'];
        header("Location:CourseOutcomes.php?pro=$course");
    }

    if(isset($_POST['submit5']))
    {
        $course = $_POST['cou'];
        header("Location:CourseDeliveryPlan.php?cou=$course");
    }

    if(isset($_POST['submit6']))
    {
       $course = $_POST['cou'];
        $as = $_POST['ia'];
        header("Location:FA.php?&as=$as&course=$course");
    }
?>

<?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>

<div class="modal fade bs-example-modal-lg" id="cdp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><center>Course Delivery Plan</center></h4>
      </div>
      <div class="modal-body">
          <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" class="form-control" required id="combo" style="width:210px;">
        <option value="" selected="selected" >Course Name</option>
        <?php
          while($row = mysql_fetch_array($res))
        {
          echo'<option value="'.$row['course_code'].'">'.$name = $row['course_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }

        $found = "SELECT * from qp_set where programme_code= '".$selected."'";
        $f = mysql_num_rows($found);
        ?>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit5" type="submit" class="btn btn-primary">GO >></a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT programme_code,programme_name FROM programme where faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>
<div class="modal fade bs-example-modal-lg" id="peo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><center>Program Educational Outcomes</center></h4>
      </div>
      <div class="modal-body">
          <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" class="form-control" required id="combo" style="width:210px;">
        <option value="" selected="selected" >Programme Name</option>
        <?php
          while($row = mysql_fetch_array($res))
        {
          echo'<option value="'.$row['programme_code'].'">'.$name = $row['programme_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }

        $found = "SELECT * from qp_set where programme_code= '".$selected."'";
        $f = mysql_num_rows($found);
        ?>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit3" type="submit" class="btn btn-primary">GO >></a>
        </form>
      </div>
    </div>
  </div>
</div>


<?php

        $selected= '';
       $fac = $userData['faculty_code'];
        //$pc = $_POST['cou'];
       $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
       if(isset($_POST['cou']))
       {
         $selected = $_POST['cou'];
         //echo  $selected;
       }
       else
       {
       }
?>

<div class="modal fade bs-example-modal-lg" id="coModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="gridSystemModalLabel"><center>Course Outcomes</center></h4>
     </div>
     <div class="modal-body">
         <form method="POST">
     <p>Select Course Name:</p>
      <select name="cou" required class="form-control" required id="combo" style="width:210px;">
       <option value="" selected="selected" >Course Name</option>
       <?php
         while($row = mysql_fetch_array($res))
       {
         echo'<option value="'.$row['course_code'].'">'.$name = $row['course_name'].'</option>';
         //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
       }
       ?>
     </select>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button name="submit4" type="submit" class="btn btn-primary">GO >></a>
       </form>
     </div>
   </div>
 </div>
</div>

 <?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>

<div class="modal fade bs-example-modal-lg" id="poco" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><center>PO/CO Mapping</center></h4>
      </div>
      <div class="modal-body">
          <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" class="form-control" required id="combo" style="width:210px;">
        <option value="" selected="selected" >Course Name</option>
        <?php
          while($row = mysql_fetch_array($res))
        {
          echo'<option value="'.$row['course_code'].'">'.$name = $row['course_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }
        ?>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit2" type="submit" class="btn btn-primary">GO >></a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on  w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>
<div class="modal fade bs-example-modal-lg" id="peo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><center>Program Educational Outcomes</center></h4>
      </div>
      <div class="modal-body">
          <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" class="form-control" required id="combo" style="width:210px;">
        <option value="" selected="selected" >Course Name</option>
        <?php
          while($row = mysql_fetch_array($res))
        {
          echo'<option value="'.$row['programme_code'].'">'.$name = $row['course_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }

        $found = "SELECT * from qp_set where programme_code= '".$selected."'";
        $f = mysql_num_rows($found);
        ?>
      </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit3" type="submit" class="btn btn-primary">GO >></a>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Questions</h4>
      </div>
      <div class="modal-body" action="QuesPapSet.php">
      <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" required class="form-control" id="combo" style="width:210px;">
        <option value="" selected="selected" >Course Name</option>
        <?php
          while($row = mysql_fetch_array($res))
        {
          echo'<option value="'.$row['course_code'].'">'.$name = $row['course_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }

        $found = "SELECT * from qp_set where programme_code= '".$selected."'";
        $f = mysql_num_rows($found);
        ?>
      </select>
      <p style="margin-top:10px;">Select Assesment Type</p>
      <select name="ia" class="form-control" id="combo" style="width:120px;">
        <option value="i1">IA 01</option>
        <option value="i2">IA 02</option>
        <option value="me">Model Exam</option>
      </select></center></th>
        <?php if($f == 0){ ?>
        <p style="margin-top:10px;">How many Questions do you want to add?</p>
        <select name="num" class="form-control" style="width:80px;">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="7">8</option>
        <option value="7">9</option>
        <option value="7">10</option>
        <option value="7">11</option>
        <option value="7">12</option>
        <option value="7">13</option>
        <option value="7">14</option>
        <option value="15">15</option>
        </select>
        <?php }

        else if($f > 0 ){
          echo '<p style="margin-top:10px;">How many Questions do you want to add?</p>';
          echo '<select name="num" class="form-control" style="width:80px;">';
          for($i = $f; $i>= 14; $i--)
            {
              echo "<option value='".$i."'>$i</option>";
              }
              echo '</select>';
          } ?>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit" type="submit" class="btn btn-primary">GO >></a>
                </form>
 </div>
</div>
 </div>
</div>

<div class="modal fade ma" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Marks Entry</h4>
      </div>
      <?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>
      <div class="modal-body">
      <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" class="form-control" required id="combo" style="width:210px;">
        <option value="" selected="selected" >Course Name</option>
        <?php
          while($row1 = mysql_fetch_array($res))
        {
          echo'<option value="'.$row1['course_code'].'">'.$name = $row1['course_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }
        ?>
      </select>
      <p style="margin-top:10px;">Select Assesment Type</p>
      <select name="ia" class="form-control" id="combo" style="width:120px;">
        <option value="i1">IA 01</option>
        <option value="i2">IA 02</option>
        <option value="me">Model Exam</option>
      </select></center></th>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit1" type="submit" class="btn btn-primary">GO >></a>
                </form>
 </div>
</div>
 </div>
</div>

<div class="modal fade ma" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formative Assesment</h4>
      </div>
      <?php

         $selected= '';
        $fac = $userData['faculty_code'];
         //$pc = $_POST['cou'];
        $res = mysql_query("SELECT DISTINCT s.course_code, s.course_name FROM workload as w join syllabus as s on w.programme_code = s.programme_code AND w.faculty_code = '".$fac."'");
        if(isset($_POST['cou']))
        {
          $selected = $_POST['cou'];
          //echo  $selected;
        }
        else
        {
        }
?>
      <div class="modal-body">
      <form method="POST">
      <p>Select Course Name:</p>
       <select name="cou" class="form-control" required id="combo" style="width:210px;">
        <option value="" selected="selected" >Course Name</option>
        <?php
          while($row1 = mysql_fetch_array($res))
        {
          echo'<option value="'.$row1['course_code'].'">'.$name = $row1['course_name'].'</option>';
          //echo '<option value="'.$selected.'" '.(($selected == $row[programme_code])?'selected="selected"':"").'>'.$row[course_name].'</option>';
        }
        ?>
      </select>
      <p style="margin-top:10px;">Select Formative Assesment Type</p>
      <select name="ia" class="form-control" id="combo" style="width:120px;">
        <option value="FA1">FA1</option>
        <option value="FA2">FA2</option>
        <option value="FA3">FA3</option>
        <option value="FA4">FA4</option>
        <option value="FA5">FA5</option>
      </select></center></th>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button name="submit6" type="submit" class="btn btn-primary">GO >></a>
                </form>
 </div>
</div>
 </div>
</div>
