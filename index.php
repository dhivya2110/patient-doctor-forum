<html lang="en">
	<head>
	  	<meta charset="utf-8" />
	  	<title>Welcome</title>
	  	<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			include('jQuery/jQuery-includes.html');
			include ('config.php');
			include ('web/QuestionTypeSelector.php');
			include ('web/AskQuestion.html');
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
		
		<div id = "banner" align="center">
			<img src="Utils/sctimst_logo.png" align="middle">
		</div>
		
		<div id = "menu" >
			<span ><a href = "#" id = "ask-question" >Ask Question</a></span>
		</div>
		
		<div id = "story-board" >
			<?php include 'web/newScrollerStatic.html' ?>
		</div>
		
		<div id = "tips_video" >
			<?php include 'web/Scrollerstatic_right.html' ?>
		</div>
		<div id = "questions" >
			<?php 
				$type = $_COOKIE["type"];
			?>
			<div id="tabs">
			  <ul>
			    <li><a href="web/Home.html">Home</a></li>
				<li><a href="web/FetchFAQController.php?category=1&type=<?php echo $type ?>">Personal Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=2&type=<?php echo $type ?>">Family Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=3&type=<?php echo $type ?>">Vocation Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=4&type=<?php echo $type ?>">Community Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=5&type=<?php echo $type ?>">Social Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=6&type=<?php echo $type ?>">Recreation Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=7&type=<?php echo $type ?>">Nutrition Questions</a></li>
				<li><a href="web/FetchFAQController.php?category=8&type=<?php echo $type ?>">Physical Activity Questions</a></li>
				<li><a href="web/Contact.html">Contact Us</a>
			  </ul>
			</div>
		</div>
	</body>
</html>