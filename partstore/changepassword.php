<?php
session_start();

require('css/config.inc.php');
$page_title = 'Change Your Password';

// If no user is logged in, redirect to the home page.
if (!isset($_SESSION['firstName'])) {
	
	$url = BASE_URL . 'index.php'; 
	header("Location: $url");
	exit(); 
	
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);
			
	// See if the two password fields match
	$pass = FALSE;
	if (preg_match ('/^(\w){4,20}$/', $_POST['newPassword']) ) {
		if ($_POST['newPassword'] == $_POST['confirmPasswords']) {
			$pass = mysqli_real_escape_string ($dbc, $_POST['newPassword']);
		} else {
			echo '<p class="error">Your password did not match the confirmed password!</p>';
		}
	} else {
		echo '<p class="error">Please enter a valid password!</p>';
	}
	
	if ($pass) {

		// Change the password in the database
		$q = "UPDATE user SET password=SHA1('$pass') WHERE id={$_SESSION['id']} LIMIT 1";	
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		if (mysqli_affected_rows($dbc) == 1) { // If a password was changed


			// Send an email?


			echo 'Your password has been changed.';
			mysqli_close($dbc); // Close the connection.
			exit();
			
		} else { // If no password was changed
		
			echo '<p class="error">Your password could not be changed. Make sure the new password is different than the current password.</p>'; 

		}

	} else { 
		echo '<p class="error">Please try again.</p>';		
	}
	
	mysqli_close($dbc); // Close the connection.

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
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Computer Parts Store</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Parts <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="browseparts.php">Browse all parts</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Internal Components</li>
							<li><a href="#">Processors</a></li>
							<li><a href="#">Motherboards</a></li>
							<li><a href="#">Memory</a></li>
							<li><a href="#">Hard Drives</a></li>
							<li><a href="#">SSDs</a></li>
							<li><a href="#">Video Cards</a></li>
							<li><a href="#">Disk Drives</a></li>
							<li><a href="#">Cases</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Peripherals</li>
							<li><a href="#">Monitors</a></li>
							<li><a href="#">Keyboards</a></li>
							<li><a href="#">Audio Devices</a></li>
							<li><a href="#">External Storage</a></li>
							<li><a href="#">Printers</a></li>
						</ul>
					</li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
					<?php 
					if(isset($_SESSION['firstName'])) { 
						echo '<font color="white">' . $_SESSION['firstName'] . '</font>';
					}
					echo '</li><li>';
					if(isset($_SESSION['firstName'])) {
						echo '<a href="logout.php">Log Out</a>';
					} else {
						echo '<a href="loginregister.php">Login/Register</a>';
					}
					echo '</li>';
					?>
					<li><a href="cart.php">Cart &nbsp;<span class="badge">4</span></a></li>
				</ul>
            </div>
        </div>
    </div>
    
	<div class="container body-content">
		<div class="row">
			<div class="col-md-6">
				<div class="well">
					<form class="form-horizontal" id="loginForm" action="changepassword.php" method="post" novalidate>
						<fieldset>
							<legend>Change Your Password</legend>
							<div class="form-group">
								<label for="newPassword" class="col-md-2 control-label">New Password</label>
								<div class="col-md-10">
									<input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="New Password" />
								</div>
							</div>
							<div class="form-group">
								<label for="confirmPassword" class="col-md-2 control-label">Confirm Password</label>
								<div class="col-md-10">
									<input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
		</div>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/jquery.validate.min.js"></script>
	<script src="scripts/additional-methods.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/loginregister.js"></script>
</body>
</html>