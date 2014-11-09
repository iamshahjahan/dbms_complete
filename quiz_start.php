<?php
	
	require_once('header_admin.php');
	require_once('connectvars.php');


	@session_start();
	if (empty($_SESSION['a_id'])) {
			header('Location: '.'admin.php');
		}
			
	if ( isset($_POST['submit']))
	{
		$quiz_name = $_POST['quiz_name'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		
		// $user_id = $_SESSION['user_id'];
		if ( !empty($quiz_name) && !empty($start_date) && !empty($end_date))
		{
			if(preg_match("/\d{4}\-\d{2}-\d{2}/", $start_date) && preg_match("/\d{4}\-\d{2}-\d{2}/", $end_date))
			{
			
				require_once('connectvars.php');
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
				or die('can not insert.');

				$query = "insert into quiz (quiz_name,quiz_start,quiz_end) values ('$quiz_name','$start_date','$end_date')";
				$result = mysqli_query($dbc,$query)
				or die("error in insertion");
				// $home = "index.php";
				// header('Location: '.$home);
				mysqli_close($dbc);

				$_POST['quiz_name']="";
				$_POST['start_date']="";
				$_POST['end_date']="";
			}
	// }

		}
		else
		{
			echo "Please fill all the fields.";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Start a quiz</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
			label
			{
				display: inline-block;
				width: 140px;
			}
			textarea
			{
				color: 4B0082; font-family: Verdana; font-weight: bold;font-size:20px; background-color: #72A4D2;
			}
			input
			{
				color: A0522D; font-family: Verdana; font-weight: bold; font-size: 15px ; background-color: #aaa;
			}
		</style>
	</head>
	<body>
		<div class="row">
			<div class="col-md-offset-1 tpad fpad col-md-8">
				<h3> Start A Quiz </h3>
					<form method = "POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<label for="quiz_name">Quiz Name: </label>
							<textarea rows= 5 cols=60 id = "quiz_name" name= "quiz_name" AUTOFOCUS><?php if ( !empty($_POST['quiz_name'])) echo $_POST['quiz_name']; ?></textarea><br>
						
						<label for = "start_date">Start Date: </label>
							<input type = "text" id = "start_date" name="start_date" value="<?php if ( !empty($_POST['start_date'])) echo $_POST['start_date']; ?>"/><br>

						<label for = "end_date">End Date: </label>
							<input type = "text" id = "end_date" name="end_date" value="<?php if ( !empty($_POST['end_date'])) echo $_POST['start_date']; ?>"/><br>
						
							<input type="hidden" name="myform_key" value="<?php echo md5("CrazyFrogBros"); ?>" />
						<input id="color" type="submit" name="submit" value="Submit"/>
					</form>
			</div>
		</div>
	</body>
</html>
