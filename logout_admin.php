<?php
// If the user is logged in, delete the session vars to log them out
require_once('header_admin.php');

session_start();
if (isset($_SESSION['a_id'])) {
// Delete the session vars by clearing the $_SESSION array
$_SESSION = array();
// Delete the session cookie by setting its expiration to an hour ago (3600)
if (isset($_COOKIE[session_name()])) {
setcookie(session_name(), '', time() - 3600);
}
// Destroy the session
session_destroy();
}
// Delete the user ID and username cookies by setting their expirations to an hour ago (3600)
setcookie('a_id', '', time() - 3600);
setcookie('a_name', '', time() - 3600);
// Redirect to the home page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin.php';
header('Location: ' . $home_url);
?>