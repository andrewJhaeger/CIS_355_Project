<?php
session_start();

// This is the logout page for the site.
require('css/config.inc.php');
$page_title = 'Logout';

$url = BASE_URL . 'index.php'; // Define the URL.

// If no first_name session variable exists, redirect the user:
if (!isset($_SESSION['firstName'])) {
	$message = 'You were not logged in. Redirecting you to the home page now.';
	ob_start();
	header("Refresh:3; url=$url");
} else { // Log out the user.
	$_SESSION = array(); // Destroy the variables.
	session_destroy(); // Destroy the session itself.
	setcookie (session_name(), '', time()-3600); // Destroy the cookie.
	
	$message = 'You have been succesfully logged out. Redirecting you to the home page now.';
	ob_start();
	header("Refresh:3; url=$url");
}
?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Parts Store</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
</head>
<body>
	<?php echo '<h3 align="center">'.$message.'</h3>'; ?>
</body>
</html>