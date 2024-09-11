<?php

include("../db_config.php");
$response = array();

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$id = $_POST['id'];
	$sql = "DELETE FROM student1 WHERE std_id = ?";

	$stmt = $db_con->prepare($sql);
	$stmt->bindParam(1,$id);
	$result = $stmt->execute();
	if($result){
		$response['status'] = 'ok';
	}else{
		$response['status'] = 'error';
	}
}
echo json_encode($response);
?>