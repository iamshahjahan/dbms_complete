<html>
	<head>
		<link rel="stylesheet" href="flipclock.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script src="flipclock.js"></script>
	</head>
	<body>
	<div class="clock" style="margin:2em;"></div>
	<div class="message"></div>

	<script type="text/javascript">
		var clock;
		
		$(document).ready(function() {
			var clock;
			clock = $('.clock').FlipClock(15, {
		        clockFace: 'MinuteCounter',
		        countdown: true,
		        callbacks: {
		        	stop: function() {
		        		$('.message').html('')
		        	}
		        }
		    });
		});
		function timesUp()
		{
		  location = "noanswer.php"
		}
		setTimeout("timesUp()",15000)
	</script>
	
	</body>
</html>