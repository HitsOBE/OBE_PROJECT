<?php
   Include("../database/db_conection.php");

if(isset($SESSION['id']))
{
  header("location:index.php");
  exit();
}
else
{
  $userData = getUserData($_SESSION['id']);
}

$sql = mysql_query("Select sem_code, programme_code from workload where faculty_code = '".$userData['faculty_code']."' And course_code = '".$_GET['course']."'");
while($row = mysql_fetch_array($sql)){

$row_data = array();
			$faculty_code = $userData['faculty_code'];
            $depart_code =  $userData['department'];
            $program = $row['programme_code'];
            $sem = $row['sem_code'];
            $course = $_GET['course'];
            $batch = $_GET['bat'];
            $asse = $_GET['as'];
            $roll = $_POST['roll']; }
foreach($_POST['ques'] as $key=>$ques) {
            $ques = mysql_real_escape_string($ques, $dbcon1);
            $marks = mysql_real_escape_string(($_POST['marks'][$key]), $dbcon1);
            $max = mysql_real_escape_string(($_POST['max'][$key]), $dbcon1);
            $btl_code = mysql_real_escape_string(($_POST['btl'][$key]), $dbcon1);
            $co = mysql_real_escape_string(($_POST['co'][$key]), $dbcon1);

$row_data[] = "('$faculty_code','$depart_code','$program', '$batch', '$sem','$course','$asse', '$roll', '$ques', '$co', '$btl_code', '$marks','$max')";
}
if (!empty($row_data)) {
$sql = 'INSERT INTO mark_entry(faculty_code,depart_code,programme_code,batch_code,semester_code,course_code,assesmenttype_code,roll_no,qes_no,co_code,btl_code,marks,max_alloted) VALUES '.implode(',', $row_data);
$sql1 = 'UPDATE students set assigned_'.$_GET['as'].' = 1 where roll_number = '.$_POST['roll'];
$result = mysql_query($sql, $dbcon1 ) or die(mysql_error($dbcon1));
$result1 = mysql_query($sql1, $dbcon1 ) or die(mysql_error($dbcon1));
if ($result && $result1)
{
header("location:../MarksEntry.php?as=$asse&course=$course");
echo "<div class='alert alert-success' role='alert'><center>You have successfully added!!</div>";
}
else
echo 'query failed' ;
}
?>
