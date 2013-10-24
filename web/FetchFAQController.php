<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="http://richhollis.github.io/vticker/downloads/jquery.vticker.min.js?v=1.13"></script>
<script>
	$(function() 
	{
		$( ".accordion" ).accordion();
	});
</script>
<div class="accordion">
	<?php
		include ('web-config.php');
		$category = $_GET['category'];
		$type = $_GET['type'];
		$faq_result = json_decode(file_get_contents($api_uri . "FetchFAQ.php?category=$category&type=$type"), true);
		
		if($faq_result["success"] == true)
		{
			$faq_list = $faq_result['faqlist'];
			
			foreach ($faq_list as &$faq)
			{
				$question = $faq['question'];
				$question_desc = $faq['question_desc'];
				$answer = $faq['answer'];
	?>
	<h3>
		<?php
			echo $question;
		?>
	</h3>
	
	<div>
		<?php 
			if(!empty($question_desc))
			{
				echo "<b>Additional Question Details :</b> <br>";
					
				echo $question_desc;
					
				echo "<br/><br/>";
			}
		?>
				
		<b>Answer :</b> <br>
		
		<?php echo $answer ?>
	
	</div>

	<?php			
			}
		}
		else
		{
			echo "Some internal error occured";
		}
	?>
</div>