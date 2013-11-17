<?php
	include 'api-config.php';
	include $data_posted_question_uri;

	function fetchQuestionById()
	{
		if(isset($_GET['question_id']))
		{
			$id = $_GET['question_id'];
			if(is_numeric($id))
			{
				$question = getQuestionById($id);
				if(is_null($question))
					throw new Exception("No question with the given id exists");
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