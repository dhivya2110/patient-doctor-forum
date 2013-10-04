<script>
	$(function() 
	{
		$( ".accordion" ).accordion();
	});
</script>
<div class="accordion">
	<?php
		$category = $_GET['category'];
		$type = $_GET['type'];
		$faq_result = json_decode(file_get_contents("http://localhost/patient-doctor-forum/APIs/FetchFAQ.php?category=$category&type=$type"), true);

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