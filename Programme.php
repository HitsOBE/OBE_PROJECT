<?php

	include('database/db_conection.php');
	$fc = $_GET['fc'];
	$sql = mysql_query("SELECT DISTINCT programme_code from programme where faculty_code = '".$fc."'");
	if(mysql_num_rows($sql))
	{
		$data = array();
		while($row=mysql_fetch_array($sql))
		{
			$data[] = array(
				'programme' => $row['programme_code']
				);
		}

		header("Content-type: application/json");
		echo json_encode($data);
	}
?>
