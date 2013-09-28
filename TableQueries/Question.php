<?php

include('../DB/DBUtil.php');

function getQuestionsByCategoryAndType($category, $type)
{
	$sql = "Select * from questions where category = $category and type = $type";
	$result = execute_sql($sql);
	return $result;
}

?>