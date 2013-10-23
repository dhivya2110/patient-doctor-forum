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
  $('[data-target]').click( function (e) {
    var target = $($(this).attr('data-target'));
    target.load($(this).attr('href'));

    e.preventDefault(); // prevent anchor from changing window.location
  });
</script>
		<!-- 		<script> 
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
		</script>  -->
	</head>
	<body>
		
		<div id = "banner" align="center">
			<img src="Utils/sctimst_logo.png" align="middle">
		</div>
		
<!-- 		<div id = "menu" > -->
<!-- 			<span ><a href = "#" id = "ask-question" >Ask Question</a></span> -->
<!-- 		</div> -->
		<div id='cssmenu'>
		<?php 
				$type = $_COOKIE["type"];
			?>
<ul>
<li class='active'><a data-target="#questions" href="web/Home.html"><span>Home</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=1&type=<?php echo $type ?>"><span>Personal</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=2&type=<?php echo $type ?>"><span>Family</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=3&type=<?php echo $type ?>"><span>Vocation</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=4&type=<?php echo $type ?>"><span>Community</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=5&type=<?php echo $type ?>"><span>Social</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=6&type=<?php echo $type ?>"><span>Recreation</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=7&type=<?php echo $type ?>"><span>Nutrition</span></a></li>
				<li><a data-target="#questions" href="web/FetchFAQController.php?category=8&type=<?php echo $type ?>"><span>Physical Activity</span></a></li>
				<li class='last'><a data-target="#questions" href="web/Contact.html"><span>Contact Us</span></a></li>
</ul>
</div>
		
		<div id = "story-board" style="display: inline-block" >
			<?php include 'web/newScrollerStatic.html' ?>
		</div>
		
		<div id = "tips_video" style="display: inline-block" >
			<?php include 'web/Scrollerstatic_right.html' ?>
		</div>
		<div id = "questions" style="display: inline-block" >
		</div>
	</body>
</html>