<?php
usleep(500000);
require_once('functions.php');
//echo 'asdasd';
if (isset($_GET['old_link']) && isset($_GET['desired_link'])) {
	$old_link = str_replace(' ', '', $_GET['old_link']);
	if ($old_link != '') {
		$old_link = addhttp($old_link);
		$shortlink = parse_ini_file('shortlink.ini');
		$new_link = str_replace(" ", '', $_GET['desired_link']);
		if ($new_link != '') {
			if (array_key_exists($new_link, $shortlink)) {
				echo 'error';
				die();
			}
		} else {
			$new_link = generateLink();
			while (array_key_exists($new_link, $shortlink)) {
				$new_link = generateLink();
			}
		}
	}
	$shortlink[$new_link] = str_replace('=', '%3D', $old_link);
	$fp = fopen('shortlink.ini', 'r+');
	foreach ($shortlink as $key => $value) {
		fwrite($fp, $key.'='.$value.PHP_EOL);
	}
	fclose($fp);
	echo $new_link;
}
