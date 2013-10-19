<?php
	include 'api-config.php';
	include $data_object_uri .'Question.php';
	include '../config.php';

	function fetchFAQ()
	{
		if(isset($_POST['question-to-post']) && isset($_POST['patient_id']))
		{
			$question = $_POST['question-to-post'];
			$patientId = $_POST['patient_id'];
			
			$questionDesc = '';
			
			if(isset($_POST['question_desc']))
				$questionDesc = $_POST['question_desc'];
			
			$insertResult = patientPostQuestion($question, $questionDesc, $patientId);
			
			return $insertResult;
		}
		else
			throw new Exception("question or patient_id not set in request");
	}

	try
	{
		$api_call_result["row_inserted"] = fetchFAQ();
		$api_call_result["success"] = true;
	}

	catch (Exception $e) 
	{
		$api_call_result["success"] = false;
		$api_call_result["message"] = $e->getMessage();
	}
	
	echo json_encode($api_call_result);
?>