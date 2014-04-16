<?php 

require('css/config.inc.php');
$page_title = 'Forgot Your Password';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);

	$id = FALSE;

	// If an email address was entered
	if (!empty($_POST['email'])) {

		// See if the email address exists in the database
		$q = 'SELECT id FROM user WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 1) { 
			list($id) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { 
			echo '<p class="error">That email address is not related to any accounts.</p>';
		}
		
	} else { // If no email address was entered
		echo '<p class="error">You forgot to enter your email address!</p>';
	} 
	
	if ($id) { // If an id was found in the database

		// Create a random password
		$newpass = substr(md5(uniqid(rand(), true)), 3, 10);

		// Update the database with the new password
		$q = "UPDATE user SET password=SHA1('$newpass') WHERE id=$id LIMIT 1";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		if (mysqli_affected_rows($dbc) == 1) {
		
			// Send an email:
			$body = "Your password changed to '$newpass'. Please log in using this password. You may then 
					 change your password if you would like to.";
			mail ($_POST['email'], 'Your new password.', $body, 'From: admin@sitename.com');
			
			// Print a message and wrap up:
			echo 'Your password has been changed. You will receive an email containing a temporary password. Please
				  log in using this password. You may then chenge it if you would like to.';
			mysqli_close($dbc);
			
			exit(); 
			
		} else { 
			echo '<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
		}

	} else { 
		echo '<p class="error">Please try again.</p>';
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
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
                    <li><a href="questions.php">Q&amp;A</a></li>
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
					<form class="form-horizontal" id="loginForm" action="resetpassword.php" method="post" novalidate>
						<fieldset>
							<legend>Reset Your Password</legend>
							<div class="form-group">
								<label for="email" class="col-md-2 control-label">Email</label>
								<div class="col-md-10">
									<input type="text" class="form-control" name="email" id="email" placeholder="Email Address" />
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
		</div>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/jquery.validate.min.js"></script>
	<script src="scripts/additional-methods.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/loginregister.js"></script>
</body>
</html>