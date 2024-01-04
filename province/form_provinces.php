<html>
	<head>
		<title>Form</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<script>
			$(function(){
			$("#send").click(function(){
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
			$.post("inser_province.php",{
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
			<script>
				$(function(){
					
						$(".data").keyup(function(){
					var data = $(".data").val();
					
						$.post("search_province.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
			</script>
	</head>
	<body class="my-5">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header" <center><h4><b>ຟອມບັນທືກແຂວງ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-vertical">	
							<div class="form-group">
								<label><b></b></label>
									<input type="text" placeholder="ຊື່ແຂວງ...." class="form-control" id="pro_name">
							
							</div>
							<div class="form-group">
								<label><b></b></label>
									<textarea class="form-control" placeholder="ໝາຍເຫດ...." id="remark"></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-success" id="send"><i class="fas fa-download"></i> ບັນທືກ</button>
								<button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> ລ້າງຂໍ້ມູນ</button>
							</div>
								
						</form>
				</div>
			
					<div class="card-footer">
						<div id="show"></div>
					</div>	
</div>						
			</div>
			<div class="col-md-8">
			<?php
				include("connect.php");
				$sql = "select*from province where recover='1'";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				
				$select = mysqli_query($conn,$sql);
				$sql2="select count(pro_id) from province where recover='1' ";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);

			?>
		<div class="contianer-fluid">
			<center><p><h4><b> ລາຍງານຂໍ້ມູນແຂວງ </b></h4></p></center>
			<hr>
			<h4>ມີທັງໝົດ : <?php echo $data_count[0];?> ແຂວງ </h4>
			<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h5>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h5></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
		
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="restore.php" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> ກູ້ຂໍ້ມູນ</a>
			</div>
		</form>
							<div class="showhere">
			<table class="datatable table table-hover table-striped table-sm table-bordered">
				<thead>
				<tr class="bg-dark text-white">
					<th>ລຳດັບ</th>
					<th>ລະຫັດແຂວງ</th>
					<th>ຊື່ແຂວງ</th>
					<th>ໝາຍເຫດ</th>
					<th width="60">ແກ້ໄຂ</th>
					<th width="60">ລົບ</th>
				</tr>
				</thead>

				<tbody>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					<td><?php echo $data["pro_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>					
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="update_provinecs.php?pro_id=<?php echo $data['pro_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
						
							<i class="fas fa-edit"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_recover.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
						<i class="fas fa-trash-alt"></i>
						</button>
					</a>
	 				</td>
				</tr>
				
			<?php
				$a++;
				}
			?>
			</tbody>
			</table>
			</div>
		</div>
			</div>
		</div>
		</div>
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>