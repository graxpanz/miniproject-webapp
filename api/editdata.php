<?php
include("../db_config.php");
$id = $_GET['id'];

$sql = "SELECT * FROM student1 WHERE std_id = ?";
$stmt = $db_con->prepare($sql);
$stmt->bindParam(1,$id);
$stmt->execute();
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
	<div class="container mt-6">
		<div class ="row justify-content-center">
			<div class="col-5">
				<h3>แก้ไขข้อมูล</h3>
			</div>
		</div>
		<div class ="row justify-content-center">
			<div class="col-6">
				<form action="updatedata.php" method="POST">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control"  name="name" value="<?=$row['std_name']?>" required>
					</div>
					<div class="mb-3">
						<label for="major" class="form-label">Major</label>
						<input type="number" class="form-control" name="major" value="<?=$row['std_major']?>" required>
					</div>
					<div class="mb-3">
						<label for="sex" class="form-label">Gender</label>
						<input type="text" class="form-control"  name="sex" value="<?=$row['std_sex']?>" required>
					</div>
					<div class="mb-3">
						<label for="age" class="form-label">Age</label>
						<input type="text" class="form-control"  name="age" value="<?=$row['std_age']?>" required>
					</div>	
					<div class="mb-3">
						<label for="email" class="form-label">E-mail</label>
						<input type="text" class="form-control"  name="email" value="<?=$row['std_email']?>" required>
					</div>					
					<input type="hidden" name="student_id" value="<?=$id?>">
					<div class="d-grid">
						<button type="submit" name='submit' class="btn btn-primary">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</body>
	</html>