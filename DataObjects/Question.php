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

function updateQuestionById($askedQuestion)
{
	$inputStringParamsList = array("question","question_desc","answer_en","answer_ml","video_link","answer_author");
	$inputNumberParamsList = array("type","category","patient_id","status");
	
	$sql = "update patientqa set ";
	
	foreach($inputStringParamsList as $colName)
	{
		$sql = $sql . "$colName = '$askedQuestion[$colName]',";
	}
	
	foreach($inputNumberParamsList as $colName)
	{
		$sql = $sql . "$colName = $askedQuestion[$colName],";
	}
	
	$sql = rtrim($sql, ","); //to remove the last comma added in for loop
	
	$id = $askedQuestion['id'];
	
	$sql = $sql . " where id = $id";
	
	echo "Final sql : $sql";
	$result = update_sql($sql);
	return $result;
}

?>