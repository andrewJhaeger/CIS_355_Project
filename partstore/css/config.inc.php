<?php

define('LIVE', FALSE);
define('EMAIL', 'sjfoco@svsu.edu');

define('BASE_URL', 'http://localhost/417/cis_355_project-master/partstore/');
define('MYSQL', 'mysqli_connect.php');

date_default_timezone_set('US/Eastern');
setlocale(LC_MONETARY, 'en_US');

$tables = array();
$tables[] = 'audio_devices_specs';
	$tables['audio_devices_specs'][] = 'power';
	$tables['audio_devices_specs'][] = 'channels';
$tables[] = 'cases_specs';
	$tables['cases_specs'][] = 'case_type';
	$tables['cases_specs'][] = 'drive_bays';
	$tables['cases_specs'][] = 'cooling_fans';
	$tables['cases_specs'][] = 'height';
	$tables['cases_specs'][] = 'width';
	$tables['cases_specs'][] = 'depth';
	$tables['cases_specs'][] = 'weight';
$tables[] = 'disk_drives_specs';
	$tables['disk_drives_specs'][] = 'media_supported';	
	$tables['disk_drives_specs'][] = 'read_speed';
	$tables['disk_drives_specs'][] = 'write_speed';
	$tables['disk_drives_specs'][] = 'height';
	$tables['disk_drives_specs'][] = 'width';
	$tables['disk_drives_specs'][] = 'depth';
	$tables['disk_drives_specs'][] = 'weight';
$tables[] = 'hard_drives_specs';
	$tables['hard_drives_specs'][] = 'capacity';
	$tables['hard_drives_specs'][] = 'connectivity';
	$tables['hard_drives_specs'][] = 'height';
	$tables['hard_drives_specs'][] = 'width';
	$tables['hard_drives_specs'][] = 'depth';
	$tables['hard_drives_specs'][] = 'weight';
$tables[] = 'keyboards_specs';
	$tables['keyboards_specs'][] = 'palm_rest';
$tables[] = 'memory_specs';
	$tables['memory_specs'][] = 'capacity';
	$tables['memory_specs'][] = 'type';
	$tables['memory_specs'][] = 'pin_configuration';
$tables[] = 'monitors_specs';
	$tables['monitors_specs'][] = 'type';
	$tables['monitors_specs'][] = 'screen_size';
	$tables['monitors_specs'][] = 'resolution';
	$tables['monitors_specs'][] = 'input_types';
	$tables['monitors_specs'][] = 'height';
	$tables['monitors_specs'][] = 'width';
	$tables['monitors_specs'][] = 'weight';
$tables[] = 'motherboards_specs';
	$tables['motherboards_specs'][] = 'multiple_gpu_supported';
	$tables['motherboards_specs'][] = 'memory_slots';
	$tables['motherboards_specs'][] = 'maximum_memory';
	$tables['motherboards_specs'][] = 'pci_slots';
	$tables['motherboards_specs'][] = 'usb_ports';
	$tables['motherboards_specs'][] = 'ps2_ports';
	$tables['motherboards_specs'][] = 'width';
	$tables['motherboards_specs'][] = 'depth';
$tables[] = 'printers_specs';
	$tables['printers_specs'][] = 'cartridges';
	$tables['printers_specs'][] = 'wireless';
	$tables['printers_specs'][] = 'height';
	$tables['printers_specs'][] = 'width';
	$tables['printers_specs'][] = 'depth';
	$tables['printers_specs'][] = 'weight';
$tables[] = 'processors_specs';
	$tables['processors_specs'][] = 'number_of_cores';
	$tables['processors_specs'][] = 'clock_speed';
$tables[] = 'video_cards_specs';
	$tables['video_cards_specs'][] = 'slot_type';
	$tables['video_cards_specs'][] = 'output_types';

$tablenames[] = 'audio_devices_specs';
$tablenames[] = 'cases_specs';
$tablenames[] = 'disk_drives_specs';
$tablenames[] = 'hard_drives_specs';
$tablenames[] = 'keyboards_specs';
$tablenames[] = 'monitors_specs';
$tablenames[] = 'motherboards_specs';
$tablenames[] = 'printers_specs';
$tablenames[] = 'processors_specs';
$tablenames[] = 'video_cards_specs';

function my_error_handler ($e_number, $e_message, $e_file, $e_line, $e_vars) {
	$message = "\n\n\nAn error has occurred in script '$e_file' on line $e_line: $e_message\n";
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