<?php

include 'api-config.php';
include $util_send_mail;
require $lib_uri. 'h2o/h2o.php';
include $data_posted_question_uri;

function forwardQuestion()
{
	$input_data = validate_and_get_input();
	
	$question = getQuestionById($input_data['id']);
	
	if(is_null($question))
		throw new Exception("No such question exist to forward");
	
	$patient_id = $question['patient_id'];
	
	//TODO fetch patient details using Id and fill the patient_name
	
	//send notification to doctors list given
	global $question_fwd_template_doctor;
	$h2o = new h2o($question_fwd_template_doctor);
	$message = $h2o->render(array(
			'question' => $question['question'],
			'question_desc' => $question['question_desc']
	));
	
	send_email("malu.t90@gmail.com", $input_data['fwd_to'],"A question is forwarded to you for answering", $message);
	
	//send notification to patient
	global $question_fwd_template_patient;
	$h2o = new h2o($question_fwd_template_patient);
	$message = $h2o->render(array(
			'patient_name'=>'Peter Jackson', 
			'question' => $question['question'],
			'question_desc' => $question['question_desc']
	));
	send_email("malu.t90@gmail.com", "dhivya2110@gmail.com,malu.t90@gmail.com","Your Question is forwarded", $message);
	
	//updating DB that the question is forwarded
	//TODO to remove hard coding for forward status
	$input_data['status']  = 3;
	updateQuestionById($input_data['id'], $input_data);
}

function validate_and_get_input()
{
	$required_inputParamsList = array("id", "fwd_to");
	$optional_input_params_list  = array("question_desc");
	
	foreach ($required_inputParamsList as $value)
	{
		if(isset($_GET[$value]))
		{
			$input_given = $_GET[$value];
			$input_data[$value] = $input_given;
		}
		else
			throw new Exception("$value not set in request");
	}
	
	foreach ($optional_input_params_list as $value)
	{
		if(array_key_exists($value, $input_data))
			$input_data[$value] = "";
	}
	
	return $input_data;
}

try
{
	$api_call_result["rows_updated"] = forwardQuestion();
	$api_call_result["success"] = true;
}

catch (Exception $e)
{
	$api_call_result["success"] = false;
	$api_call_result["message"] = $e->getMessage();
}

echo json_encode($api_call_result);

?>