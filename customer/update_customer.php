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
				
				var cus_id = $("#cus_id").val();
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var tel = $("#tel").val();
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
						}else{
			$.post("save_customer.php",{
				cus_id : cus_id,
				fname : fname,
				lname : lname,
				tel : tel,
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
	$cus_id=$_GET["cus_id"];
	$sql="select * from customer where cus_id='$cus_id'";
	$select=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($select);//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
	?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header" style="background:#999999"> <center><h4><b>ຟອມບັນທືກລາຍຊື່ລູກຄ້າ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-vertical">
							
							<div class="form-group">
								<label>ລະຫັດ :</label>
									<input type="text" readonly style="border:2px solid #000000;" value="<?php echo $data['cus_id'];?>" class="form-control" id="cus_id">
							</div>
							
							<div class="form-group">
								<label>ຊື່ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['fname'];?>" class="form-control" id="fname">
							</div>
							<div class="form-group">
								<label>ນາມສະກູນ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['lname'];?>" class="form-control" id="lname">
							</div>
							<div class="form-group">
								<label>ເບີໂທ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['tel'];?>" class="form-control" id="tel">
							</div>
							<div class="form-group">
								<label>ໝາຍເຫດ :</label>
									<textarea class="form-control" style="border:2px solid #000000;" id="remark"><?php echo $data['remark'];?></textarea>
							</div>							
							<div class="form-group">
							
								<button type="button" class="btn btn-warning" id="send"><i class="fas fa-edit"></i> ແກ້ໄຂ</button>
								<a href="form_customer.php" class="btn btn-danger float-right"> <i class="fas fa-times"></i> ຍົກເລີກ</a>
								
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