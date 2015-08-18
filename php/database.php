<?php
	
	ini_set('display_errors', 'Off');
    error_reporting(0);

	//mysql database server connection details
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "webtech";

	$link = mysql_connect($server, $username, $password);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysql_select_db($database);
	if (!$db_selected) {
		die ('Can\'t use database: ' . $database . ' => ' . mysql_error());
	}

?>