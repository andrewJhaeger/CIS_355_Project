<?php 

require('css/config.inc.php');
$page_title = 'Account Activation';

// If email and activation code are set and in the right format:
if (isset($_GET['em'], $_GET['ac']) && filter_var($_GET['em'], FILTER_VALIDATE_EMAIL) && (strlen($_GET['ac']) == 32 )) {

	// Update the database to reflect activation 
	require (MYSQL);
	$q = "UPDATE user SET active=NULL WHERE (email='" . mysqli_real_escape_string($dbc, $_GET['em']) . "' AND active='" . mysqli_real_escape_string($dbc, $_GET['ac']) . "') LIMIT 1";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	// If any records are changed, inform that the account is active
	if (mysqli_affected_rows($dbc) == 1) {
		echo "<h3>Your account has been activated. You're ready to log in.</h3>";
	} else {
		echo '<p class="error">Your account could not be activated. Please re-check the link or contact the system administrator.</p>';
	}

	mysqli_close($dbc);

} else { // Redirect to the home page

	$url = BASE_URL . 'index.php'; 
	header("Location: $url");
	exit();

}

?>