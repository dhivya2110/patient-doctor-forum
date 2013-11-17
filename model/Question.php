<?php
include ($util_uri . 'DBUtil.php');

function insertQuestion($question, $question_desc, $patient_id, $status)
{
	$sql = "insert into patientqa (question, question_desc, patient_id, status) values('$question', '$question_desc', $patient_id, $status)";
	$result = insert_sql($sql);
	return $result;
}

function getQuestionById($id)
{
	$sql = "select * from patientqa where id = $id";
	$result = execute_sql($sql);
	
	//No result found for the query
	if(empty($result))
		return null;
	
	//only one question exists for a given id. So returning the first question instance
	return $result[0];
}

function updateQuestionById($id, $data)
{
	$inputStringParamsList = array("question","question_desc","answer_en","answer_ml","video_link","answer_author");
	$inputNumberParamsList = array("type","category","patient_id","status");
	
	$sql = "update patientqa set ";
	
	$updateParametersGiven = false;
	
	foreach($data as $colName => $colValue)
	{
		if(in_array($colName, $inputStringParamsList))
		{
			$updateParametersGiven = true;
			$sql = $sql . "$colName = '$colValue',";
		}
		else if(in_array($colName, $inputNumberParamsList))
		{
			$updateParametersGiven = true;
			$sql = $sql . "$colName = $colValue,";
		}
	}
	
	if($updateParametersGiven == false)
		throw new Exception("No parameters are given for updating");
	
	$sql = rtrim($sql, ","); //to remove the last comma added in for loop
	
	$sql = $sql . " where id = $id";
	
	$result = update_sql($sql);
	return $result;
}

?>