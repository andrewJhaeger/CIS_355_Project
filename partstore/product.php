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
					<li><a href="loginregister.php">Login/Register</a></li>
					<li><a href="cart.php">Cart &nbsp;<span class="badge">4</span></a></li>
				</ul>
            </div>
        </div>
    </div>
	<div class="container body-content">
		<div class="row">
			<div class="col-md-3">
				<img src="images/products/031790888857.jpg" class="img-thumbnail featuredProductImage" />
			</div>
			<div class="col-md-6">
				<div class="well">
					<span class="titleHeader">Intel - Core i7-4770K</span><br />
					<span class="priceHeader">$349.99</span>
					<dl class="dl-horizontal productInfo">
						<dt>Manufacturer</dt>
						<dd>Intel</dd>
						<dt>Model #:</dt>
						<dd>BX80646I74770K</dd>
						<dt>Rating (out of 5):</dt>
						<dd>4.34</dd>
					</dl>
					<form id="addToCart" action="cart.php" method="post">
						<label for="addQuantity">Quantity: </label>
						<input type="number" min="0" class="quantityInput" value="1"/>
						<button type="submit" class="btn btn-primary btn-sm">
							<span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
						</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<h4>Product Specifications</h4>
			<table class="table table-bordered">
				<tr><td class="specName col-md-2">Cores</td><td>4</td></tr>
				<tr><td class="specName col-md-2">Clock Speed</td><td>3.5GHz</td></tr>
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