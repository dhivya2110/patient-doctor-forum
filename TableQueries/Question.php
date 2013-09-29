<?php

include('../DB/DBUtil.php');
include('../config.php');

function getQuestionsByCategoryAndType($category, $type)
{
	global $question_posted_as_faq;
	$sql = "Select * from questions where category = $category and type = $type and status = $question_posted_as_faq";
	$result = execute_sql($sql);
	return $result;
}

?>