<?php 
session_start(); 

require('css/config.inc.php');
if(!empty($_GET['question'])) {
	$question_number = $_GET['question'];
}
require (MYSQL);


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(!empty($_SESSION['firstName'])) {
		$errors = array();

		if (!empty($_POST['questionReply'])) {
			$reply = mysqli_real_escape_string ($dbc, $_POST['questionReply']);
		} else {
			$reply = FALSE;
			$errors[] = '<p class="error"> - You forget to enter a reply!</p>';
		}
		if ($reply) {
			$firstName = $_SESSION['firstName'];
			$q = "INSERT INTO answers (question_id, answer, answered_by) VALUES ('$question_number', '$reply', '$firstName')";
	        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	        if (mysqli_affected_rows($dbc) != 1) {
	        	echo '<div class="container body-content"><div class="col-md-12"><div class="well">';
				echo '<p class="error">You could not add a reply due to a system error.
					  We apologize for any inconvenience.</p>';
				echo '</div></div></div>';
	        	
	        } else {
	        	$q = "UPDATE questions SET replies = replies + 1 WHERE id = $question_number";
	        	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	        }
		} else {
			echo '<div class="container body-content"><div class="col-md-12"><div class="well">
			<p class="error">The following error(s) occurred:<br />';
			foreach ($errors as $msg) { // Print each error.
				echo "$msg";
			}
			echo '</div></div></div>';
		}
	} else {
		echo '<div class="container body-content"><div class="col-md-12"><div class="well">';
		echo '<p class="error">You could not add a new question because you are not logged in.  
			 Please log in, then try again.</p>';
		echo '</div></div></div>';
	}
}

$q = "SELECT * FROM questions" . " WHERE id=" . $question_number;
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

while($row = mysqli_fetch_array($r)) 
{  	$questions[] = $row;  }

$q = "SELECT * FROM answers" . " WHERE question_id=" . $question_number;
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

while($row = mysqli_fetch_array($r)) 
{  	$replies[] = $row;  }

mysqli_free_result($r);
mysqli_close($dbc);

function displayQuestion($questions) {
	foreach ($questions as &$question) {
		echo '<div class="panel-heading">'
			 . '<h3 class="panel-title">' . $question['question_title'] . ' (Asked by <strong>' . $question['asked_by'] . '</strong>)</h3>'
			 . '</div>'
			 . '<div class="panel-body">' . $question['question'] . '</div>';
	}
}

function displayReplies($replies) {
	foreach ($replies as &$reply) {
		echo '<div class="panel-heading">'
			 . '<h3 class="panel-title"><strong>' . $reply['answered_by'] . '</strong> replied:</h3>'
			 . '</div>'
			 . '<div class="panel-body">' . $reply['answer'] . '</div>';
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
		<h2>Q&amp;A</h2>
		<div class="panel panel-primary">
			<?php displayQuestion($questions); ?>
		</div>
		<div class="panel panel-default">
			<?php displayReplies($replies); ?>
		</div>
		<?php echo '<form class="form-horizontal" id="questionReplyForm" action="question.php?question='.$_GET['question'].'" method="post">'; ?>
			<div class="form-group">
				<label for="questionReply" class="col-md-2 control-label">Reply to this Question:</label>
				<div class="col-md-10">
					<textarea class="form-control" rows="3" id="questionReply" name="questionReply" maxlength="2000"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					Attach a File: <input type="file" class="form-control" name="file" size="25" />
					<!--<button type="button" class="btn btn-info">Attach a File</button>-->
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