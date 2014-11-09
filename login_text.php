<?php
	if(!isset($_SESSION['username']))
	{
		// echo $_SESSION['username'];
		?>
		<h1> Islamic Quiz </h1>
           <p> The knowledge is obligatory on each and every muslim</p>
                  
           <p> <a href="signup.php" class="btn btn-success btn-large">Sign Up Today</a></p>
<?php
	}
	else
	{
		?>
		<h1> Islamic Quiz </h1>
           <p> The knowledge is obligatory on each and every muslim</p>
                  
           <p> <a href="choice.php" class="btn btn-success btn-large">Play Today</a></p>
<?php
	}
?>