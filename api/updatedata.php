<?php
include("../db_config.php");
$response = array();

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$name = $_POST['name'];
	$major = $_POST['major'];
	$sex = $_POST['sex'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$std_id = $_POST['id'];

	$sql = "UPDATE student1 SET std_name=?,std_major=?,std_sex=?,std_age=?,std_email=? WHERE std_id=?";
	$stmt = $db_con->prepare($sql);
	$stmt->bindParam(1,$name);
	$stmt->bindParam(2,$major);
	$stmt->bindParam(3,$sex);
	$stmt->bindParam(4,$age);
	$stmt->bindParam(5,$email);
	$stmt->bindParam(6,$std_id);
	$result = $stmt->execute();
	if($result){
		$response['status'] = 'ok';
	}else{
		$response['status'] = 'error';
	}
}else{
	$response['status'] = 'no-request';
}

echo json_encode($response);
?>