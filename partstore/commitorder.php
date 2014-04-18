<?php
session_start();

require('css/config.inc.php');
require (MYSQL);

if($_POST['checkoutSave'] = "checked") {
	$q = "INSERT INTO payment_information (email, card_number, name_on_card, expiration_month,
		  expiration_year, security_code) VALUES ('".$_SESSION['email']."','".$_POST['cardNumber']."','".
		  $_POST['cardholderName']."','".$_POST['expirationDate']."','".$_POST['expirationYear']."','".
		  $_POST['securityCode']."')";
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

$body = "Thank you for your order!";
mail($_SESSION['email'], 'Order Receipt', $body, 'From: admin@sitename.com');

ob_start();
header("Refresh:3; url=index.php");

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
	<?php echo '<h3 align="center">'.$message.'</h3>'; ?>
</body>
</html>