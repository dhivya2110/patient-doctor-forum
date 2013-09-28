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
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		throw new Exception("Internal error");
	}
	else
	{	
		#echo "connected to db successfully";
	}
	return $con;
}

function closeDBConnection($con)
{
	mysqli_close($con);
}

function execute_sql($sqlQuery)
{
	$con = connect2DB();
	
	$result = mysqli_query($con, $sqlQuery);
	
	if($result === FALSE)
	{
		echo "error";
		die(mysql_error());
	}
	
	$row = mysqli_fetch_array($result);
	print_r($row);
	closeDBConnection($con);
	
	return $row;
}

?>