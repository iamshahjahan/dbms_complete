<?php
	require_once('header1.php');
	require_once('checklogin.php');
  	if ( isset($_GET['level']))
  	{
  		$level = $_GET['level'];

	  	if ( $level == 'O')
	  	{
	  		if(!isset($_SESSION['correct']))
  			{
  				$_SESSION['correct'] = 0 ;
  			}
  			if(!isset($_SESSION['question']))
  			{
  				$_SESSION['question'] = 1 ;
  			}
  			if(!isset($_SESSION['unattempted']))
  			{
  				$_SESSION['unattempted'] = 0 ;
  			}


	  	}
  	}		
  
  	else
  	{
  		$level = 'E';
  	}

  	  	//connecting to Data Base
	  	require_once('connectvars.php');
	  	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	  	
  			if(!isset($_SESSION['correct']))
  			{
  				$_SESSION['correct'] = 0 ;
  			}
  			if(!isset($_SESSION['question']))
  			{
  				$_SESSION['question'] = 1 ;
  			}
  			if(!isset($_SESSION['unattempted']))
  			{
  				$_SESSION['unattempted'] = 0 ;
  			}
		

		$user_id = $_SESSION['user_id'];
	    // $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	    //Taking a random value from the list of question
	    $id_list = array();
	    // echo $user_id;
	    // echo $level;
	    $result = mysqli_query($dbc,"select * from question where lvl = '$level' and user_id != '$user_id' and qid not in ( select qid from user_question where user_id = '$user_id' )");
	    while ( ($row = @mysqli_fetch_array($result)) )
	    {
	    	if ( $row['user_id'] != $user_id)
	    	array_push($id_list,$row['qid']);
	    }
	    // print_r($id_list);
	    //Whether user viewed all the questions
	    if ( empty($id_list))
	    {
	    	
	    	
	    	?>
	    	<div class="container "> 
	    	   <div class="row dua_class">
	    	   		<div class="col-xs-12">
		    	   			
							    	<div class="comment">
							    		<h2><i>Thanks for giving your time for Islamic quiz. we are more than happy.
							    		We donot have that much questions. 
							    	</div>
					</div>
					
	    	   	
	    	    </div>
	    	</div>
        <?php
        	require_once('viewscore.php');
        	require_once('footer.php');
        	exit();
	    	
	    }
	    // Taking a random value after shuffling it

	    shuffle($id_list);
	    $select = $id_list[array_rand($id_list)];

	    
	    // echo $select;
	    $result = mysqli_query($dbc,"select * from question where qid='$select'")
	    or die("Error in selection");

	    // Sho
	    $row = mysqli_fetch_array($result);
?>
	        <!-- <!DOCTYPE html>
	        <html>
		        <head>
		            <title> Islamic Quiz</title>

		        </head>
		        <body> -->
		        	<div class="container question tpad">
		        		<div class="row">
		        			<div class="col-xs-10 col-xs-offset-1 sawal">
		        				<h1> Q <?php  echo $_SESSION['question'].'. '.$row['sawal'];?></h1>
		        			</div>
		        		 </div>

		        	 
		        
		            
		        		<div class="row fpad">
		        			<div class="col-xs-6"> 
			               		<form  method = "POST" id="register" action="answer.php">
				               		<div class="col-xs-8  box  "> 
					                    <input type="radio"  name=" answer" id="A" value="A" >A. <?php echo $row['a']; ?><br>
					                </div>
					                <br>
					                <div class="col-xs-8  box ">
					                    <input type="radio"  name=" answer" id="B" value="B" >B. <?php echo $row['b']; ?><br>
					                </div> 
					            	<div class="fpad"></div>
					            	<div class="clearfix"> </div>
					                <div class="col-xs-8  box ">
					                   <input type="radio"  name=" answer" id="C" value="C" >C. <?php echo $row['c']; ?><br>
					                </div>
					                <div class="col-xs-8  box ">
					                    <input type="radio"  name=" answer" id="D" value="D" >D. <?php echo $row['d']; ?><br>
					                </div>

					                    <input type="hidden" name = "qid" value="<?php echo $row['qid'] ?>"/>
					            
					                    <input type="hidden" name = "level" value="<?php  echo $level ?>"/>
					                    <input type="hidden" name = "select" value="<?php  echo $select ?>"/>

					                <div class="col-xs-8  fpad">
					                    <input class="btn-success btn-xlarge" type="submit" name="submit" value="ANSWER"/></button>
					                </div>
					            </form>
					        </div>
					        <?php
					        	if( $level == 'O')
					        	{
					        		$_SESSION['qid'] = $row['qid'];
					        ?>
					        		<div class="col-xs-6"> 
					                 <?php require_once('timer.php') ?>
					            </div>
					        <?php
					        	}
					        ?>
					        <div class="col-xs-4">
					        	<div class="col-xs-6 fpad "> 
					                   <button class="btn-lg btn-success"> <p> Correct : <?php  echo $_SESSION['correct'];?></p></button>
					            </div>
					           <div class="col-xs-6 fpad"> 
					                   <button class="btn-lg btn-primary"> <p> Question :  <?php  echo $_SESSION['question'] - 1;?></p></button>
					            </div>
					           <!-- <div class="col-xs-8 fpad"> 
					                  <button class="btn-lg btn-default"><p> unattempted: <?php  echo $_SESSION['unattempted'];?></p></button>
					            </div> -->
					            <div class="col-xs-8 fpad"> 
					                  <a href="viewscore.php"><button class="btn-lg btn-default"><p> View Your Score</p></button></a>
					            </div>
					            <div class="col-xs-8 fpad"> 
					                  <a href="index.php"><button class="btn-lg btn-danger" > Exit </button></a>
					            </div>
					          	
					            

					         </div>

					         </div>


		                </div>
		  			
					<?php require_once('footer.php'); ?>
		       <!--  </body>
	    </html>
 -->