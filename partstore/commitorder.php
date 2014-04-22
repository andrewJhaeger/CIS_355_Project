<?php
session_start();

require('css/config.inc.php');
require (MYSQL);

if($_POST['checkoutSave'] == "checked") {
	$q = "INSERT INTO payment_information (email, card_number, name_on_card, expiration_month,
		  expiration_year, security_code) VALUES ('".$_SESSION['email']."','".$_POST['cardNumber']."','".
		  $_POST['cardholderName']."','".$_POST['expirationDate']."','".$_POST['expirationYear']."','".
		  $_POST['securityCode']."')";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
} else {
	$q = "DELETE FROM payment_information WHERE email='".$_SESSION['email']."' AND card_number='".$_POST['cardNumber']."'";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
}

foreach($_SESSION['allitems'] as &$item) {
	//echo $item['upc']."\n";
	$q = "INSERT INTO current_orders (user_id, upc, price, quantity) VALUES ('".$_SESSION['id']."','".
		  $item['upc']."','".$item['price']."','".$item['quantity']."')";
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
}

$q = "DELETE FROM shopping_cart WHERE email='".$_SESSION['email']."'";
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
$_SESSION['shopping_cart_count'] = 0;

$message = '<h3 align="center">Your order has been submitted! An email confirmation will be sent to you!</h3>';

$headers = "From: admin@computerpartssupply.us\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$body = '<html>
			<head>
				<style>
					table,th,td
					{
						border:1px solid black;
						border-collapse:collapse;
					}
				</style>
			</head>
			<body>
				<center>
					<h1>Computer Parts Supply</h1>
					<h3>Receipt for '.$_SESSION['firstName'].' '.$_SESSION['lastName'].' on '.date("m/d/Y").'</h3>
				<br />
				<table cellpadding="10">
					<tr>
						<th>Item</th>
						<th>Manufacturer</th>
						<th>Model Number</th>
						<th>Price (per unit)</th>
						<th>Quantity Purchased</th>
						<th>Total</th>
					</tr>';
		$totalprice = 0;
		foreach($_SESSION['allitems'] as &$item) {
			$body .= '<tr>
						<td>'.$item['product_name'].'</td>
						<td>'.$item['manufacturer'].'</td>
						<td>'.$item['model_number'].'</td>
						<td>'.$item['price'].'</td>
						<td>'.$item['quantity'].'</td>
						<td>'.($item['price']*$item['quantity']).'</td>
					</tr>';
				$totalprice += ($item['price']*$item['quantity']);
		}
			$body .= '<tr><td></td><td></td><td></td><td></td><td></td><td><b>'.$totalprice.'</b></td></tr>
				</table>
				<br />
						<h3>Subtotal: $'.number_format($totalprice, 2).'</h3>
						<h3>Sales Tax: $'.number_format(($totalprice*0.06), 2).'</h3>
						<h3>Grand Total: $'.number_format(($totalprice + ($totalprice*0.06)), 2).'</h3>
				</center>
			</body>
		</html>';

mail($_SESSION['email'], 'Order Receipt', $body, $headers);

//trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

ob_start();
header("Refresh:3; url=index.php");

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