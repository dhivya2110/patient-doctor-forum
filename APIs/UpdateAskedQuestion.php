<?php

include 'api-config.php';
include $data_object_uri .'Question.php';

function postAnswer()
{
	 if(isset($_POST['id']) && 
	 	isset($_POST['question']) &&
	 	isset($_POST['question_desc']) &&
	 	isset($_POST['question']) &&
	 	isset($_POST['answer_en']) &&
	 	isset($_POST['answer_ml']) &&
	 	isset($_POST['video_link']) &&
	 	isset($_POST['type']) &&
	 	isset($_POST['category']) &&
	 	isset($_POST['patient_id']) &&
	 	isset($_POST['answer_author']) &&
	 	isset($_POST['status']))
	 {
	 	$question = $_POST['question-to-post'];
		$patientId = $_POST['patient_id'];
			
		$questionDesc = '';
			
		$updateResult = updateQuestionById(4, 'sdfjnfnoi', 'jefbhwu', 'wegfwugfu', 'wegfywgfu', 'wehdwfgub/efnwuf/fbwbf/', 2, 5, 37, 'eygfry', 4);
			
		return $updateResult;
	 }
	else
		throw new Exception("Not all input parameters set in request");
	
}

try
{
	$api_call_result["rows_updated"] = postAnswer();
	$api_call_result["success"] = true;
}

catch (Exception $e)
{
	$api_call_result["success"] = false;
	$api_call_result["message"] = $e->getMessage();
}

echo json_encode($api_call_result);

?>