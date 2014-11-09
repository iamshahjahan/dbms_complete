<?php
	$level = $_GET['level'];
	

	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/playquiz.php';
  			header('Location: ' . $home_url."?level=".$level);
 ?>