<?php
	include '../TableQueries/Answer.php';
	include '../config.php';

	function fetchAnswer()
	{
		if($_GET['answer_id'])
		{
			$answer_id=$_GET['answer_id'];
					
			$Answer = getAnswersByAnswerId($answer_id);
			
			return $Answer;
		}
		else
			throw new Exception("Invalid request. Category/Type not set");
	}

	#start
	$api_call_status = array();

	try
	{
		$api_call_result["answerlist"] = fetchAnswer();
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