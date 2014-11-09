<?php
				@session_start();
				$_SESSION['unattempted']+=1;
		    	$_SESSION['question']+=1;

	  			// echo 'after unattemped: '.$_SESSION['unattempted'];
	  			// echo '<a href="confirmation.php"> Click here </a>';
				require_once('connectvars.php');
				$user_id = $_SESSION['user_id'];
				$select = $_SESSION['qid'];
				if (isset($_SESSION['quiz_id']))
		  		{
		  			$quiz_id = $_SESSION['quiz_id'];
		  		}
				$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	  			// echo 'Your answer is empty';
	  			// exit();
	  			mysqli_query($dbc,"insert into user_question ( qid,user_id,answer_key,quiz_id) values ( '$select','$user_id',2,'$quiz_id')")
		    	or die ("Error in updating values in user_question");
		    	// require_once('header1.php');
		    	require_once('unattempted.php');
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
		    	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/confirmation.php';
		    	$level = 'O';
	  			// header('Location: ' . $home_url."?level=".$level);
	  			header('Refresh: 3; URL='. $home_url."?level=".$level);
?>