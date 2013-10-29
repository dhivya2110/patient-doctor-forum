<?php

	function send_mail($to, $subject, $message)
	{
		//
		ini_set("SMTP","aspmx.l.google.com");
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers .= "From: dhivya@abme.in" . "\r\n";
		//send the email
		$mail_sent = mail( $to, $subject, $message, $headers);
		//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
		echo $mail_sent ? "Mail sent" : "Mail failed";
	}
?>