<?php

include 'api-config.php';
include $data_posted_question_uri;

function postAnswer()
{
	$inputParamsList = array("question_id","question","question_desc","answer_en","answer_ml","video_link","type","category","patient_id","answer_author","status");
	
	$updateVariables = array();
	
	foreach ($inputParamsList as $inputName)
	{
		if(isset($_GET[$inputName]))
		{
			$updateVariables[$inputName] = $_GET[$inputName];
		}
	}
	
	if(!array_key_exists("question_id", $updateVariables))
		throw new Exception("Question id not given. Can't update");
			
	$updateResult = updateQuestionById($updateVariables['question_id'], $updateVariables);
			
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