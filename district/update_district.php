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
				var dis_id = $("#dis_id").val();
				var dis_name = $("#dis_name").val();
				var pro_id = $("#pro_id").val();
				var remark = $("#remark").val();
				if(dis_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire( 
							'ປ້ອນຊື່ເມືອງກ່ອນ',
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
			$.post("save_district.php",{
				dis_id : dis_id,
				dis_name : dis_name,
				pro_id : pro_id,
				remark : remark
			},
			function(a){
				$("#show").html(a);
			});
			}
			});
			});
			</script>
	</head>
	<body class="my-5">
		
	<?php
	include("connect.php");
	$dis_id=$_GET["dis_id"];
	$sql="select a.pro_id,a.pro_name,b.dis_id,b.dis_name,b.pro_id,b.remark from
				province as a,district as b where a.pro_id=b.pro_id and b.dis_id='$dis_id'";
	$select=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($select);//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
	?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header" style="background:#999999"> <center><h4><b>ຟອນແກ້ໄຂເມືອງ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-vertical">
							
							<div class="form-group">
								<label>ລະຫັດເມືອງ :</label>
									<input type="text" style="border:2px solid #000000;" readonly value="<?php echo $data['dis_id'];?>" class="form-control" id="dis_id">
							</div>
							<div class="form-group">
								<label>ຊື່ເມືອງ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['dis_name'];?>" class="form-control" id="dis_name">
							</div>
							<div class="form-froup">
								<label> ຊື່ແຂວງ :</label>
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
							<div class="form-group">
								<label>ໝາຍເຫດ :</label>
									<textarea class="form-control" style="border:2px solid #000000;" id="remark"><?php echo $data['remark'];?></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-warning" id="send"><i class="fas fa-edit"></i> ແກ້ໄຂ</button>
								<a href="form_district.php" class="btn btn-danger float-right"> <i class="fas fa-times"></i> ຍົກເລີກ</a>
								
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