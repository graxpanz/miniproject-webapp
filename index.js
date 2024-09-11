var html,data;
getData();

function getData(){
	$.ajax({
		url: 'api/getdata.php',
		type: 'POST',
		dataType: 'json',
		data: {},
	})
	.done(function(result) {
		//console.log(result.data);
		data = result.data;
		html = '';
		for(var i = 0; i<data.length; i++){
			html += `
			<tr>
			<td>${i+1}</td>
			<td>${data[i].std_name}</td>
			<td>${data[i].std_major}</td>
			<td>${data[i].std_sex}</td>
			<td>${data[i].std_age}</td>
			<td>${data[i].std_email}</td>
			<td>
			<botton onclick="openEditModal(${i})" class="btn btn-primary btn-sm">edit</botton>
			<botton onclick="delete_data(${i})" class="btn btn-danger btn-sm">delete</botton>
			</td>
			</tr>
			`;
		}
		$('#content').html(html);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}
function save_data(){
	var name = $("#name").val();
	var major = $("#major").val();
	var sex = $("#sex").val();
	var age = $("#age").val();
	var email = $("#email").val();

	if(name == "" || major == "" || sex == "" || age == "" || email == ""){
		Swal.fire({
			title: "กรุณากรอกข้อมูลให้ครบ",
			text: "",
			icon: "warning"
		});
	}else{
		$.ajax({
			url: 'api/adddata.php',
			type: 'POST',
			dataType: 'json',
			data: {
				name: name,
				major: major,
				sex: sex,
				age: age,
				email: email
			},
		})
		.done(function(result) {
			if(result.status == 'ok'){
				Swal.fire({
					title: "บันทึกข้อมูลสำเร็จ",
					text: "",
					icon: "success",
					didClose:() => {
						$("#exampleModal").modal('hide');
						getData();
					}
				});
			}else{
				Swal.fire({
					title: "บันทึกข้อมูลไม่สำเร็จ",
					text: "",
					icon: "error"
				});
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}
}

function delete_data(index){
	var id = data[index].std_id;
	var name = data[index].std_name;

	Swal.fire({
		title: "ยืนยันการลบจ้า",
		text: "ลบข้อมูล " + name,
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes"
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				url: 'api/deletedata.php',
				type: 'POST',
				dataType: 'json',
				data: {
					id: id
				},
			})
			.done(function(result) {
				//console.log("success");
				if(result.status == 'ok'){
					Swal.fire({
						title: "ลบข้อมูลสำเร็จ",
						text: "",
						icon: "success",
						didClose:() => {
							getData();
						}
					});
				}else{
					Swal.fire({
						title: "ไม่สามารถบันทึกข้อมูลได้",
						text: "",
						icon: "error",
					});
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
		}
	});
}	

function openEditModal(index){
	$('#editdata').modal('show');

	$('#edit_name').val(data[index].std_name);
	$('#edit_major').val(data[index].std_major);
	$('#edit_sex').val(data[index].std_sex);
	$('#edit_age').val(data[index].std_age);
	$('#edit_email').val(data[index].std_email);
	id = data[index].std_id;
}			

function update_data() {
	var name = $('#edit_name').val();
	var major = $('#edit_major').val();
	var sex = $('#edit_sex').val();
	var age = $('#edit_age').val();
	var email = $('#edit_email').val();

	$.ajax({
		url: 'api/updatedata.php',
		type: 'POST',
		dataType: 'json',
		data: {
			id: id,
			name : name,
			major :major,
			sex : sex,
			age :age,
			email : email
		},
	})
	.done(function(result) {
		if(result.status == 'ok'){
			Swal.fire({
				title: "แก้ไขข้อมูลสำเร็จ",
				text: "",
				icon: "success",
				didClose:() => {
					getData();
					$('#editdata').modal('hide');
				}
			});
		}else{
			Swal.fire({
				title: "ไม่สามารถแก้ไขข้อมูลได้",
				text: "",
				icon: "error",
			});
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}