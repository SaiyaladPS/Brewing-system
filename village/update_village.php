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
				var vill_id = $("#vill_id").val();
				var vill_name = $("#vill_name").val();
				var pro_id = $("#pro_id").val();
				var dis_id = $("#dis_id").val();
				
				var remark = $("#remark").val();
				if(vill_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire( 
							'ປ້ອນຊື່ບ້ານກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(pro_id == ""){
							Swal.fire(
							'ປ້ອນຊື່ເມືອງກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("save_village.php",{
				vill_id : vill_id,
				vill_name : vill_name,
				pro_id : pro_id,
				dis_id : dis_id,
				
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
						$.post("get_districtt.php",{
							pro_id : pro_id
						},
						function(out){
							$("#dis_id").html(out).show();
					});
					});
				});
			</script>
	</head>
	<body class="my-5">
	<?php
	include("connect.php");
	$vill_id=$_GET["vill_id"];
	$sql="select a.pro_id,a.pro_name,b.dis_id,b.dis_name,c.vill_id,c.vill_name,c.pro_id,c.dis_id,c.remark from
				province as a,district as b,village as c where a.pro_id=c.pro_id and b.dis_id=c.dis_id and c.vill_id='$vill_id'";
	$select=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($select);//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
	?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header" style="background:#999999"> <center><h4><b>ຟອນແກ້ໄຂບ້ານ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-vertical">
							<div class="form-group">
								<label>ລະຫັດບ້ານ :</label>
									<input type="text" style="border:2px solid #000000;" readonly value="<?php echo $data['vill_id'];?>" class="form-control" id="vill_id">
							</div>

							<div class="form-group">
								<label>ຊື່ບ້ານ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['vill_name'];?>" class="form-control" id="vill_name">
							</div>
							<div class="form-froup">
								<label> ຊື່ແຂວງ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="pro_id">
										<option value="<?php echo $data['pro_id'];?>"> <?php echo $data['pro_name'];?></option>
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
							<div class="form-froup">
								<label> ຊື່ເມືອງ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="dis_id">
										<option value="<?php echo $data['dis_id'];?>">ເມືອງ <?php echo $data['dis_name'];?></option>
									
									</select>
							</div>
							
							<div class="form-group">
								<label>ໝາຍເຫດ :</label>
									<textarea class="form-control" style="border:2px solid #000000;" id="remark"><?php echo $data['remark'];?></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-warning" id="send"><i class="fas fa-edit"></i> ແກ້ໄຂ</button>
								<a href="form_village.php" class="btn btn-danger float-right"> <i class="fas fa-times"></i> ຍົກເລີກ</a>
								
							</div>
															
						</form>
				</div>
			
					<div class="card-footer" style="background:#999999">
						<div id="show"></div>
					</div>				
			</div>
			</div>
			<div class="col-md-3"></div>
		</div>
		</div>
	</body>
</html> 