<?php 
session_start(); 

require('css/config.inc.php');
require (MYSQL);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(!empty($_SESSION['firstName'])) {
		$errors = array();

		if (!empty($_POST['newQuestion'])) {
			$question_title = mysqli_real_escape_string ($dbc, $_POST['newQuestion']);
		} else {
			$question_title = FALSE;
			$errors[] = '<p class="error"> - You forgot to enter a question!</p>';
		}

		if (!empty($_POST['newQuestionDetails'])) {
			$question = mysqli_real_escape_string ($dbc, $_POST['newQuestionDetails']);
		} else {
			$question = FALSE;
			$errors[] = '<p class="error"> - You forgot to enter details about your question!</p>';
		}

		$valid_file = true;
		if($_FILES['file']['name']) {
			$file_uploaded = true;
			if(!$_FILES['file']['error']) {
				$name = $_FILES["file"]["name"];
				$ext = end((explode(".", $name)));
				if(!in_array($_FILES['file']['type'], $approved_file_types) && !in_array($ext, $approved_file_exts)) {
					$valid_file = false;
					$errors[] = 'You uploaded a file type that is not accepted.  Here is a list of the accepted file types: .pdf, .txt, .jpeg, .jpg, .png, .gif, .tiff, .bmp';
				}
				if($_FILES['file']['size'] > (2100000)) {		//can't be larger than 2 MB
					$valid_file = false;
					$errors[] = 'Your file\'s size is too large!';
				}
			} else {
				$valid_file = false;
				$errors[] = 'Your upload triggered the following error:  '.$_FILES['file']['error'];
			}
		} else {
			$file_uploaded = false;
		}

		$datetime = date('m-d-Y H:i:s');
		if ($question_title && $question && $valid_file) {
			$name = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
			$q = "INSERT INTO questions (question_title, question, asked_by, replies, date_time) VALUES ('$question_title', '$question', '$name', '0', '$datetime')";
	        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	        if (mysqli_affected_rows($dbc) != 1) {
	        	echo '<div class="container body-content"><div class="col-md-12"><div class="well">';
				echo '<p class="error">You could not add a new question due to a system error.
					  We apologize for any inconvenience.</p>';
				echo '</div></div></div>';
	        } else {
	        	$q = "SELECT id FROM questions ORDER BY id DESC LIMIT 1";
		        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		        $question=mysqli_fetch_array($r);
		        $question_id = $question['id'];
				if($file_uploaded) {
					$name = $_FILES["file"]["name"];
					$ext = end((explode(".", $name)));
					$file_name = 'question_' . $question_id . '.' . $ext;
				 	move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$file_name);

				 	$q = "INSERT INTO uploaded_files (post_number, post_type, uploaded_filename, saved_filename) VALUES ('$question_id', 'question', '$name', '$file_name')";
				 	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
				}
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
		echo '<div class="container body-content"><div class="col-md-12">';//<div class="well">';
		//echo '<p class="error">You could not add a new question because you are not logged in.  
			 //Please log in, then try again.</p>';
		echo '<h3 align="center">You could not add a new question because you are not logged in. Please log in, then try again.</h3>';
		echo '</div></div>';//</div>';
	}
}

$q = "SELECT * FROM questions";
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

$questions = "";
while($row = mysqli_fetch_array($r)) 
{  	$questions[] = $row;  }

mysqli_free_result($r);
mysqli_close($dbc);

function displayQuestions($questions) {
	if($questions != "") {
		foreach ($questions as &$question) {
			echo '<tr><td><a href="question.php?question=' 
				 . $question['id'] . '">' . $question['question_title'] 
				 . '</a></td><td>' . $question['asked_by'] 
				 . '</td><td>' . $question['replies'] . '</td></tr>';
		}
	}
}

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
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Computer Parts Supply</a>
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
					       echo '<li class="userHeader">' . 'Logged in as ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
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
		<h2>Q&amp;A</h2>
		<div class="row">
			<table class="table table-bordered">
				<tr><th>Question</th><th>Asked By</th><th>Replies</th></tr>
				<?php displayQuestions($questions); ?>
			</table>
		</div>
		<div class="row">
			<div class="well">
				<form class="form-horizontal" id="newQuestionForm" action="questions.php" method="post"  enctype="multipart/form-data">
					<legend>New Question</legend>
					<div class="form-group">
						<label for="newQuestion" class="col-md-3 control-label">Question:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="newQuestion" name="newQuestion" placeholder="Question" maxlength="300"/>
						</div>
					</div>
					<div class="form-group">
						<label for="newQuestionDetails" class="col-md-3 control-label">Additional Details:</label>
						<div class="col-md-9">
							<textarea class="form-control" rows="3" id="newQuestionDetails" name="newQuestionDetails" maxlength="2000"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							Attach a File: <input type="file" class="form-control" name="file" size="10" style="padding: 0px 0px; maring-bottom: 10px; width: 70%; display: inline-block;" />
							<!--<button type="button" class="btn btn-info">Attach a File</button>-->
							<button type="submit" class="btn btn-primary"style="display: inline-block;">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Supply</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/jquery.validate.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/questions.js"></script>
</body>
</html>