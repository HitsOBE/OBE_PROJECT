<?php

	include('database/db_conection.php');
	$sql = mysql_query("Select course_code from syllabus where programme_code='".$_GET["sid"]."' AND Assigned = 0");
	if(mysql_num_rows($sql))
	{
		$data = array();
		while($row=mysql_fetch_array($sql))
		{
			$data[] = array(
				'course' => $row['course_code']
				);
		}

		header("Content-type: application/json");
		echo json_encode($data);
	}
?>
