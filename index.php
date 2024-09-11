<?php
session_start();
include("db_config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	</title>

	<!--Boostrap Framwork-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!---------------------->

	<!--jQuery Framwork-->
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<!---------------------->

	<!--DataTable Framwork-->
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" />

	<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
	<!---------------------->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript" src="index.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('#employeeData').DataTable();
		});
	</script>

</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col">
				<h3>Manage Students Data</h3>
			</div>
			<div class="col" align="right">
				<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Data</button>
			</div>
		</div>
		
		<div class="row">
			<table class="table" id="employeeData">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Major</th>
						<th scope="col">Gender</th>
						<th scope="col">Age</th>
						<th scope="col">E-mail</th>
						<th scope="col">Manage</th>
					</tr>
				</thead>
				<tbody id="content">
					
				</tbody>
			</table>
		</div>
	</div> 

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add data students</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="name" name="name" required>
					</div>
					<div class="mb-3">
						<label for="major" class="form-label">Major</label>
						<input type="tex" class="form-control" id="major" name="major" required>
					</div>
					<div class="mb-3">
						<label for="sex" class="form-label">Gender</label>
						<input type="text" class="form-control" id="sex" name="sex" required>
					</div>
					<div class="mb-3">
						<label for="age" class="form-label">Age</label>
						<input type="number" class="form-control" id="age" name="age" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">E-mail</label>
						<input type="text" class="form-control" id="email" name="email" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" onclick="save_data()" class="btn btn-primary">Save Changes</button>	
				</div>
			</div>
		</div>
	</div>

	<!-- Edit Modal -->
	<div class="modal fade" id="editdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit data students</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="mb-3">
						<label for="name" class="form-label">Name</label>
						<input type="text" class="form-control" id="edit_name" required>
					</div>
					<div class="mb-3">
						<label for="major" class="form-label">Major</label>
						<input type="text" class="form-control" id="edit_major" required>
					</div>
					<div class="mb-3">
						<label for="sex" class="form-label">Gender</label>
						<input type="text" class="form-control" id="edit_sex" required>
					</div>
					</div>
					<div class="mb-3">
						<label for="age" class="form-label">Age</label>
						<input type="number" class="form-control" id="edit_age" required>
					</div>
					<div class="mb-3">
						<label for="email" class="form-label">E-mail</label>
						<input type="text" class="form-control" id="edit_email" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" onclick="update_data()" class="btn btn-primary">Save Changes</button>	
				</div>
			</div>
		</div>
	</div>

</body>
</html>