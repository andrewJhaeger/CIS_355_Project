<?php

define('LIVE', FALSE);
define('EMAIL', 'sjfoco@svsu.edu');

define('BASE_URL', 'http://localhost/cis_355_project-master/partstore/');
define('MYSQL', 'mysqli_connect.php');

date_default_timezone_set('US/Eastern');

function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {
	$message = "An error has occurred in script '$e_file' on line $e_line: $e_message\n";
	$message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n";

	if (!LIVE) {
		echo '<div class="error">' . nl2br($message);
		echo '<pre>' . print_r($e_vars, 1) . "\n";
		debug_print_backtrace();
		echo '</pre></div>';

	}
}
set_error_handler('my_error_handler');

?>