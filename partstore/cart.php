<?php
session_start();

require('css/config.inc.php');
require (MYSQL);

if(isset($_GET['upc'])) {
	$q = "INSERT INTO shopping_cart (email, upc, quantity) VALUES ('".$_SESSION['email']."',".$_GET['upc'].",".$_POST['quantity'].")";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
}

$q = "SELECT upc, quantity FROM shopping_cart WHERE email='".$_SESSION['email']."'";
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

//$c = @mysqli_num_rows($r);

$upcs = array();
//$upcs = mysqli_fetch_array($r);
	while($row = mysqli_fetch_array($r)) 
	{  	$upcs[] = $row;  }

if(isset($_POST['update'])) {
	for($i=0; $i<(sizeof($upcs)); $i++) {
		if($_POST[$i] <> $upcs[$i][1]) {
			$q = "UPDATE shopping_cart SET quantity=".$_POST[$i]." WHERE upc=".$upcs[$i][0];
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
		}
	}	

	$q = "SELECT upc, quantity FROM shopping_cart WHERE email='".$_SESSION['email']."'";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	$upcs = array();
	
	while($row = mysqli_fetch_array($r)) 
	{  	$upcs[] = $row;  }
}

function showcartitems($upcs, $tablenames, $dbc, &$carttotal) {
	$carttotal = 0;
	for($i=0; $i<(sizeof($upcs)); $i++) { // as &$value) {   (count($upcs)-1)
		foreach($tablenames as &$table) {
			$q = 'SELECT upc, manufacturer, model_number, product_name, price, rating FROM '.$table.' WHERE upc = '.$upcs[$i][0];
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
			if(@mysqli_num_rows($r) == 1) {
				break 1;	
			}
		}
		$curritem = mysqli_fetch_array($r);
	echo '<tr>';
	echo '<td><img src="images/products/'.$curritem['upc'].'.jpg" class="productImage" /></td>';
	echo '<td>';
	echo '<a href="product.php?category='.str_replace("_specs", "", $table).'&upc='.$curritem['upc'].'">'.$curritem['product_name'].'</a><br />';
	echo '<dl class="dl-horizontal"><dt>Manufacturer</dt>
									<dd>'.$curritem['manufacturer'].'</dd>
									<dt>Model #:</dt>
									<dd>'.$curritem['model_number'].'</dd>
									<dt>Rating (out of 5):</dt>
									<dd>'.$curritem['rating'].'</dd>
								</dl></td>
						<td class="cartPrice">'.number_format($curritem['price'], 2).'</td>
						<td><input type="number" class="quantityInput" name="'.$i.'" value="'.$upcs[$i][1].'" /></td>
					</tr>';
	$carttotal += ($curritem['price'] * $upcs[$i][1]);
	}
}
//trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
mysqli_free_result($r);
//mysqli_close($dbc);

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
					       echo '<li class="userHeader">' . 'Logged in as ' . $_SESSION['firstName'];
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
		<legend>Shopping Cart</legend>
		<div class="row">
			<form id="cartForm" action="checkout.php" method="post">
				<table class="table table-bordered productTable" id="cartTable">
					<tr><th colspan="2">Product</th><th>Price</th><th>Quantity</th></tr>
<?php
showcartitems($upcs, $tablenames, $dbc, $carttotal);
?>
					<tr>
						<th colspan="2" style="text-align:right">Total:</th>
						<th><?php echo number_format($carttotal, 2); ?></th>
						<td></td>
					</tr>
				</table>
				<div style="text-align:right">
					<button type="submit" name="update" formaction="cart.php" class="btn btn-primary">Update Quantities</button> <!--formaction="cart.php"-->
					<button type="submit" class="btn btn-success">Checkout</button>
				</div>
			</form>
		</div>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
</body>
</html>
