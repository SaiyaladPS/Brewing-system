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
	
	<body >
	
	<?php
				include("connect.php");
				$data=$_POST["data"];
				$sql = "select*from category where variable='0' and (cate_id like'$data%')";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				$select = mysqli_query($conn,$sql);
				$check_data = mysqli_num_rows($select);
	if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{

			?>
		<div class="container-fluid">
			
			<table class="table table-hover table-striped table-bordered table-sm datatable">
				<thead>
				<tr class="bg-dark text-white tr-sm">
					<th width="60px">ລຳດັບ</th>
					<th>ລະຫັດ</th>
					<th>ຊື່ສິນຄ້າ</th>
					<th>ໝາຍເຫດ</th>
					<th width="60px">ກູ້ຄືນ</th>
					<th width="60px">ລົບ</th>
				</tr>
				</thead>
				<tbody>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					<td><?php echo $data["cate_id"]; ?></td>
					<td><?php echo $data["cate_name"]; ?></td>					
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="res_category.php?cate_id=<?php echo $data['cate_id'];?>">
						<button type="button" class="btn btn-sm btn-success">
						
							<i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_category.php?cate_id=<?php echo $data['cate_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
							<i class="fas fa-window-close"></i>
						</button>
					</a>
	 				</td>
				</tr>
				
			<?php
				$a++;
				}
				}
				
			?>
			</tbody>
			</table>
			
		</div>
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
	
</html>