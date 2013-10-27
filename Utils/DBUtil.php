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
		
		if($rows_updated == -1)
			throw new Exception("Error in the input values given");
		else if($rows_updated == 0)
			throw new Exception("No update happened. Either value updated already or no such question exists");
		
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