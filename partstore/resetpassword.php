<?php 
session_start();

require('css/config.inc.php');
$page_title = 'Forgot Your Password';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require (MYSQL);

	$id = FALSE;
	$errors = array();

	// If an email address was entered
	if (!empty($_POST['email'])) {

		// See if the email address exists in the database
		$q = 'SELECT id FROM user WHERE email="'.  mysqli_real_escape_string ($dbc, $_POST['email']) . '"';
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		
		if (mysqli_num_rows($r) == 1) { 
			list($id) = mysqli_fetch_array ($r, MYSQLI_NUM); 
		} else { 
			$errors[] = 'That email address is not related to any accounts.';
		}
		
	} else { // If no email address was entered
		$errors[] = 'You forgot to enter your email address.';
	} 
	
	if ($id) { // If an id was found in the database
		$passwordchanged = false;
		// Create a random password
		$newpass = substr(md5(uniqid(rand(), true)), 3, 10);

		// Update the database with the new password
		$q = "UPDATE user SET password='".SHA1($newpass)."' WHERE id=".$id." LIMIT 1";
		$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		if (mysqli_affected_rows($dbc) == 1) {
		
			// Send an email:
			$body = "Your password changed to '$newpass'. Please log in using this password. You may then 
					 change your password if you would like to.";
			mail ($_POST['email'], 'Your new password.', $body, 'From: admin@sitename.com');
			
			$passwordchanged = true;
			mysqli_close($dbc); 
			
		} else { 
			$nochange = true;
			$errors[] = 'Your password could not be changed due to a system error. We apologize for any inconvenience.'; 
		}

	} 
	if(!$id || $nochange) { 
		echo '<div class="container body-content"><div class="col-md-12"><div class="well">
			  <p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</div></div></div>';	
	}

	mysqli_close($dbc);

} // End of the main Submit conditional.
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
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Computer Parts Supply</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Parts <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="browseitems.php?page=1&category=all">Browse all parts</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Internal Components</li>
							<li><a href="browseitems.php?page=1&category=processors">Processors</a></li>
							<li><a href="browseitems.php?page=1&category=motherboards">Motherboards</a></li>
							<li><a href="browseitems.php?page=1&category=memory">Memory</a></li>
							<li><a href="browseitems.php?page=1&category=hard_drives">Hard Drives</a></li>
							<li><a href="browseitems.php?page=1&category=ssds">SSDs</a></li>
							<li><a href="browseitems.php?page=1&category=video_cards">Video Cards</a></li>
							<li><a href="browseitems.php?page=1&category=disk_drives">Disk Drives</a></li>
							<li><a href="browseitems.php?page=1&category=cases">Cases</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Peripherals</li>
							<li><a href="browseitems.php?page=1&category=monitors">Monitors</a></li>
							<li><a href="browseitems.php?page=1&category=keyboards">Keyboards</a></li>
							<li><a href="browseitems.php?page=1&category=audio_devices">Audio Devices</a></li>
							<li><a href="browseitems.php?page=1&category=external_storage">External Storage</a></li>
							<li><a href="browseitems.php?page=1&category=printers">Printers</a></li>
						</ul>
					</li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
					 if(isset($_SESSION['firstName'])) { 
					       echo '<li class="userHeader">' . 'Logged in as ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
					  }
					  echo '</li><li>';
					  if(isset($_SESSION['firstName'])) {
					      echo '<a href="logout.php">Log Out</a>';
					  } else {
					      echo '<a href="loginregister.php">Login/Register</a>';
					  }
					  echo '</li>';
					
					if(isset($_SESSION['firstName'])) {
						echo '<li><a href="cart.php">Cart &nbsp;<span class="badge">'. $_SESSION['shopping_cart_count'] .'</span></a></li>';
					}
				
					?>
				</ul>
            </div>
        </div>
    </div>
    
	<div class="container body-content">
		<?php if($passwordchanged == true) { echo '<h3 align="center">Your password has been reset. Your temporary password has been emailed to you.</h3>'; } ?>
		<div class="row">
			<div class="col-md-6">
				<div class="well">
					<form class="form-horizontal" id="resetForm" action="resetpassword.php" method="post" novalidate>
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
			<p>&copy; 2014 - Computer Parts Supply</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/jquery.validate.min.js"></script>
	<script src="scripts/additional-methods.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/resetpassword.js"></script>
</body>
</html>