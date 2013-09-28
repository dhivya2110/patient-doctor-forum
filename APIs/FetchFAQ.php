<?php
include '../TableQueries/Question.php';
include '../config.php';

function fetchFAQ()
{
	if($_GET['category'] || $_GET['type'])
	{
		$category = $_GET['category'];
		$type = $_GET['type'];
		
		if(!isValidCategory($category) || !isValidType($type))
			throw new Exception("Invalid value for category/Type");
		
		$FAQList = getQuestionsByCategoryAndType($category, $type);
		
		return json_encode($FAQList);
	}
	else
		throw new Exception("Invalid request. Category/Type not set");
}

function isValidCategory($category)
{
	global $question_category_list;
	
	if($category > 0 && $category <= count($question_category_list) + 1)
		return true;
	else 
		return false;
}

function isValidType($type)
{
	global $question_type_list;

	if($type > 0 && $type <= count($question_type_list) + 1)
		return true;
	else
		return false;
}

echo fetchFAQ();
?>