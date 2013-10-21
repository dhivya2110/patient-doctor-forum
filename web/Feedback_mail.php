<?php
include '../Utils/send_mail.php';
//converting veriables
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$recipient = 'dhivya2110@gmail.com'; 
$subject="Contact Form"; 
//creating message
$content = "New feedback form submission \n From: ".$name." \n \n \n Email: ".$email.", \n \n \n Message: ".$message; 
//sending message
send_mail($recipient,$subject, $content);
?>