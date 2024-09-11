<?php
	include("../db_config.php");
	$response = array();

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$name = $_POST['name'];
		$major = $_POST['major'];
		$sex = $_POST['sex'];
		$age = $_POST['age'];
		$email = $_POST['email'];

		$sql = "INSERT INTO student1 (std_name,std_major,std_sex,std_age,std_email) VALUES (:name,:major,:sex,:age,:email)";
		$stmt = $db_con->prepare($sql);
		$stmt->bindParam(":name",$name);
		$stmt->bindParam(":major",$major);
		$stmt->bindParam(":sex",$sex);
		$stmt->bindParam(":age",$age);
		$stmt->bindParam(":email",$email);
		$result = $stmt->execute();
		if($result){
			$response['status'] = 'ok';
		}else{
			$response['status'] = 'error';
		}
	}
	echo json_encode($response);

?>