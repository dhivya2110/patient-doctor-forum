<script>
	$(function() 
	{
		$( ".accordion" ).accordion();
	});
</script>
<div class="accordion">
	<?php
		$answer_id=$_GET['answer_id'];
		$ans_result = json_decode(file_get_contents($api_uri . "FetchAnswer.php?answer_id=$answer_id"), true);

		if($ans_result["success"] == true)
		{
			$answerlist=$ans_result["answerlist"];
			
			foreach ($answerlist as &$answer)
			{
				$ans= $answer['Answer'];
				echo $ans;
			}
			
		}
			else
		{
			echo "Some internal error occured";
		}
	?>
</div>