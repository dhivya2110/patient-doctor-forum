<html lang="en">
	<head>
	  	<meta charset="utf-8" />
	  	<title>Welcome</title>
	  	<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			include('jQuery/jQuery-includes.html');
			include ('web/QuestionTypeSelector.php');
			include ('web/AskQuestion.php');
		?>
		<script>
		  $(function() {
			$( "#tabs" ).tabs(
			{
				beforeLoad: function( event, ui )
				{
					ui.jqXHR.error(function() 
					{
						ui.panel.html("Internal error. Please try again" );
					});
				}
			});
		  });
		</script>
	</head>
	<body>
		<div id = "banner" >
			<h1>Shree Chitra Institute</h1>
		</div>
		<div id = "menu" >
			<span ><a href = "#" id = "ask-question" >Ask Question</a></span>
		</div>
		<div id = "story-board" ></div>
		<div id = "questions" >
			<?php 
				$type = $_COOKIE["type"];
			?>
			<div id="tabs">
			  <ul>
				<li><a href="web/FetchFAQController.php?category=1&type=<?php echo $type ?>">Personal Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=2&type=<?php echo $type ?>">Family Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=3&type=<?php echo $type ?>">Vocation Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=4&type=<?php echo $type ?>">Community Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=5&type=<?php echo $type ?>">Social Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=6&type=<?php echo $type ?>">Recreation Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=7&type=<?php echo $type ?>">Nutrition Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=8&type=<?php echo $type ?>">Physical Activity Questions</a></li>
			  </ul>
			</div>
		</div>
	</body>
</html>