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
				var user_id = $("#user_id").val();
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var gender = $("#gender").val();
				
				var pro_id = $("#pro_id").val();
				var dis_id = $("#dis_id").val();
				var vill_id = $("#vill_id").val();
				var tel = $("#tel").val();
				var status = $("#status").val();
				
				
				
			$.post("save_user.php",{
				user_id : user_id,
				fname : fname,
				lname : lname,
				gender : gender,
				
				pro_id : pro_id,
				dis_id : dis_id,
				vill_id : vill_id,
				tel : tel,
				status : status
				
				
			},
			function(a){
				$("#show").html(a);
			});
			
			});
			});
			$(function(){
					$("#pro_id").change(function(){
						var pro_id = $("#pro_id").val();
						$.post("get_districtk.php",{
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
						$.post("get_villagek.php",{
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
	<?php
	include("connect.php");
	$user_id=$_GET["user_id"];
	$sql="select a.gender,a.status,a.user_id,fname,lname,a.pro_id,b.pro_name,a.dis_id,c.dis_name,a.vill_id,d.vill_name,tel from 
users as a, province as b, district as c, village as d where a.pro_id=b.pro_id and a.dis_id=c.dis_id and 
a.vill_id=d.vill_id and a.user_id='$user_id'";   
	$select=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($select);//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
	?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header" style="background:#999999"> <center><h4><b>ຟອນແກ້ໄຂຂໍ້ມູນຜູ້ນຳໃຊ້</b></h4></center></div>
					<div class="card-body">	
					<div class="row">
					<div class="col-md-6">
						<form class="form-vertical">
							<div class="form-group">
								<label>ລະຫັດ :</label>
									<input type="text" style="border:2px solid #000000;" readonly value="<?php echo $data['user_id'];?>" class="form-control" id="user_id">
							</div>
							<div class="form-group">
								<label>ຊື່ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['fname'];?>" class="form-control" id="fname">
							</div>
							<div class="form-group">
								<label>ນາມສະກຸນ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['lname'];?>" class="form-control" id="lname">
							</div>
							<div class="form-froup">
								<label> ເພດ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="gender">
										<option value="<?php echo $data['gender'];?>">ເພດ <?php echo $data['gender'];?></option>
										<option value="ຍີງ">ຍີງ</option>
										<option value="ຊາຍ">ຊາຍ</option>
									</select>
							</div>
							
							<div class="form-froup">
								<label> ເລືອກແຂວງ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="pro_id">
										<option value="<?php echo $data['pro_id'];?>">ແຂວງ <?php echo $data['pro_name'];?></option>
									<?php
										include("connect.php");
										$sql="select pro_id,pro_name from province";
										$select=mysqli_query($conn,$sql);
										while($a=mysqli_fetch_array($select)){;//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
									?>
										<option value="<?php echo $a['pro_id'];?>"><?php echo $a['pro_name'];?></option>
									<?php
									}
									?>	
									</select>
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-froup">
								<label> ເລືອກເມືອງ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="dis_id">
										<option value="<?php echo $data['dis_id'];?>">ເມືອງ <?php echo $data['dis_name'];?></option>
									
									</select>
							</div>
							<div class="form-froup">
								<label> ເລືອກບ້ານ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="vill_id">
										<option value="<?php echo $data['vill_id'];?>">ບ້ານ <?php echo $data['vill_name'];?></option>
									
									</select>
							</div>
							<div class="form-group">
								<label>ເບີໂທ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['tel'];?>" class="form-control" id="tel">
							</div>
							<div class="form-froup">
								<label> ເລືອກສະຖານະ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="status">
										<option value="<?php echo $data['status'];?>">ສະຖານະ <?php echo $data['status'];?></option>
										<option value="ບໍລິຫານ">ບໍລິຫານ</option>
										<option value="ຜູ້ຊື້">ຜູ້ຊື້</option>
										<option value="ຜູ້ຂາຍ">ຜູ້ຂາຍ</option>
									</select>
							</div>
							<br>
														
							<div class="form-group">
								<button type="button" class="btn btn-warning" id="send"><i class="fas fa-edit"></i> ແກ້ໄຂ</button>
								<a href="select_user.php" class="btn btn-danger float-right"> <i class="fas fa-times"></i> ຍົກເລີກ</a>
								
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
			<div class="col-md-2"></div>
		</div>
		</div>
	</body>
</html> 