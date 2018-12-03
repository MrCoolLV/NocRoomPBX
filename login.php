<?php
//include nr
	include "core/nr.php";

//includes
	include "root.php";
	require_once "resources/require.php";

//start session
	ini_set("session.cookie_httponly", True);
	if (!isset($_SESSION)) { session_start(); }

//if config.php file does not exist then redirect to the install page
	if (file_exists($_SERVER["PROJECT_ROOT"]."/resources/config.php")) {
		//original directory
	}
	else if (file_exists($_SERVER["PROJECT_ROOT"]."/includes/config.php")) {
		//move config.php from the includes to resources directory.
		rename($_SERVER["PROJECT_ROOT"]."/includes/config.php", $_SERVER["PROJECT_ROOT"]."/resources/config.php");
	}
	else if (file_exists("/etc/fusionpbx/config.php")){
		//linux
	}
	else if (file_exists("/usr/local/etc/fusionpbx/config.php")){
		//bsd
	}
	else {
		header("Location: ".PROJECT_PATH."/core/install/install.php");
		exit;
	}

//use custom login, if present, otherwise use default login
	if (file_exists($_SERVER["PROJECT_ROOT"]."/themes/".$_SESSION['domain']['template']['name']."/login.php")){
		require_once "themes/".$_SESSION['domain']['template']['name']."/login.php";
	}
	else {
		require_once "resources/login.php";
	}

?>
