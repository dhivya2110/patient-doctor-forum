<?php

include 'api-config.php';
include $data_object_uri .'Question.php';

function postAnswer()
{
	$inputParamsList = array("id","question","question_desc","answer_en","answer_ml","video_link","type","category","patient_id","answer_author","status");
	
	$updateVariables = array();
	
	foreach ($inputParamsList as $inputName)
	{
		if(isset($_POST[$inputName]))
		{
			$updateVariables[$inputName] = $_POST[$inputName];
		}
		else
			throw new Exception("$inputName not set in request");
	}
			
	$updateResult = updateQuestionById($updateVariables);
			
	return $updateResult;	
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