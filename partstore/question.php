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
		<h2>Q&amp;A</h2>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">How do I turn on my computer? (Asked by <strong>Andrew</strong>)</h3>
			</div>
			<div class="panel-body">Why won't my computer turn on!!! It's supposed to respond to voice commands!</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Ryan</strong> replied:</h3>
			</div>
			<div class="panel-body">Try pressing the power button.</div>
		</div>
		<form class="form-horizontal" id="questionReplyForm" target="question.php" method="post">
			<div class="form-group">
				<label for="questionReply" class="col-md-2 control-label">Reply to this Question:</label>
				<div class="col-md-10">
					<textarea class="form-control" rows="3" id="questionReply" name="questionReply"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					<button type="submit" class="btn btn-primary">Reply</button>
				</div>
			</div>
		</form>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Store</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
</body>
</html>
