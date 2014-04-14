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
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Parts <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="partlist.php">Browse all parts</a></li>
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
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="loginregister.php">Login/Register</a></li>
					<li><a href="#">Cart &nbsp;<span class="badge">4</span></a></li>
				</ul>
            </div>
        </div>
    </div>
    
	<div class="container body-content">
		<legend>All Products</legend>
		<table class="table table-bordered" id="productList">
				<thead>
					<tr>
						<th>Image</th><th>Product Information</th><th>Image</th><th>Product Information</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><img src="images/samplegraphicscard.png" class="productImage" /></td>
						<td>
							<a href="#">EVGA GeForce GTX Sample Graphics Card</a><br />
							<dl class="dl-horizontal">
								<dt>Price:</dt>
								<dd>$199.99</dd>
								<dt>Manufacturer</dt>
								<dd>EVGA</dd>
								<dt>Model #:</dt>
								<dd>0123456789</dd>
								<dt>Rating (out of 5):</dt>
								<dd>4.34</dd>
							</dl>
						<td><img src="images/samplemonitor.png" class="productImage" /></td>
						<td>
							<a href="#">ASUS Sample Monitor</a><br />
							<dl class="dl-horizontal">
								<dt>Price:</dt>
								<dd>$149.99</dd>
								<dt>Manufacturer</dt>
								<dd>ASUS</dd>
								<dt>Model #:</dt>
								<dd>4DS03AV</dd>
								<dt>Rating (out of 5):</dt>
								<dd>4.88</dd>
							</dl>
						</td>
					</tr>
					<tr>
						<td><img src="images/samplemonitor.png" class="productImage" /></td>
						<td>
							<a href="#">ASUS Sample Monitor</a><br />
							<dl class="dl-horizontal">
								<dt>Price:</dt>
								<dd>$149.99</dd>
								<dt>Manufacturer</dt>
								<dd>ASUS</dd>
								<dt>Model #:</dt>
								<dd>4DS03AV</dd>
								<dt>Rating (out of 5):</dt>
								<dd>4.88</dd>
							</dl>
						</td>
						<td><img src="images/samplessd.png" class="productImage" /></td>
						<td>
							<a href="#">Samsung Sample SSD</a><br />
							<dl class="dl-horizontal">
								<dt>Price:</dt>
								<dd>$229.99</dd>
								<dt>Manufacturer</dt>
								<dd>Samsung</dd>
								<dt>Model #:</dt>
								<dd>ABCDEFG123</dd>
								<dt>Rating (out of 5):</dt>
								<dd>4.14</dd>
							</dl>
						</td>
					</tr>			
				</tbody>
		</table>
		<div id="tablePaginator">
			<ul class="pagination pagination-sm">
				<li><a href="#">&laquo;</a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
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
