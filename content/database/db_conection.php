    <?php  session_start();
	
	/*	$dbh1 = mysql_connect($hostname, $username, $password); 
		$dbh2 = mysql_connect($hostname, $username, $password, true); 

		mysql_select_db('database1', $dbh1);
		mysql_select_db('database2', $dbh2);

		Then to query database 1 pass the first link identifier:

		mysql_query('select * from tablename', $dbh1);

		and for database 2 pass the second:

		mysql_query('select * from tablename', $dbh2)
	*/
	
		
    $dbcon1=@mysql_connect("localhost","root","");
	$dbcon2=@mysql_connect("localhost","root","", true);  
    mysql_select_db('hits_obe',$dbcon1); 
	//mysql_select_db('obe',$dbcon2);  	

	function getUserData($id)
	{
		$query = @mysql_query("select * from login where id=$id limit 1");
		return mysql_fetch_array($query,1);

	}
	/*
	$db_servername = "localhost";
	$db_username = "root";
	$db_password = "";
	$db_dbname   = "hits_events";
 	
	*/
    ?>  