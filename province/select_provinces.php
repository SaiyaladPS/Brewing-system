 <html>
	<head>
		<title>select</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
			<style>
				*{font-family:phetsarath ot;}
				
			</style>
	</head>
	<body>
	<?php
				include("connect.php");
				$sql = "select*from province";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				
				$select = mysqli_query($conn,$sql);
				$sql2="select count(pro_id) from province";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);

			?>
		<div class="contianer-fluid">
			<center><p><h4><b> ລາຍງານຂໍ້ມູນແຂວງ </b></h4></p></center>
			<hr>
			<h6>ມີທັງໝົດ : <?php echo $data_count[0];?> ແຂວງ </h6>
			<div class="form-group">
							
							
							<a href="form_provinces.php" class="btn btn-success"><i class="fas fa-plus-square"></i> ເພີ່ມແຂວງ</a>
													
							</div>	
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
					<a href="delete_provinces.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
							<i class="fas fa-window-close"></i>
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
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
	
</html>