<?php
session_start();

require('css/config.inc.php');
require (MYSQL);

$infoexists = false;
$q = "SELECT * FROM payment_information WHERE email='".$_SESSION['email']."'";
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

$paymentinfo = array();
if(mysqli_num_rows($r) > 0) {
	while($row = mysqli_fetch_array($r)) 
	{  	$paymentinfo[] = $row;  }
	$infoexists = true;
}
//trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
$selectedmonth = array();

function monthdropdown($index, $paymentinfo) {
	$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");

	for($i=0; $i<12; $i++) {
		$selected = "";
		if($months[$i] == $paymentinfo[$index]['expiration_month']) { $selected = "selected"; } 

		echo '<option value="'.$months[$i].'" '.$selected.'>'.$months[$i].'</option>';
	}
}

function yeardropdown($index, $paymentinfo) {
	for($i=2014; $i<2023; $i++) {
		$selected = "";
		if($i == $paymentinfo[$index]['expiration_year']) { $selected = "selected"; }

		echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
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
		<legend>Checkout</legend>
		<?php echo '<form id="paymentSelect" action="checkout.php" method="POST">'; ?>
		Saved Credit Cards: 
			<?php 
				echo '<input type="hidden" name="totalquantity" value="'.$_POST['totalquantity'].'">';
				echo '<input type="hidden" name="subtotal" value="'.$_POST['subtotal'].'">';
				echo '<select name="cardChoice" onChange="submit();" >';
				echo '<option></option>';
					for($i=0; $i<sizeof($paymentinfo); $i++) {
						echo '<option value='.$i.'>Card Ending in '.substr($paymentinfo[$i]['card_number'], -4).'</option>';
					}
					if($i==0) { echo '<option disabled>No cards saved!</option>'; }
				echo '</select>';
			?>
		
		</form>
		<div class="row">
			<div class="col-md-8">
				<div class="well">
					<form class="form-horizontal" id="checkoutForm" action="commitorder.php" method="post" novalidate>
						<fieldset>
							<legend>Payment Information</legend>
							<div class="form-group">
								<label for="cardholderName" class="col-md-3 control-label">Cardholder Name:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="cardholderName" name="cardholderName" 
									<?php if(isset($_POST['cardChoice'])) { echo ' value="'.$paymentinfo[$_POST['cardChoice']]['name_on_card'].'"'; } ?> placeholder="Cardholder Name" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Credit Card Number:</label>
								<div class="col-md-9"> 
									<input type="text" class="form-control" id="cardNumber" name="cardNumber" 
									<?php if(isset($_POST['cardChoice'])) { echo ' value="'.$paymentinfo[$_POST['cardChoice']]['card_number'].'"'; } ?> placeholder="Card Number" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Expiration Date:</label>
								<div class="col-md-3">
									<select class="form-control" id="expirationMonth" name="expirationDate">
										<?php monthdropdown($_POST['cardChoice'], $paymentinfo); ?>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" id="expirationYear" name="expirationYear">
										<?php yeardropdown($_POST['cardChoice'], $paymentinfo); ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">CVV2:</label>
								<div class="col-md-2">
									<input type="number" min="0" max="999" class="form-control" id="securityCode" name="securityCode" 
									<?php if(isset($_POST['cardChoice'])) { echo ' value="'.$paymentinfo[$_POST['cardChoice']]['security_code'].'"'; } ?> data-toggle="tooltip" 
									data-placement="bottom" title="Your credit card's 3 digit security code" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<input type="checkbox" value="checked" name="checkoutSave"> Keep this card in the system for future purchases.</input>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-9 col-md-offset-3">
									<button type="submit" name="checkoutSubmit" class="btn btn-primary">Complete Order</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="col-md-4">
				<div class="well">
					<legend>Receipt</legend>
					<dl class="dl-horizontal" id="receiptList">
						<dt>Number of Items:</dt>
						<dd><?php echo $_POST['totalquantity']; ?></dd>
						<dt>Subtotal:</dt>
						<dd><?php echo number_format($_POST['subtotal'], 2); ?></dd>
						<dt>Sales Tax (6%):</dt>
						<dd><?php $salestax = ($_POST['subtotal']*0.06); echo number_format($salestax, 2); ?></dd>
						<dt>Total:</dt>
						<dd><strong><?php $total = ($_POST['subtotal'] + ($_POST['subtotal']*0.06)); echo number_format($total, 2); ?></strong></dd>
					</dl>
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
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/checkout.js"></script>
	<script>
		$(function () {
			$('#securityCode').tooltip();
		});
	</script>
</body>
</html>
