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
		<div class="row">
			<table class="table table-bordered">
				<tr><th>Question</th><th>Asked By</th><th>Replies</th></tr>
				<tr><td><a href="question.php">How do I turn on my computer?</a></td><td>Andrew</td><td>1</td></tr>
				<tr><td><a href="question.php">Core i5 vs i7</a></td><td>Ryan</td><td>12</td></tr>
				<tr><td><a href="question.php">How do I output from my laptop to my TV?</a></td><td>Steve</td><td>4</td></tr>
				<tr><td><a href="question.php">I need help adding items to my cart.</a></td><td>John</td><td>1</td></tr>
				<tr><td><a href="question.php">How do I install a graphics card?</td><td>Jane</td><td>4</td></tr>
			</table>
		</div>
		<div class="row">
			<div class="well">
				<form class="form-horizontal" id="newQuestionForm" action="question.php" method="post">
					<legend>New Question</legend>
					<div class="form-group">
						<label for="newQuestion" class="col-md-3 control-label">Question:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="newQuestion" name="newQuestion" placeholder="Question"/>
						</div>
					</div>
					<div class="form-group">
						<label for="newQuestionDetails" class="col-md-3 control-label">Additional Details:</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" id="newQuestionDetails" name="newQuestionDetails"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
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