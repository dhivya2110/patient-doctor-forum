<?php
	include 'api-config.php';
	include $data_posted_question_uri;

	function postQusetion()
	{
		if(isset($_POST['question-to-post']) && isset($_POST['patient_id']) && isset($_POST['status']))
		{
			$question = $_POST['question-to-post'];
			$patientId = $_POST['patient_id'];
			$status = $_POST['status'];
			
			$questionDesc = '';
			
			if(isset($_POST['question_desc']))
				$questionDesc = $_POST['question_desc'];
			
			$insertResult = insertQuestion($question, $questionDesc, $patientId, $status);
			
			return $insertResult;
		}
		else
			throw new Exception("Input parameter missing in request");
	}

	try
	{
		$api_call_result["row_inserted"] = postQusetion();
		$api_call_result["success"] = true;
	}

	catch (Exception $e) 
	{
		$api_call_result["success"] = false;
		$api_call_result["message"] = $e->getMessage();
	}
	
	echo json_encode($api_call_result);
?>