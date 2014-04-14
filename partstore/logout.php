<?php
session_start();

// This is the logout page for the site.
require('css/config.inc.php');
$page_title = 'Logout';

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['firstName'])) {

	$url = BASE_URL . 'htdocs/index.html'; // Define the URL.
	ob_end_clean(); // Delete the buffer.
	header("Location: $url");
	exit(); // Quit the script.
	
} else { // Log out the user.

	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-3600); // Destroy the cookie.

}

// Print a customized message:
echo 'You are now logged out.';

?>