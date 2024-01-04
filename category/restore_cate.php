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
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
            <script>
				$(function(){
					
						$(".data").keyup(function(){
					var data = $(".data").val();
					
						$.post("search_category_restore.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
			</script>
	</head>
	
	<body >
	
	<?php
				include("connect.php");
				$sql = "select*from category where variable='0'";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				
				$select = mysqli_query($conn,$sql);
				$sql2="select count(cate_id) from category where variable='0'";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);

			?>
		<div class="container-fluid">
			<center><p><h4><b> ລາຍງານຂໍ້ມູນປະເພດສິນຄ້າທີຖືກລົບ </b></h4></p></center>
			<hr>
			<div class="form-group">
					<a href="form_category.php" class="btn btn-info"><i class="fas fa-angle-double-left"></i> ກັບຄືນ</a>				
				</div>
			<h4>ມີທັງໝົດ : <?php echo $data_count[0];?> ປະເພດ </h4>
			
			<form class="form-inline bg-white">
				<div class="form-group">
					<label class="mx-sm-4"><h5>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h5></label>
					<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
				</div>
				
			</form>
			<div class="showhere">
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