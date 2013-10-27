<?php

	require '../config.php';

	function connect2DB()
	{	
		global $db_hostname, $db_username, $db_password, $db_name;
		// Create connection
		$con=mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
		
		// Check connection
		if (mysqli_connect_errno($con))
		{
			throw new Exception("Internal DB error");
		}
		
		return $con;
	}

	function closeDBConnection($con)
	{
		mysqli_close($con);
	}
	
	function insert_sql($sqlQuery)
	{
		$con = connect2DB();
		
		$result = mysqli_query($con, $sqlQuery);
		
		if($result === FALSE)
		{
			closeDBConnection($con);
			throw new Exception("Internal DB error when inserting");
		}		
		
		return $result;
	}
	
	function update_sql($sqlQuery)
	{
		$con = connect2DB();
		
		$result = mysqli_query($con, $sqlQuery);
		
		$rows_updated = mysqli_affected_rows($con);
		
		closeDBConnection($con);
		
		return $rows_updated;
	}

	function execute_sql($sqlQuery)
	{
		$con = connect2DB();
		
		$result = mysqli_query($con, $sqlQuery);

		if($result === FALSE)
		{
			closeDBConnection($con);
			throw new Exception("Internal DB error when querying");
		}
		
		$resultset = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$resultset[] = $row;			
		}
		
		closeDBConnection($con);
		
		return $resultset;
	}

?>