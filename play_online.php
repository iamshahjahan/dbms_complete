<?php
	require_once('header1.php');
	require_once('checklogin.php');
	

	require_once('check_quiz.php');

?>
	<!DOCTYPE html>
<html>
<head>

	<link href="http://fonts.googleapis.com/css?family=Abel|Open+Sans:400,600" rel="stylesheet"/>

	<style>

		/* http://css-tricks.com/perfect-full-page-background-image/ */
		html {
			background: url(img/6133364748_89f2365922_o.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
		}

		body {
			padding-top: 20px;
			font-size: 16px;
			font-family: "Open Sans",serif;
			background: transparent;
		}

		h4 {
			font-family: "Abel", Arial, sans-serif;
			font-weight: 400;
			font-size: 40px;
		}

		/* Override B3 .panel adding a subtly transparent background */
		.panel {
			background-color: rgba(255, 255, 255, 0.9);
		}

		.margin-base-vertical {
			margin: 40px 0;
		}
		.center
		{
			width: 100%;
			margin: 0 auto;
		}

	</style>

</head>
<body>

	<div class="container">
		<div class="row tpad fpad">
			<div class="col-md-6 col-md-offset-3 panel panel-default">

				<!-- <h1 class="margin-base-vertical">Have you ever seen the rain?</h1> -->
				<h4 class="margin-base-vertical">
					Rules and regulations for Online Quiz
				</h4>
				<p> 
					1. It is an online Islamic quiz where users has to participate in an quiz competition.
				</p>
				<p>
					2. There will be 30 questions for 30 minutes. 
				</p>
				<p>
					3. You can participate only once in the quiz.
				</p>
				<p>
					4. The score will be declared next day.
				</p>
	
			<?php 

				if(check_quiz())
					{
						?>
						<a href="playquiz.php?level=O"><button class="btn center btn-success btn-lg">Start : <?php echo $_SESSION['quiz_name'];?></button></a>
						<?php
					}
					else
					{
						?>
						<a href="index.php"><button class="btn center btn-primary btn-lg">Next Quiz : <?php echo $_SESSION['quiz_start'];?></button></a>
						<?php

					}
			 ?>
				
			</div><!-- //main content -->
		</div><!-- //row -->
	</div> <!-- //container -->

</body>
</html>
<?php
	require_once('footer.php');
?>