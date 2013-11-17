<?php

include('../Utils/DBUtil.php');
include('../config.php');

function getQuestionsByCategoryAndType($category, $type)
{
	global $question_posted_as_faq;
	$sql = "Select * from FAQA where category = $category and type & $type > 0";
	$result = execute_sql($sql);
	return $result;
}

?>