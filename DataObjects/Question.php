<?php
include ('../config.php');
include ('../Utils/DBUtil.php');

function insertQuestion($question, $question_desc, $patient_id)
{
	global $question_unanswered;
	$sql = "insert into patientqa (question, question_desc, patient_id, status) values('$question', '$question_desc', $patient_id, $question_unanswered)";
	$result = insert_sql($sql);
	return $result;
}

function getQuestionsById($id)
{
	$sql = "select * from patientqa where id = $id";
	$result = execute_sql($sql);
	return $result;
}

?>