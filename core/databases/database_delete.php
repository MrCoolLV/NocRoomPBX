<?php

require_once "root.php";
require_once "resources/require.php";
require_once "resources/check_auth.php";
if (permission_exists('database_delete')) {
	//access granted
}
else {
	echo "access denied";
	exit;
}

//add multi-lingual support
	$language = new text;
	$text = $language->get();

//get the id
	if (count($_GET) > 0) {
		$id = check_str($_GET["id"]);
	}

//delete the records
	if (strlen($id) > 0) {
		$sql = "";
		$sql .= "delete from v_databases ";
		$sql .= "where database_uuid = '$id' ";
		$prep_statement = $db->prepare(check_sql($sql));
		$prep_statement->execute();
		unset($sql);
	}

//redirect the browser
	message::add($text['message-delete']);
	header("Location: databases.php");
	return;

?>
