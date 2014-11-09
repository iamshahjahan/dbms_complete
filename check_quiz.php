<?php

	function check_quiz()
	{
				@session_start();
				
	  			// echo 'after unattemped: '.$_SESSION['unattempted'];
	  			// echo '<a href="confirmation.php"> Click here </a>';
				require_once('connectvars.php');
				$user_id = $_SESSION['user_id'];
			
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	  			// echo 'Your answer is empty';
	  			// exit();
	  			$result = mysqli_query($dbc,"select * from quiz")
		    	or die ("Error in updating values in user_question");

		    	while($row = mysqli_fetch_array($result))
		    	{
		    		// echo $row['quiz_id'];
			    	// echo $row['quiz_name'];
			    	// echo $row['quiz_start'];
			    	// echo $row['quiz_end'];
			    	 $date = date("Y-m-d");
			    	// echo '<br>';
			    	// echo $date;

			    	if( (strtotime($date) >= strtotime($row['quiz_start'])) && (strtotime($date) < strtotime($row['quiz_end'])))
					{

						
						$_SESSION['quiz_id'] = $row['quiz_id'];
						$_SESSION['quiz_name'] = $row['quiz_name'];
	   					return 1;
					}
		    	}
		    	  
		    	  $result = mysqli_query($dbc,"select * from quiz order by abs(datediff(now(),`quiz_start`)) limit 1");
		    	  $row = mysqli_fetch_array($result);
				  $_SESSION['quiz_name'] = $row['quiz_name'];
				  return 0;
		    	
	}

	
?>
