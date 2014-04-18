<?php 
session_start(); 

require('css/config.inc.php');
require (MYSQL);

if($_GET['category'] == 'hard_drives' || $_GET['category'] == 'ssds' || $_GET['category'] == 'external_storage')
{
	$cat = 'hard_drives_specs';
} elseif($_GET['category'] <> 'all') {
	$cat = $_GET['category'] . '_specs';
} 

$q = "SELECT * FROM " . $cat . " WHERE upc=" . $_GET['upc'];
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

$itemspecs=mysqli_fetch_array($r);

mysqli_free_result($r);
mysqli_close($dbc);

function showitem($itemspecs) {
	echo '<div class="col-md-3">
			<img src="images/products/'.$itemspecs['upc'].'.jpg" class="featuredProductImage" />
		  </div>
		  <div class="col-md-6">
		    <div class="well">
		        <span class="titleHeader">'.$itemspecs['product_name'].'</span><br />
		        <span class="priceHeader">'.number_format($itemspecs['price'], 2).'</span>
		            <dl class="dl-horizontal productInfo">
			            <dt>Manufacturer</dt>
			            <dd>'.$itemspecs['manufacturer'].'</dd>
			            <dt>Model #:</dt>
			            <dd>'.$itemspecs['model_number'].'</dd>
			            <dt>Rating (out of 5):</dt>
			            <dd>'.$itemspecs['rating'].'</dd>
			        </dl>';
		 echo '<form id="addToCart" action="cart.php?upc='.$itemspecs['upc'].'" method="post">
						<label for="addQuantity">Quantity: </label>
						<input name = "quantity" type="number" min="0" class="quantityInput" value="1" />';
}

function showextendedspecs($itemspecs, $cat, $tables) {
	foreach($tables[$cat] as &$spec) {
		echo '<tr><td class="specName col-md-2">'.ucwords(str_replace("_", " ", $spec)).
			 '</td><td>'.$itemspecs[$spec].'</td></tr>';
	}
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
					      echo '<li class="userHeader">' . 'Logged in as ' . $_SESSION['firstName'];
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
		<?php if(isset($_GET['li'])) { echo '<h3 align="center">Error! Please register and log in before adding items to your cart.</h3>'; } ?>
		<div class="row">
				<?php showitem($itemspecs);
						echo '<button type="submit" '; if(!isset($_SESSION['firstName'])) { 
							echo 'formaction="product.php?category='.$_GET['category'].'&upc='.$_GET['upc'].'&li=false" '; }
							echo 'class="btn btn-primary btn-sm">'; ?>
							<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<h4>Product Specifications</h4>
			<table class="table table-bordered">
				<?php showextendedspecs($itemspecs, $cat, $tables); ?>
			</table>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
		</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
</body>
</html>