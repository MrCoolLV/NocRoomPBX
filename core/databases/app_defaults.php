<?php

//proccess this only one time
if ($domains_processed == 1) {

	//set the database driver
		$sql = "select * from v_databases ";
		$sql .= "where database_driver is null ";
		$prep_statement = $db->prepare(check_sql($sql));
		$prep_statement->execute();
		$result = $prep_statement->fetchAll(PDO::FETCH_NAMED);
		foreach ($result as &$row) {
			$database_uuid = $row["database_uuid"];
			$database_type = $row["database_type"];
			$database_type_array = explode(":",  $database_type);
			if ($database_type_array[0] == "odbc") {
				$database_driver = $database_type_array[1];
			}
			else {
				$database_driver = $database_type_array[0];
			}
			$sql = "update v_databases set ";
			$sql .= "database_driver = '$database_driver' ";
			$sql .= "where database_uuid = '$database_uuid' ";
			$db->exec(check_sql($sql));
			unset($sql);
		}
		unset($prep_statement, $result);
}
?>
