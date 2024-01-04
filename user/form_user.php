<html>
	<head>
		<title>Form</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<script>
			$(function(){
			$("#send").click(function(){
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var gender = $("#gender").val();
				var dob = $("#dob").val();
				var pro_id = $("#pro_id").val();
				var dis_id = $("#dis_id").val();
				var vill_id = $("#vill_id").val();
				var tel = $("#tel").val();
				var status = $("#status").val();
				var username = $("#username").val();
				var password = $("#password").val();
				var cpassword = $("#cpassword").val();
				var remark = $("#remark").val();
				if(fname == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire( 
							'ປ້ອນຊື່ກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(lname == ""){
							Swal.fire(
							'ປ້ອນນາມສະກຸນກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(gender == ""){
							Swal.fire(
							'ເລືອກເພດກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(dob == ""){
							Swal.fire(
							'ປ້ອນວັນເດືອນປີເກີດກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(pro_id == ""){
							Swal.fire(
							'ເລືອກແຂວງກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(dis_id == ""){
							Swal.fire(
							'ເລືອກເມືອງກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(vill_id == ""){
							Swal.fire(
							'ເລືອກບ້ານກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(tel == ""){
							Swal.fire(
							'ປ້ອນເບີໂທກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(status == ""){
							Swal.fire(
							'ເລືອກສະຖານະກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(username == ""){
							Swal.fire(
							'ປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(password == ""){
							Swal.fire(
							'ປ້ອນລະຫັດກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(cpassword == ""){
							Swal.fire(
							'ຢຶນຢັນລະຫັດກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insertuser.php",{
				fname : fname,
				lname : lname,
				gender : gender,
				dob : dob,
				pro_id : pro_id,
				dis_id : dis_id,
				vill_id : vill_id,
				tel : tel,
				status : status,
				username : username,
				password : password,
				cpassword : cpassword,
				remark : remark
			},
			function(a){
				$("#show").html(a);
			});
			}
			});
			});
			
			$(function(){
					$("#pro_id").change(function(){
						var pro_id = $("#pro_id").val();
						$.post("get_district.php",{
							pro_id : pro_id
						},
						function(out){
							$("#dis_id").html(out).show();
					});
					});
				});
				$(function(){
					$("#dis_id").change(function(){
						var dis_id = $("#dis_id").val();
						$.post("get_village.php",{
							dis_id : dis_id
						},
						function(out){
							$("#vill_id").html(out).show();
					});
					});
				});
			</script>
	</head>
	<body class="my-5">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header" style="background:#999999"> <center><h4><b>ຟອນບັນທືກຂໍ້ມູນຜູ້ນຳໃຊ້</b></h4></center></div>
					<div class="card-body">	
					<div class="row">
					<div class="col-md-4">
						<form class="form-vertical">
							<div class="form-group">
								<label>ຊື່ :</label>
									<input type="text" style="border:2px solid #000000;" placeholder="ປ້ອນຊື່...." class="form-control" id="fname">
							</div>
							<div class="form-group">
								<label>ນາມສະກຸນ :</label>
									<input type="text" style="border:2px solid #000000;" placeholder="ປ້ອນນາມສະກຸນ...." class="form-control" id="lname">
							</div>
							<div class="form-froup">
								<label> ເພດ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="gender">
										<option value="">ເລືອກເພດ</option>
										<option value="ຍີງ">ຍີງ</option>
										<option value="ຊາຍ">ຊາຍ</option>
									</select>
							</div>
							<div class="form-group">
								<label>ວັນເດືອນປີເກີດ :</label>
									<input type="date" style="border:2px solid #000000;" class="form-control" id="dob">
							</div>
							<div class="form-froup">
								<label> ເລືອກແຂວງ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="pro_id">
										<option value="">ເລືອກແຂວງ</option>
									<?php
										include("connect.php");
										$sql="select pro_id,pro_name from province where recover='1'";
										$select=mysqli_query($conn,$sql);
										while($data=mysqli_fetch_array($select)){;//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
									?>
										<option value="<?php echo $data['pro_id'];?>"><?php echo $data['pro_name'];?></option>
									<?php
									}
									?>	
									</select>
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-froup">
								<label> ເລືອກເມືອງ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="dis_id">
										<option value="">ເລືອກເມືອງ</option>

									</select>
							</div>
							<div class="form-froup">
								<label> ເລືອກບ້ານ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="vill_id">
										<option value="">ເລືອກບ້ານ</option>
										
									</select>
							</div>
							<div class="form-group">
								<label>ເບີໂທ :</label>
									<input type="text" style="border:2px solid #000000;" placeholder="ປ້ອນເບີໂທ...." class="form-control" id="tel">
							</div>
							<div class="form-froup">
								<label> ເລືອກສະຖານະ :</label>
									<select style="border:2px solid #000000;" class="form-control" id="status">
										<option value="">ເລືອກສະຖານະ</option>
										<option value="ບໍລິຫານ">ບໍລິຫານ</option>
										<option value="ຜູ້ຊື້">ຜູ້ຊື້</option>
										<option value="ຜູ້ຂາຍ">ຜູ້ຂາຍ</option>
									</select>
							</div>
							<div class="form-group">
								<label>ຊື່ຜູ້ນຳໃຊ້ :</label>
									<input type="text" style="border:2px solid #000000;" placeholder="ປ້ອນຊື່ຜູ້ໃຊ້...." class="form-control" id="username">
							</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<label>ລະຫັດ :</label>
									<input type="password" style="border:2px solid #000000;" placeholder="********" class="form-control" id="password">
							</div>
							<div class="form-group">
								<label>ຢືນຢັນ :</label>
									<input type="password" style="border:2px solid #000000;" placeholder="********" class="form-control" id="cpassword">
							</div>
							<div class="form-group">
								<label>ໝາຍເຫດ :</label>
									<textarea class="form-control" style="border:2px solid #000000;" id="remark"></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-success" id="send"><i class="fas fa-save"></i>ບັນທືກ</button>
								<button type="reset" class="btn btn-danger"><i class="fas fa-window-close"></i>ລ້າງຂໍ້ມູນ</button>
							</div>
							<div class="form-group">
							<button type="button" class="text-white">
							<a href="select_user.php"><i class="fas fa-file-alt"></i> ໜ້າລາຍງານ</a>
							</button>						
							</div>								
						</form>				
				</div>
				</div>
				</div>
				
					<div class="card-footer" style="background:#999999">
						<div id="show"></div>
					</div>				
					</div>				
			</div>
			<div class="col-md-1"></div>
		</div>
		</div>
	</body>
</html> 