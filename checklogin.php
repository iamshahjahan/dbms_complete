<?php 
	@session_start();
    if (!isset($_SESSION['user_id'])) {

    ?>

    <html>
    <head>
    	<title></title>
    	<link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
    	
    	<div >
    		<h3> As Salam Alaikum <h3> Want to play Islalmic Quiz. Please log in and dive in the world of Islamic Quiz.</h3>
    		<?php require_once('login.php');
            exit(); ?>


    	</div>
    	

    </body>
    </html>
    <?php
    exit();
  }
 
 ?>