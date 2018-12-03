<?php
//include nr
	include "core/nr.php";

//include root
	include "root.php";

// start the session
	ini_set("session.cookie_httponly", True);
	if (!isset($_SESSION)) { session_start(); }

//if config.php file does not exist then redirect to the install page
	if (file_exists($_SERVER["PROJECT_ROOT"]."/resources/config.php")) {
		//do nothing
	} elseif (file_exists($_SERVER["PROJECT_ROOT"]."/resources/config.php")) {
		//original directory
	} elseif (file_exists($_SERVER["PROJECT_ROOT"]."/includes/config.php")) {
		//move config.php from the includes to resources directory.
		rename($_SERVER["PROJECT_ROOT"]."/includes/config.php", $_SERVER["PROJECT_ROOT"]."/resources/config.php");
	} elseif (file_exists("/etc/fusionpbx/config.php")) {
		//linux
	} elseif (file_exists("/usr/local/etc/fusionpbx/config.php")) {
		//bsd
	} else {
		header("Location: ".PROJECT_PATH."/core/install/install.php");
		exit;
	}

// if not logged in, clear the session variables
	//if (strlen($_SESSION["username"]) == 0) {
	//	session_unset();
	//	session_destroy();
	//}

//adds multiple includes
	require_once "resources/require.php";

// if logged in, redirect to login destination
	if (isset($_SESSION["username"]) and (strlen($_SESSION["username"]) > 0)) {
		if (strlen($_SESSION['login']['destination']['url']) > 0) {
			header("Location: ".$_SESSION['login']['destination']['url']);
		} elseif (file_exists($_SERVER["PROJECT_ROOT"]."/core/user_settings/user_dashboard.php")) {
			header("Location: ".PROJECT_PATH."/core/user_settings/user_dashboard.php");
		}
		else {
			require_once "resources/header.php";
			require_once "resources/footer.php";
		}
	}
	else {
		//use custom index, if present, otherwise use custom login, if present, otherwise use default login
		if (file_exists($_SERVER["PROJECT_ROOT"]."/themes/".$_SESSION['domain']['template']['name']."/index.php")) {
			require_once "themes/".$_SESSION['domain']['template']['name']."/index.php";
		} else if (file_exists($_SERVER["PROJECT_ROOT"]."/themes/".$_SESSION['domain']['template']['name']."/login.php")) {
			require_once "themes/".$_SESSION['domain']['template']['name']."/login.php";
		}
		else {
			require_once "resources/login.php";
		}
	}

?>
