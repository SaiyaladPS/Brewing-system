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
				var pro_id = $("#pro_id").val();
				var pro_name = $("#pro_name").val();
				var remark = $("#remark").val();
				if(pro_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire(
							'ປ້ອນຊື່ແຂວງກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("save_province.php",{
				pro_id : pro_id,
				pro_name : pro_name,
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
	$pro_id=$_GET["pro_id"];
	$sql="select * from province where pro_id='$pro_id'";
	$select=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($select);//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
	?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header text-white" style="background:#999999"> <center><h4><b>ຟອນແກ້ໄຂແຂວງ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-vertical">	
							<div class="form-group">
								<label>ລະຫັດແຂວງ :</label>
									<input type="text" readonly style="border:2px solid #000000;" value="<?php echo $data['pro_id'];?>" class="form-control" id="pro_id">
							</div>
							<div class="form-group">
								<label>ຊື່ແຂວງ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['pro_name'];?>" class="form-control" id="pro_name">
							</div>
							<div class="form-group">
								<label>ໝາຍເຫດ :</label>
									<textarea class="form-control" style="border:2px solid #000000;" id="remark"><?php echo $data['remark'];?></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-warning" id="send"><i class="fas fa-edit"></i> ແກ້ໄຂ</button>
								<a href="form_provinces.php" class="btn btn-danger float-right"> <i class="fas fa-times"></i> ຍົກເລີກ</a>
								
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