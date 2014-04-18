<?php
session_start();

foreach($_SESSION['allitems'] as &$item) {
	echo $item['upc']."\n";
}

require('css/config.inc.php');
require (MYSQL);

?>