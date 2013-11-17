<?php
#db-credentials
$db_username = 'root';
$db_password = '';
$db_name = 'forum';
$db_hostname = 'localhost';

$data_uri = "../model/";

$data_FAQ_uri = $data_uri . "FAQA.php";
$data_posted_question_uri = $data_uri . "Question.php";

$util_uri = "../Utils/";

$util_send_mail = $util_uri . "send_mail.php";

$lib_uri = "../libs/";

$template_uri = "../templates/";

$question_fwd_template_patient = $template_uri . "QuestionForwardedAlertPatient.html";
$question_fwd_template_doctor = $template_uri . "QuestionForwardedAlertDoctor.html";

?>