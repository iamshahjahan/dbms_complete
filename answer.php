<?php 
	require_once('header1.php');
	@session_start();
	if ( isset($_POST['submit']))
  	{
  			if(!isset($_SESSION['correct']))
  			{
  				$_SESSION['correct'] = 0 ;
  			}
  			if(!isset($_SESSION['question']))
  			{
  				$_SESSION['question'] = 0 ;
  			}
  			if(!isset($_SESSION['unattempted']))
  			{
  				$_SESSION['unattempted'] = 0 ;
  			}
	  		require_once('connectvars.php');
	  		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	  		//getting level from timer.php
	  	
			$level = $_POST['level'];
	  		// $_SESSION['flag']
	  		@$answer = $_POST['answer'];

	  		$_SESSION['question']+=1;
	  		$qid = $_POST['qid'];
	  		$select = $_POST['select'];
	  		$user_id = $_SESSION['user_id'];

	  		$quiz_id = 0 ;
	  		if (isset($_SESSION['quiz_id']))
	  		{
	  			$quiz_id = $_SESSION['quiz_id'];
	  		}

	  		$result = mysqli_query($dbc,"select * from question where qid = '$qid'")
	  		or die("Error in connection.");

	  		$row = mysqli_fetch_array($result);
	  		if ( empty($answer))
	  		{
	  			// echo 'before unattemped: '.$_SESSION['unattempted'];
	  			$_SESSION['unattempted']+=1;
	  			// echo 'after unattemped: '.$_SESSION['unattempted'];
	  			// echo '<a href="confirmation.php"> Click here </a>';


	  			// echo 'Your answer is empty';
	  			// exit();
	  			mysqli_query($dbc,"insert into user_question ( qid,user_id,answer_key,quiz_id) values ( '$select','$user_id',2,'$quiz_id')")
		    	or die ("Error in updating values in user_question");
		    	// require_once('header1.php');
		    	require_once('unattempted.php');

		    	// echo '<button class="btn-lg btn-danger">You did not answer the question.</button>';
		    	// exit();


	  		}

	  		else if ( $row['ANSWER'] == $answer)
	  		{
	  			$_SESSION['correct']+=1;
	  			// echo $answer;
	  			// // exit();
	  			// echo 'Your answer is correct.';
	  			// exit();
	  			mysqli_query($dbc,"insert into user_question ( qid,user_id,answer_key,quiz_id) values ( '$select','$user_id',1,'$quiz_id')")
		    	or die ("Error in updating values in user_question");
		    	require_once('correct.php');


	  		}
	  		else
	  		{
	  	// 		echo $answer;

				// echo 'Your answer is incorrect.';

				// exit();
	  			mysqli_query($dbc,"insert into user_question ( qid,user_id,answer_key,quiz_id) values ( '$select','$user_id',0,'$quiz_id')")
		    	or die ("Error in updating values in user_question");  	
		    	require_once('incorrect.php');
		
	  		}
	  		$answer = "";
	  		if ( isset($_SESSION['quiz_id']) && $_SESSION['question'] >= 30 )
	  		{
	  			?>
	  			<div class="container "> 
	    	   <div class="row dua_class">
	    	   		<div class="col-xs-12">
		    	   			
							    	<div class="comment">
							    		<h2><i>Thank you for the quiz.</i></h2>
							    	</div>
					</div>
					
	    	   	
	    	    </div>
	    	</div>
	    	<?php
	    		require_once('viewscore.php');
	    		exit();

	  		}

	  		// $correct = $_SESSION['correct'];
	  		// $unattemped = $_SESSION['correct'];
	  		// $correct = $_SESSION['correct'];
	  		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/confirmation.php';
  			// header('Location: ' . $home_url."?level=".$level);
  			header('Refresh: 3; URL='. $home_url."?level=".$level);
	  	}
	  	require_once('footer.php');
 ?>