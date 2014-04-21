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
		$message = 'Your account has been activated. Redirecting you to the login page now.';
		ob_start();
		header("Refresh:3; url=loginregister.php");
	} else {
		$message = 'Your account could not be activated. Please re-check the link or contact the system administrator.';
		ob_start();
		header("Refresh:3; url=index.php");
	}

	mysqli_close($dbc);

} else { // Redirect to the home page
	$url = BASE_URL . 'index.php'; 
	header("Location: $url");
	exit();
}

?>

<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Parts Supply</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet"/>
</head>
<body>
	<?php echo '<h3 align="center">'.$message.'</h3>'; ?>
</body>
</html>