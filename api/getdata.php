<?php
	include("../db_config.php");
	$response = array();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$sql = "SELECT * FROM student1";
		$result = $db_con->query($sql);

		$data = array();

		while ($row = $result->fetch()) {
			$data[] = $row;
		}

		$response['data'] = $data;

	}

	echo json_encode($response);


?>