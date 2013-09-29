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
			
			return $FAQList;
		}
		else
			throw new Exception("Invalid request. Category/Type not set");
	}

	function isValidCategory($category)
	{
		global $question_category_list;
		
		if(in_array($category, $question_category_list))
		{
			return true;
		}
		else 
		{
			return false;
		}
	}

	function isValidType($type)
	{
		global $question_type_list;

		if(in_array($type, $question_type_list))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	#start
	$api_call_status = array();

	try
	{
		$api_call_result["faqlist"] = fetchFAQ();
		$api_call_status["success"] = true;
		$final_result = array_merge($api_call_result, $api_call_status);
		echo json_encode($final_result);
	}

	catch (Exception $e) 
	{
		$api_call_status["success"] = false;
		$api_call_status["message"] = $e->getMessage();
		echo json_encode($api_call_status);
	}
?>