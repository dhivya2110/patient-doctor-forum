<?php

include 'api-config.php';
include '../Utils/send_mail.php';
include $data_object_uri .'Forward.php';

function forwardQuestion()
{
	$inputParamsList = array("id","question","question_desc","patient_id","status");
	
	$updateVariables = array();
	
	$message="<<<EOF
	<html><body><center>New question posted to our forum. Kindly find the details below</center>
	</body>
</html>";

	foreach ($inputParamsList as $key => $value)
	{
		if(isset($_GET[$value]))
		{
			$message= $message.$key.': '.$_GET[$value].PHP_EOL;
		}
		else
			throw new Exception("$inputName not set in request");
	}
	$message=$message."EOF";		
	$recipients="dhivya2110@gmail.com";
			send_mail($recipients,"Check",$message);
	
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