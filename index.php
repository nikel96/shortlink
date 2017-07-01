<?php
if (isset($_GET['link'])) {
	$shortlink = parse_ini_file('shortlink.ini');
	if (array_key_exists($_GET['link'], $shortlink)) {
		$link = str_replace('%3D', '=', $shortlink[$_GET["link"]]);
		header("Location: ".$link);
		die;
	} else {
		header("Location: /");
	}
}
require_once('view/main.html');
