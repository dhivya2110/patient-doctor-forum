<?php
	include 'api-config.php';
	include $data_object_uri .'Question.php';
	include '../config.php';
	include '../Utils/send_mail.php';
	
	function FwdQn()
	{
		if(isset($_POST['question-to-post']) && isset($_POST['patient_id']))
		{
			$question = $_POST['question-to-post'];
			$patientId = $_POST['patient_id'];
				
			$questionDesc = '';
				
			if(isset($_POST['question_desc']))
				$questionDesc = $_POST['question_desc'];
				
			$message = patientPostQuestion($question, $questionDesc, $patientId);
				
			send_mail("dhivya2110@gmail.com",$message);
		}
		else
			throw new Exception("question or patient_id not set in request");
	}
	?>