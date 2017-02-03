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
            $asse = $_GET['as']; }
foreach($_POST['ques'] as $key=>$ques) {
            $ques = mysql_real_escape_string($ques, $dbcon1);
            $code = mysql_real_escape_string(($_POST['code'][$key]), $dbcon1);
            $btl = mysql_real_escape_string(($_POST['btl'][$key]), $dbcon1);
            $marks=mysql_real_escape_string(($_POST['marks'][$key]), $dbcon1);
            $descr=mysql_real_escape_string(($_POST['desc'][$key]), $dbcon1);
            $cat=mysql_real_escape_string(($_POST['category'][$key]), $dbcon1);

$row_data[] = "('$faculty_code','$depart_code','$program', '$sem','$course','$asse', '$ques', '$code', '$btl', '$marks','$descr','$cat')";
}
if (!empty($row_data)) {
$sql = 'INSERT INTO qp_set(faculty_code,depart_code,programme_code,semester_code,course_code,assesmenttype_code,qes_no,co_code,btl_code,max_mark,descr,Category) VALUES '.implode(',', $row_data);
$result = mysql_query($sql, $dbcon1 ) or die(mysql_error($dbcon1));

if ($result)
{
header("location:../Services.php");
echo "<div class='alert alert-success' role='alert'><center>You have successfully added!!</div>";
}
else
echo 'query failed' ;
}
?>
