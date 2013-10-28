<?php 
	include '../Utils/send_mail.php';
	$message = <<<EOF
<html>
  <body bgcolor="#DCEEFC">
    <center>
        <b>Looool!!! I am reciving HTML email......</b> <br>
        <font color="red">Thanks Mohammed!</font> <br>
        <a href="http://www.maaking.com/">* maaking.com</a>
    </center>
      <br><br>*** Now you Can send HTML Email <br>
  </body>
</html>
EOF;
	$to="malu.t90@gmail.com";
	send_mail($to,"Test Mail",$message);
	
?>