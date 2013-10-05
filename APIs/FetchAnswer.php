<?php
	include 'api-config.php';
	include $data_object_uri . 'Answer.php';
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
			throw new Exception("Answer id not set in url");
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