<?php
	include 'api-config.php';
	include $data_object_uri .'Question.php';
	include '../config.php';

	function fetchQuestionById()
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			if(is_numeric($id))
			{
				$question = getQuestionsById($id);
				return $question;
			}
			else 
				throw new Exception("Invalid value given for question id. Only numbers are allowed.");
		}
		else
			throw new Exception("Invalid request. Question id not set");
	}

	try
	{
		$api_call_result["question"] = fetchQuestionById();
		$api_call_result["success"] = true;
		echo json_encode($api_call_result);
	}

	catch (Exception $e) 
	{
		$api_call_status["success"] = false;
		$api_call_status["message"] = $e->getMessage();
		echo json_encode($api_call_status);
	}
?>