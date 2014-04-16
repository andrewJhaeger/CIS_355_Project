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
					<li><a href="loginregister.phpl">Login/Register</a></li>
					<li><a href="cart.php">Cart &nbsp;<span class="badge">-</span></a></li>
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
					<tr>
						<td><img src="images/samplegraphicscard.png" class="productImage" /></td>
						<td>			
							<a href="product.php">EVGA GeForce GTX Sample Graphics Card</a><br />				
							<dl class="dl-horizontal">
									<dt>Manufacturer</dt>
									<dd>EVGA</dd>
									<dt>Model #:</dt>
									<dd>0123456789</dd>
									<dt>Rating (out of 5):</dt>
									<dd>4.34</dd>
								</dl>
						</td>
						<td class="cartPrice">$199.99</td>
						<td><input type="number" class="quantityInput" name="" /></td>
					</tr>
					<tr>
						<td><img src="images/samplemonitor.png" class="productImage" /></td>
						<td>			
							<a href="product.php">ASUS Sample Monitor</a><br />				
							<dl class="dl-horizontal">
									<dt>Manufacturer</dt>
									<dd>ASUS</dd>
									<dt>Model #:</dt>
									<dd>4DS03AV</dd>
									<dt>Rating (out of 5):</dt>
									<dd>4.88</dd>
								</dl>
						</td>
						<td class="cartPrice">$149.99</td>
						<td><input type="number" class="quantityInput" name="" /><br /></td>
					</tr>
					<tr>
						<td><img src="images/samplessd.png" class="productImage" /></td>
						<td>			
							<a href="product.php">Samsung Sample SSD</a><br />				
							<dl class="dl-horizontal">
									<dt>Manufacturer</dt>
									<dd>Samsung</dd>
									<dt>Model #:</dt>
									<dd>ABCDEFG123</dd>
									<dt>Rating (out of 5):</dt>
									<dd>4.14</dd>
								</dl>
						</td>
						<td class="cartPrice">$229.99</td>
						<td><input type="number" class="quantityInput" name="" /></td>
					</tr>
					<tr>
						<th colspan="2" style="text-align:right">Total:</th>
						<th>$579.97</th>
						<td></td>
					</tr>
				</table>
				<div style="text-align:right">
					<button type="button" class="btn btn-primary">Update Quantities</button> 
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
