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
				var cate_id = $("#cate_id").val();
				var qty = $("#qty").val();
				var bprice = $("#bprice").val();
				var sprice = $("#sprice").val();
				var unit = $("#unit").val();
				var remark = $("#remark").val();
				if(pro_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire(
							'ປ້ອນຊື່ເບຍກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(qty==""){
							Swal.fire(
							'ປ້ອນຈໍານວນກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(bprice==""){
							Swal.fire(
							'ປ້ອນລາຄາຊື້ກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(sprice==""){
							Swal.fire(
							'ປ້ອນລາຄາຂາຍກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("savepro.php",{
				pro_id : pro_id,
				pro_name : pro_name,
				cate_id : cate_id,
				qty : qty,
				bprice : bprice,
				sprice : sprice,
				unit : unit,
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
	$sql="select a.pro_id,a.pro_name,a.unit,a.cate_id,b.cate_id,b.cate_name,a.qty,a.bprice,a.sprice,a.remark 
	from category as b,products as a where a.cate_id=b.cate_id and a.pro_id='$pro_id'";
	$select=mysqli_query($conn,$sql);
	$data=mysqli_fetch_array($select);//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
	?>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="card" style="border:2px solid #000000;background:#cccccc">
					<div class="card-header" style="background:#999999"> <center><h4><b>ຟອນແກ້ໄຂຂໍ້ມູນສິນຄ້າ</b></h4></center></div>
					<div class="card-body">
			<div class="row">
			<div class="col-md-6">
				
						<form accept="utf-8" id="uploadForm" action="savepro.php" method="post" enctype="multipart/form-data" accept="utf-8">
							
							<div class="form-group">
								<label>ລະຫັດສິນຄ້າ :</label>
									<input type="text" style="border:2px solid #000000;"  readonly value="<?php echo $data['pro_id'];?>" class="form-control" id="pro_id">
							</div>
							<div class="form-group">
								<label>ຊື່ສິນຄ້າ :</label>
								
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['pro_name'];?>" class="form-control" id="pro_name">
							</div>
							
							
							
							
							
							<div class="form-froup">
								<label> ເລືອກປະເພດສິນຄ້າ :</label>
									<select class="form-control" style="border:2px solid #000000;" id="cate_id">
										<option value="<?php echo $data['cate_id'];?>"><?php echo $data['cate_name'];?></option>
									<?php
										include("connect.php");
										$sql="select cate_id,cate_name from category";
										$select=mysqli_query($conn,$sql);
										while($a=mysqli_fetch_array($select)){;//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
									?>
										<option value="<?php echo $a['cate_id'];?>"><?php echo $a['cate_name'];?></option>
									<?php
									}
									?>	
									</select>
							</div>
							<div class="form-group">
								<label>ຈໍານວນ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['qty'];?>" class="form-control" id="qty"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							
							
							<div class="form-group">
								<label>ລາຄາຊື້ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['bprice'];?>" class="form-control" id="bprice"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							
							</div>
						<div class="col-md-6">
						
							
							<div class="form-group">
								<label>ລາຄາຂາຍ :</label>
									<input type="text" style="border:2px solid #000000;" value="<?php echo $data['sprice'];?>" class="form-control" id="sprice"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							<div class="form-group">
							<label> ເລືອກຫົວໜ່ວຍ :</label>
								<select name="unit" id="unit" style="border:2px solid #000000;" class="form-control">
									<option value="<?php echo $data['unit'];?>"><?php echo $data['unit'];?></option>
									<option value="ລາງ">ລາງ</option>
									<option value="ແກັດ">ແກັດ</option>
								</select>
							</div>
							<div class="form-group">
								<label>ໝາຍເຫດ :</label>
									<textarea class="form-control" style="border:2px solid #000000;" id="remark"><?php echo $data['remark'];?></textarea>
							</div>
							
							<div class="form-group">
								<button type="button" class="btn btn-warning" id="send"><i class="fas fa-edit"></i> ແກ້ໄຂ</button>
								<a href="form_products.php" class="btn btn-danger float-right"> <i class="fas fa-times"></i> ຍົກເລີກ</a>
								
							</div>							
							</div>
							
						</form>
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