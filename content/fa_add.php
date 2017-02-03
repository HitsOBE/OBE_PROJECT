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
            $asse = $_GET['as'];
            $ast = $_POST['ast'];
            $co_no = $_POST['no'];
            $details = $_POST['details'];
            $marks = $_POST['marks'];
            $btl = $_POST['btl'];
            $roll = $_POST['roll'];
            $name = $_POST['name'];
         }

$row_data[] = "('$faculty_code','$depart_code','$program', '$sem','$course','$roll', '$name', '$asse', '$ast', '$co_no', '$details', '$btl','$marks')";
if (!empty($row_data)) {
$sql = 'INSERT INTO fa_setting(faculty_code,depart_code,programme_code,semester_code,course_code,roll_number,name,assesmenttype_code,ast,co_no,cod,btl,max) VALUES '.implode(',', $row_data);
$result = mysql_query($sql, $dbcon1 ) or die(mysql_error($dbcon1));
$sql1 = 'UPDATE students set assigned_'.$asse.' = 1 where roll_number ='.$_POST['roll'];
$result1 = mysql_query($sql1,$dbcon1);

if ($result && $result1)
{
header("location:../fa.php?as=$asse&course=$course");
echo "<div class='alert alert-success' role='alert'><center>You have successfully added!!</div>";
}
else
echo 'query failed' ;
}
?>
