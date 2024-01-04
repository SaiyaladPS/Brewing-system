 <html>
	<head>
		<title>select</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
	</head>
	
	<body >
	
	<?php
				include("connect.php");
				$sql = "select*from category";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				
				$select = mysqli_query($conn,$sql);
				$sql2="select count(cate_id) from category";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);

			?>
		<div class="container-fluid">
			<center><p><h4><b> ລາຍງານຂໍ້ມູນປະເພດສິນຄ້າ </b></h4></p></center>
			<hr>
			<h4>ມີທັງໝົດ : <?php echo $data_count[0];?> ປະເພດ </h4>
			<div class="form-group">
							
							<a href="form_category.php" class="btn btn-success"><i class="fas fa-plus-square"></i> ເພີ່ມ</a>
							
													
							</div>	
			<table class="table table-hover table-striped table-bordered table-sm">
				<tr class="bg-dark text-white tr-sm">
					<th width="60px">ລຳດັບ</th>
					<th>ລະຫັດ</th>
					<th>ຊື່ສິນຄ້າ</th>
					<th>ໝາຍເຫດ</th>
					<th width="60px">ແກ້ໄຂ</th>
					<th width="60px">ລົບ</th>
				</tr>
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
					<a href="update_category.php?cate_id=<?php echo $data['cate_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
						
							<i class="fas fa-edit"></i>
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
			?>
			</table>
			
		</div>
	</body>
	
</html>