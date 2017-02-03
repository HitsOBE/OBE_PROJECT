<?php
   Include("database/db_conection.php");

if(isset($SESSION['facultyid']))
{
 $name = getfaculty($_SESSION['facultyid']);
  if($name !== "admin")
  {
  	header("location:index.php");
  }
}
else
{
  header("location: admin/pages/login1.php");
  echo "Welcome Back Administrator";
}
?>
