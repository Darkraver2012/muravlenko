<?php
$py = $_GET["py"];
$py = basename($py);

$arg = $_GET["arg"];
if (file_exists($py)) {
	ob_start();
	passthru("python3 {$py} {$arg}");
	ob_end_clean();
}
else {
	die('The provided python script is not found.');
}  

//$report = $_GET["report"];
//if (file_exists($report)) {
//	$file_name = basename($report);
//	$file_size = filesize($report);
//	ob_start();
//	header('Content-type: application/octet-stream');
//	header('Content-Transfer-Encoding: binary');
//	header('Content-Length: '.$file_size);
//	header('Content-Disposition: attachment; filename='.$file_name);
//	readfile($file_name);
//	ob_end_flush();
//	exit;
//}
//else {
//	die('The provided report is not found.');
//}     