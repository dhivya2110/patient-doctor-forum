<?php
include ('../config.php');
include ('../Utils/DBUtil.php');

function patientPostQuestion($question, $question_desc, $patient_id)
{
	global $question_unanswered;
	$sql = "insert into patientqa (question, question_desc, patient_id, status) values('$question', '$question_desc', $patient_id, $question_unanswered)";
	$result = insert_sql($sql);
	return $result;
}
?>