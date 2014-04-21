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
			$errors[] = '<p class="error"> - You forgot to enter a reply!</p>';
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
					$errors[] = 'Your file\'s size is to large!';
				}
			} else {
				$valid_file = false;
				$errors[] = 'Your upload triggered the following error:  '.$_FILES['file']['error'];
			}
		} else {
			$file_uploaded = false;
		}

		if ($reply && $valid_file) {
			$name = $_SESSION['firstName'] . ' ' . $_SESSION['lastName'];
			
			$q = "INSERT INTO answers (question_id, answer, answered_by) VALUES ('$question_number', '$reply', '$name')";
	        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	        if (mysqli_affected_rows($dbc) != 1) {
	        	echo '<div class="container body-content"><div class="col-md-12"><div class="well">';
				echo '<p class="error">You could not add a reply due to a system error.
					  We apologize for any inconvenience.</p>';
				echo '</div></div></div>';
	        	
	        } else {
	        	$q = "UPDATE questions SET replies = replies + 1 WHERE id = $question_number";
	        	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	        	$q = "SELECT id FROM answers ORDER BY id DESC LIMIT 1";
		        $r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

		        $reply=mysqli_fetch_array($r);
		        $reply_id = $reply['id'];
				if($file_uploaded) {
					$name = $_FILES["file"]["name"];
					$ext = end((explode(".", $name)));
					$file_name = 'reply_' . $reply_id . '.' . $ext;
				 	move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$file_name);

				 	$q = "INSERT INTO uploaded_files (post_number, post_type, uploaded_filename, saved_filename) VALUES ('$reply_id', 'reply', '$name', '$file_name')";
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

$replies = "";
while($row = mysqli_fetch_array($r)) 
{  	$replies[] = $row;  }

$q = "SELECT * FROM uploaded_files" . " WHERE post_number=" . $question_number . " AND post_type='question'";
$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

$question_file=mysqli_fetch_array($r);

mysqli_free_result($r);
//mysqli_close($dbc);

function displayQuestion($questions, $question_file) {
	foreach ($questions as &$question) {
		echo '<div class="panel-heading">'
			 . '<h3 class="panel-title">' . $question['question_title'] . ' (Asked by <strong>' . $question['asked_by'] . '</strong>)</h3>'
			 . '</div>'
			 . '<div class="panel-body">' . $question['question']
			 . '<br><br>'
			 . '<a href="uploads/' . $question_file['saved_filename'] . '" download="' . $question_file['uploaded_filename'] . '">' . $question_file['uploaded_filename'] . '</a>'
			 . '</div>';
	}
}

function displayReplies($dbc, $replies) {
	if($replies != "") {
		foreach ($replies as &$reply) {
			$q = "SELECT * FROM uploaded_files" . " WHERE post_number=" . $reply['id'] . " AND post_type='reply'";
			$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

			$reply_file=mysqli_fetch_array($r);

			echo '<div class="panel-heading">'
				 . '<h3 class="panel-title"><strong>' . $reply['answered_by'] . '</strong> replied:</h3>'
				 . '</div>'
				 . '<div class="panel-body">' . $reply['answer']
				 . '<br><br>'
				 . '<a href="uploads/' . $reply_file['saved_filename'] . '" download="' . $reply_file['uploaded_filename'] . '">' . $reply_file['uploaded_filename'] . '</a>'
				 . '</div>';
		}

		mysqli_free_result($r);
		mysqli_close($dbc);
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
		<div class="panel panel-primary">
			<?php displayQuestion($questions, $question_file); ?>
		</div>
		<div class="panel panel-default">
			<?php displayReplies($dbc, $replies); ?>
		</div>
		<?php echo '<form class="form-horizontal" id="questionReplyForm" action="question.php?question='.$_GET['question'].'" method="post" enctype="multipart/form-data">'; ?>
			<div class="form-group">
				<label for="questionReply" class="col-md-2 control-label">Reply to this Question:</label>
				<div class="col-md-10">
					<textarea class="form-control" rows="3" id="questionReply" name="questionReply" maxlength="2000"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-10 col-md-offset-2">
					Attach a File: <input type="file" class="form-control" name="file" size="25" style="padding: 0px 0px; maring-bottom: 10px; width: 70%; display: inline-block;" />
					<!--<button type="button" class="btn btn-info">Attach a File</button>-->
					<button type="submit" class="btn btn-primary">Reply</button>
				</div>
			</div>
		</form>
		<hr />
		<footer>
			<p>&copy; 2014 - Computer Parts Supply</p>
		</footer>
	</div>
	<script src="scripts/jquery-1.11.0.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/jquery.validate.min.js"></script>
	<script src="scripts/question.js"></script>
</body>
</html>