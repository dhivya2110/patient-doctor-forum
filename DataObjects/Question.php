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

function updateQuestionById($id, $question, $question_desc, $answer_en, $answer_ml, $video_link, $type, $category, $patient_id, $answer_author, $status)
{
	$sql = "update patientqa set question = '$question', question_desc = '$question_desc', answer_en = '$answer_en', answer_ml = '$answer_ml', video_link = '$video_link', type = $type, category = $category, patient_id = $patient_id, answer_author = '$answer_author', status = $status where id = $id";
	$result = update_sql($sql);
	return $result;
}

?>