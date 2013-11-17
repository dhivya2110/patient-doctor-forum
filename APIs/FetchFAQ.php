<?php
	include 'api-config.php';
	include $data_FAQ_uri;

	function fetchFAQ()
	{
		if(isset($_GET['category']) || isset($_GET['type']))
		{
			$category = $_GET['category'];
			$type = $_GET['type'];
			
			if(!is_numeric($category) || !is_numeric($type))
				throw new Exception("Invalid value for category/Type");
			
			$FAQList = getQuestionsByCategoryAndType($category, $type);
			
			return $FAQList;
		}
		else
			throw new Exception("Invalid request. Category/Type not set");
	}

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