<?php 
session_start();
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
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
					<?php 
					if(isset($_SESSION['firstName'])) { 
						echo '<font color="white">' . $_SESSION['firstName'] . '</font>';
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
		<div class="jumbotron">
			<h1>Computer Parts Store</h1>
			<p class="lead">Welcome to the Computer Parts Store! This is a simple website written in PHP for our CIS355 project.</p>
			<p><a href="browseparts.php" class="btn btn-primary btn-large">Browse Parts Now&raquo;</a></p>
		</div>

		<div class="row">
			<div class="col-md-4">
				<h2>SSDs</h2>
				<p>Is your machine in need of a boost? Get a lightning fast solid state drive today!</p>
				<p><a class="btn btn-default" href="#">Shop SSDs &raquo;</a></p>
			</div>
			<div class="col-md-4">
				<h2>Video Cards</h2>
				<p>Want to build the ultimate gaming rig? Start your system with a high-powered graphics card.</p>
				<p><a class="btn btn-default" href="#">Shop Video Cards &raquo;</a></p>
			</div>
			<div class="col-md-4">
				<h2>Join our community</h2>
				<p>Register today for the chance to personalize your visit and discuss products.</p>
				<p><a class="btn btn-default" href="loginregister.php">Register Now! &raquo;</a></p>
			</div>
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
