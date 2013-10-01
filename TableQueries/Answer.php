<?php

include('../DB/DBUtil.php');
include('../config.php');

function getAnswersByAnswerId($answer_id)
{
	$sql = "Select * from answers where ans_id = $answer_id";
	$result = execute_sql($sql);
	return $result;
}

?>