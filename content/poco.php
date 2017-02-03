
<?php

 Include("../database/db_conection.php");
 error_reporting(0);

if(isset($SESSION['id']))
{
  header("location:index.php");
  exit();
}
else
{
  $userData = getUserData($_SESSION['id']);
}


$sql = mysql_query("Select batch_code, programme_code,sem_code from workload where course_code = '".$_GET['pro']."' ") or die(mysql_error);
while($row = mysql_fetch_array($sql))
{
$row_data = array();
$faculty_code = $userData['faculty_code'];
$depart_code = $userData['department'];
$programme_code = $row['programme_code'];
$batch = $row['batch_code'];
$sem = $row['sem_code'];
$course = $_GET['pro'];
}
foreach($_POST['co'] as $row=>$co) {
$co  = mysql_real_escape_string($co, $dbcon1);
$p1  = mysql_real_escape_string($_POST['po1'][$row], $dbcon1);
$p2  = mysql_real_escape_string($_POST['po2'][$row], $dbcon1);
$p3  = mysql_real_escape_string($_POST['po3'][$row], $dbcon1);
$p4  = mysql_real_escape_string($_POST['po4'][$row], $dbcon1);
$p5  = mysql_real_escape_string($_POST['po5'][$row], $dbcon1);
$p6  = mysql_real_escape_string($_POST['po6'][$row], $dbcon1);
$p7  = mysql_real_escape_string($_POST['po7'][$row], $dbcon1);
$p8  = mysql_real_escape_string($_POST['po8'][$row], $dbcon1);
$p9  = mysql_real_escape_string($_POST['po9'][$row], $dbcon1);
$p10 = mysql_real_escape_string($_POST['po10'][$row], $dbcon1);
$p11 = mysql_real_escape_string($_POST['po11'][$row], $dbcon1);
$p12 = mysql_real_escape_string($_POST['po12'][$row], $dbcon1);


$row_data[] = "('$faculty_code','$depart_code','$programme_code', '$batch','$sem','$course','$co','$p1', '$p2', '$p3', '$p4', '$p5', '$p6', '$p7', '$p8', '$p9', '$p10', '$p11', '$p12')";
}

if (!empty($row_data)) {
$sql = 'INSERT INTO co_po_mapping(faculty_code,depart_code,programme_code,batch_code,semester_code,course_code,co_code,po1,po2,po3,po4,po5,po6,po7,po8,po9,po10,po11,po12) VALUES '.implode(",",$row_data);
$result = mysql_query($sql, $dbcon1 ) or die(mysql_error($dbcon1));
mysql_query("UPDATE co set assigned = 1 where course_code = '".$course."' && co_range = '".$co."'") or die(mysql_error($dbcon1));
header('location:../Services.php');
}
?>
