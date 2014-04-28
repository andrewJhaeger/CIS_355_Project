<?php
session_start();

require('css/config.inc.php');
$page_title = 'Register';
//include ('includes/header.html');

$submit = false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['loginSubmit']))
	{
		require (MYSQL);
		$errors = array();
		// Validate the email address:
		if (!empty($_POST['loginEmail'])) {
			$email = mysqli_real_escape_string ($dbc, $_POST['loginEmail']);
		} else {
			$email = FALSE;
			$errors[] = 'You forgot to enter your email address!';
		}

		// Validate the password:
		if (!empty($_POST['loginPassword'])) {
			$pass = mysqli_real_escape_string ($dbc, $_POST['loginPassword']);
		} else {
			$pass = FALSE;
			$errors[] = 'You forgot to enter your password!';
		}

		if ($email && $pass) { // If everything's OK.
			$correctpass = true;

			// Query the database:
			$q = "SELECT id, firstName, lastName, email FROM user WHERE (email='$email' AND password=SHA1('$pass')) 
				  AND active IS NULL";		
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			if (@mysqli_num_rows($r) == 1) { // A match was made.

				// Register the values:
				$_SESSION = mysqli_fetch_array ($r, MYSQLI_ASSOC); 

				$cq = "SELECT * FROM shopping_cart WHERE email='".$_SESSION['email']."'";
				$cr = mysqli_query ($dbc, $cq) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
				$_SESSION["shopping_cart_count"] = mysqli_num_rows($cr);	

				mysqli_free_result($r);
				mysqli_free_result($cr);
				mysqli_close($dbc);			
				// Redirect the user:
				$url = 'index.php'; // Define the URL.

				header("Location: $url");
				exit(); // Quit the script.

			} else { // No match was made.
				$errors[] = 'Either the email address and password entered do not match those on file or you have not yet activated your account.';
				$correctpass = false;
			}

		}

		if(!($email && $pass) || !$correctpass) { // If everything wasn't OK.
			echo '<div class="container body-content"><div class="col-md-12"><div class="well">
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
			echo '</div></div></div>';
		}

		mysqli_close($dbc);

	} elseif(isset($_POST['registerSubmit'])) {

		require(MYSQL);

		$trimmed = array_map('trim', $_POST);

		$fn = $ln = $email = $pass = $midInit = $sStreet = $sCity = $sState = FALSE;
		$sZip = $bStreet = $bCity = $bState = $bZip = FALSE;


		$errors = array(); // Initialize error array

	    if (preg_match ('/^[A-Z \'.-]{2,20}$/i', $trimmed['firstName'])) {
			$fn = mysqli_real_escape_string ($dbc, $trimmed['firstName']);
		} else {
			$errors[] = 'Please enter your first name';
		}

		if (preg_match ('/^[A-Z \'.-]{2,40}$/i', $trimmed['lastName'])) {
			$ln = mysqli_real_escape_string($dbc, $trimmed['lastName']);
		} else {
			$errors[] = 'Please enter your last name';
		}

		if(filter_var($trimmed['registerEmail'], FILTER_VALIDATE_EMAIL)) {
			$email = mysqli_real_escape_string($dbc, $trimmed['registerEmail']);
		} else {
			$errors[] = 'Please enter a valid email address';
		}

		if (preg_match ('/^\w{4,20}$/', $trimmed['registerPassword']) ) {
			if ($trimmed['registerPassword'] == $trimmed['registerConfirmPassword']) {
				$pass = mysqli_real_escape_string ($dbc, $trimmed['registerPassword']);
			} else {
				$errors[] = 'Your password did not match the confirmation password';
			}	
		} else {
			$errors[] = 'Please enter a valid password';
		}

		if(preg_match('/^[A-Z]$/i', $trimmed['middleInitial'])){
            $midInit = mysqli_real_escape_string($dbc, $trimmed['middleInitial']);
        } else {
        	$errors[] = 'Please enter your middle initial';
        }

	//////////////////////////////////////////////// VALIDATE THESE
		//$sStreet = $trimmed['shippingStreet'];
		//$sCity = $trimmed['shippingCity'];
		//$sState = $trimmed['shippingState'];
		//$sZip = $trimmed['shippingZip'];

		if(preg_match("/^[0-9]{1,5} +[a-zA-Z ]{2,95}$/i", $trimmed['shippingStreet'])) {
        	$sStreet = mysqli_real_escape_string($dbc, $trimmed['shippingStreet']);
        } else {
        	$errors[] = 'Please enter a valid shipping street address';
        }
		
		if(preg_match("/^[a-zA-Z ]{2,50}$/i", $trimmed['shippingCity'])) {
		// if(isset($trimmed['shippingCity'])) {
			$sCity = mysqli_real_escape_string($dbc, $trimmed['shippingCity']);
		} else {
			$errors[] = 'Please enter a valid shipping city';
		}

		if(!empty($trimmed['shippingState'])) {
			$sState = mysqli_real_escape_string($dbc, $trimmed['shippingState']);
		} else {
			$errors[] = 'Please choose your shipping state';
		}
		
	    if(preg_match("/^[0-9]{5}$/i", $trimmed['shippingZip'])) {
	    	$sZip = mysqli_real_escape_string($dbc, $trimmed['shippingZip']);
	    } else {
	    	$errors[] = 'Please enter your 5 digit shipping zip code';
	    }

		//if(($trimmed['billingStreet'] == "") && ($trimmed['billingCity'] == "") && ($trimmed['billingZip'] == "")) {
		if(empty($trimmed['billingStreet']) && empty($trimmed['billingCity']) && empty($trimmed['billingZip'])) {
			$bStreet = $sStreet;
			$bCity = $sCity;
			$bState = $sState;
			$bZip = $sZip;
		} else {
			// $bStreet = $trimmed['billingStreet'];
			// $bCity = $trimmed['billingCity'];
			// $bState = $trimmed['shippingState'];
			// $bZip = $trimmed['billingZip'];

			if(preg_match("/^[0-9]{1,5} +[a-zA-Z ]{2,95}$/i", $trimmed['billingStreet'])) {
	        	$bStreet = mysqli_real_escape_string($dbc, $trimmed['billingStreet']);
	        } else {
	        	$errors[] = 'Please enter a valid billing street address';
	        }
			
			if(preg_match("/^[a-zA-Z ]{2,50}$/i", $trimmed['billingCity'])) {
			// if(isset($trimmed['shippingCity'])) {
				$bCity = mysqli_real_escape_string($dbc, $trimmed['billingCity']);
			} else {
				$errors[] = 'Please enter a valid billing city';
			}

			if(!empty($trimmed['billingState'])) {
				$bState = mysqli_real_escape_string($dbc, $trimmed['billingState']);
			} else {
				$errors[] = 'Please choose your billing state';
			}
			
		    if(preg_match("/^[0-9]{5}$/i", $trimmed['billingZip'])) {
		    	$bZip = mysqli_real_escape_string($dbc, $trimmed['billingZip']);
		    } else {
		    	$errors[] = 'Please enter your 5 digit billing zip code';
		    }
		}

	//////////////////////////////////////////////// VALIDATE THESE

		$missinginfo = false;
		$alreadyexists = false;




		//if($fn && $midInit && $ln && $email && $pass && $sStreet && $sCity && $sState &&
		//	$sZip && $bStreet && $bCity && $bState && $bZip) 
		if(empty($errors)) 
		{
			$q = "SELECT id FROM user WHERE email='$email'";
			$r = mysqli_query($dbc, $q) or trigger_error("Query $q\n<br />MySQL Error: " .
				 mysqli_error($dbc));

			if (mysqli_num_rows($r) == 0) {
				$a = md5(uniqid(rand(), true));
				$q = "INSERT INTO user (firstName, middleInitial, lastName, email, password, active, 
										 shipStreetAddress, shipCity, shipState, shipZipCode,
										 billStreetAddress, billCity, billState, billZipCode)  
					  VALUES ('$fn', '$midInit', '$ln', '$email', SHA1('$pass'), '$a',
					  		  '$sStreet', '$sCity', '$sState', '$sZip', '$bStreet', 
					  		  '$bCity', '$bState', '$bZip')";
				$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " .  
					 mysqli_error($dbc));

			    if (mysqli_affected_rows($dbc) == 1) {
			    	$submit = true;
			    	$validemail = true;

					$body = "Thank you for registering. To activate your account, please click on this link:\n\n";
					$body .= BASE_URL . 'activate.php?em=' . urlencode($email) . "&ac=$a";

					if(	!mail($trimmed['registerEmail'], 'Registration Confirmation', $body, 'From: admin@computerpartssupply.us') ) {
						$validemail = false;
					}

					if($validemail == true) {
						ob_start();
						header("Refresh:3; url=index.php");
					}

				} else {
					$errors[] = 'You could not be registered due to a system error.
						  We apologize for any inconvenience.';
				}

			} else {
				$errors[] = 'That email address has already been registered. If you
				      have forgotten your password, please use the forgotten password link to 
				      have it sent to you.';
			}

		} 
		if(count($errors) > 0) {
			echo '<div class="container body-content"><div class="col-md-12"><div class="well">
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo " - $msg<br />\n";
			}
			echo '</div></div></div>';
		}

		mysqli_close($dbc);	
	}
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
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Computer Parts Supply</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
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
					<li><a href="questions.php">Q&amp;A</a></li>
                </ul>				<ul class="nav navbar-nav navbar-right">
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
		<?php 
				if($submit==true) { 
					if($validemail == true) {
						echo '<h3 align="center">We have sent you an email. Please click the activiation link 
						in the email to activate your account.</h3>'; 
					} else {
						echo '<h3 align="center">We were unable to send an email to that account. Please try again.</h3>';
					}
				}
		?>
		<div class="row">
			<div class="col-md-6">
				<div class="well">
					<form class="form-horizontal" id="loginForm" action="loginregister.php" method="post" novalidate>
						<fieldset>
							<legend>Login</legend>
							<div class="form-group">
								<label for="loginEmail" class="col-md-2 control-label">Email</label>
								<div class="col-md-10">
									<input type="email" <?php if(isset($_POST['loginEmail'])) { echo ' value="'.$_POST['loginEmail'].'" '; } ?> class="form-control" name="loginEmail" id="loginEmail" placeholder="Email" />
								</div>
							</div>
							<div class="form-group">
								<label for="loginPassword" class="col-md-2 control-label">Password</label>
								<div class="col-md-10">
									<input type="password" <?php if(isset($_POST['loginPassword'])) { echo ' value="'.$_POST['loginPassword'].'" '; } ?> class="form-control" name="loginPassword" id="loginPassword" placeholder="Password" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-10 col-md-offset-2">
									<button type="submit" name="loginSubmit" class="btn btn-primary">Submit</button>
								</div>
							</div>
							<p><a href="resetpassword.php">Forgot your password?</a></p>
							<p><a href="changepassword.php">Change Password</a></p>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="well">
					<form class="form-horizontal" id="registerForm" action="loginregister.php" method="post">
						<fieldset>
							<legend>Register</legend>
							<div class="form-group">
								<label class="col-md-3 control-label">Name</label>
								<div class="col-md-3">
									<input type="text" <?php if(isset($_POST['firstName'])) { echo ' value="'.$_POST['firstName'].'" '; } ?> class="form-control" name="firstName" id="firstName" placeholder="First" />
								</div>
								<div class="col-md-2">
									<input type="text" <?php if(isset($_POST['middleInitial'])) { echo ' value="'.$_POST['middleInitial'].'" '; } ?> class="form-control" name="middleInitial" id="middleInitial" placeholder="MI" />
								</div>
								<div class="col-md-4">
									<input type="text" <?php if(isset($_POST['lastName'])) { echo ' value="'.$_POST['lastName'].'" '; } ?> class="form-control" name="lastName" id="lastName" placeholder="Last" />
								</div>
							</div>
							<div class="form-group">
								<label for="registerEmail" class="col-md-3 control-label">Email</label>
								<div class="col-md-9">
									<input type="email" <?php if(isset($_POST['registerEmail'])) { echo ' value="'.$_POST['registerEmail'].'" '; } ?> class="form-control" name="registerEmail" id="registerEmail" placeholder="Email" />
								</div>
							</div>
							<div class="form-group">
								<label for="registerPassword" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" <?php if(isset($_POST['registerPassword'])) { echo ' value="'.$_POST['registerPassword'].'" '; } ?> class="form-control" name="registerPassword" id="registerPassword" placeholder="Password" />
								</div>
							</div>
							<div class="form-group">
								<label for="registerConfirmPassword" class="col-md-3 control-label">Confirm Password</label>
								<div class="col-md-9">
									<input type="password" <?php if(isset($_POST['registerConfirmPassword'])) { echo ' value="'.$_POST['registerConfirmPassword'].'" '; } ?> class="form-control" name="registerConfirmPassword" id="registerConfirmPassword" placeholder="Confirm Password" />
								</div>
							</div>
							<div class="form-group">
								<label for="homePhone" class="col-md-3 control-label">Home Phone</label>
								<div class="col-md-9">
									<input type="text" <?php if(isset($_POST['homePhone'])) { echo ' value="'.$_POST['homePhone'].'" '; } ?> class="form-control" name="homePhone" id="homePhone" placeholder="Home Phone" />
								</div>
							</div>
							<div class="form-group">
								<label for="cellPhone" class="col-md-3 control-label">Cell Phone</label>
								<div class="col-md-9">
									<input type="text" <?php if(isset($_POST['cellPhone'])) { echo ' value="'.$_POST['cellPhone'].'" '; } ?> class="form-control" name="cellPhone" id="cellPhone" placeholder="Cell Phone" />
								</div>
							</div>
							<div id="shippingAddressForm">
								<div class="form-group">
									<label class="col-md-3 control-label">Shipping Address</label>
									<div class="col-md-9">
										<input type="text" <?php if(isset($_POST['shippingStreet'])) { echo ' value="'.$_POST['shippingStreet'].'" '; } ?> class="form-control" name="shippingStreet" id="shippingStreet" placeholder="Street Address" />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-3 col-md-offset-3">
										<input type="text" <?php if(isset($_POST['shippingCity'])) { echo ' value="'.$_POST['shippingCity'].'" '; } ?> class="form-control" name="shippingCity" id="shippingCity" placeholder="City" />
									</div>
									<div class="col-md-3">
										<select class="form-control" name="shippingState" id="shippingState" placeholder="State"> 
											<option value=""></option><option value="AK">AK</option><option value="AL">AL</option><option value="AR">AR</option><option value="AZ">AZ</option><option value="CA">CA</option><option value="CO">CO</option><option value="CT">CT</option><option value="DC">DC</option><option value="DE">DE</option><option value="FL">FL</option><option value="GA">GA</option><option value="HI">HI</option><option value="IA">IA</option><option value="ID">ID</option><option value="IL">IL</option><option value="IN">IN</option><option value="KS">KS</option><option value="KY">KY</option><option value="LA">LA</option><option value="MA">MA</option><option value="MD">MD</option><option value="ME">ME</option><option value="MI">MI</option><option value="MN">MN</option><option value="MO">MO</option><option value="MS">MS</option><option value="MT">MT</option><option value="NC">NC</option><option value="ND">ND</option><option value="NE">NE</option><option value="NH">NH</option><option value="NJ">NJ</option><option value="NM">NM</option><option value="NV">NV</option><option value="NY">NY</option><option value="OH">OH</option><option value="OK">OK</option><option value="OR">OR</option><option value="PA">PA</option><option value="RI">RI</option><option value="SC">SC</option><option value="SD">SD</option><option value="TN">TN</option><option value="TX">TX</option><option value="UT">UT</option><option value="VA">VA</option><option value="VT">VT</option><option value="WA">WA</option><option value="WI">WI</option><option value="WV">WV</option><option value="WY">WY</option>
										</select>
									</div>
									<div class="col-md-3">
										<input type="number" <?php if(isset($_POST['shippingZip'])) { echo ' value="'.$_POST['shippingZip'].'" '; } ?> class="form-control" name="shippingZip" id="shippingZip" placeholder="ZIP" />
									</div>
								</div>
							</div>
							<span class="col-md-offset-3" id="addBillingSpan"><button type="button" id="addBillingAddress" class="btn btn-info btn-xs">Add a separate billing address</button> (If different than shipping address)</span>
							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" name="registerSubmit" class="btn btn-primary">Submit</button>
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
	<script src="scripts/loginregister.js"></script>
</body>
</html>