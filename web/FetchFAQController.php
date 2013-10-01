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
		$family_faq_result = json_decode(file_get_contents("http://localhost/patient-doctor-forum/APIs/FetchFAQ.php?category=$category&type=$type"), true);

		if($family_faq_result["success"] == true)
		{
			$faq_list = $family_faq_result['faqlist'];
			
			foreach ($faq_list as &$faq)
			{
				$question = $faq['question'];
				$question_desc = $faq['question_desc'];
				$answer_id = $faq['answer_id'];
	?>
	<h3>
		<?php
			echo $question;
		?>
	</h3>
	<div>
		<?php
			echo $question_desc;
		?>
		<br/><br/>
		<a href ="http://localhost/patient-doctor-forum/APIs/FetchAnswer.php?answer_id= <?php echo $answer_id ?>" > View Answer </a>
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