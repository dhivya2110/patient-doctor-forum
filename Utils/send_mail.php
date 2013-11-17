<?php
	function send_email($from, $to, $subject, $body)
	{
		require_once "Mail.php";
		
		$headers = array(
				'From' => $from,
				'To' => $to,
				'Subject' => $subject,
				'Content-type' => 'text/html',
				'charset' => 'iso-8859-1'
		);
		
		$smtp = @Mail::factory('smtp', array(
				'host' => 'ssl://smtp.gmail.com',
				'port' => '465',
				'auth' => true,
				'username' => 'malu.t90@gmail.com',
				'password' => '28june1990@'
		));
		
		$mail = @$smtp->send($to, $headers, $body);
		
		if (PEAR::isError($mail)) 
		{
			return false;
		}
		
		return true;
	}
?>