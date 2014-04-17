<!DOCTYPE html>
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
					<li><a href="loginregister.php">Login/Register</a></li>
					<li><a href="cart.php">Cart &nbsp;<span class="badge">4</span></a></li>
				</ul>
            </div>
        </div>
    </div>
    
	<div class="container body-content">
		<div class="row"><h3>Checkout</h3></div>
		<div class="row">
			<div class="col-md-8">
				<div class="well">
					<form class="form-horizontal" id="checkoutForm" target="submitCheckout.php" method="post" novalidate>
						<fieldset>
							<legend>Payment Information</legend>
							<div class="form-group">
								<label for="cardholderName" class="col-md-3 control-label">Cardholder Name:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="cardholderName" name="cardholderName" placeholder="Cardholder Name" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Credit Card Number:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Card Number" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">Expiration Date:</label>
								<div class="col-md-3">
									<select class="form-control" id="expirationMonth" name="expirationDate">
										<option value=""></option><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
									</select>
								</div>
								<div class="col-md-2">
									<select class="form-control" id="expirationYear" name="expirationYear">
										<option value=""></option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option>
									</select>
								</div>
								<label class="col-md-1 control-label">CVV2:</label>
								<div class="col-md-2">
									<input type="number" min="0" max="999" class="form-control" id="securityCode" name="securityCode" data-toggle="tooltip" data-placement="bottom" title="Your credit card's 3 digit security code" />
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
						<dd>3</dd>
						<dt>Subtotal:</dt>
						<dd>$579.97</dd>
						<dt>Sales Tax (6%):</dt>
						<dd>$34.80</dd>
						<dt>Total:</dt>
						<dd><strong>$614.77</strong></dd>
					</dl>
				</div>
			</div>
		</div>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script>
		$(function () {
			$('#securityCode').tooltip();
		});
	</script>
</body>
</html>
