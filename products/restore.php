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
					
						$.post("search_restore.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
			</script>
	</head>
	<body>
	<?php
				include("connect.php");
				$sql = "select*from products";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				$sql1="select count(pro_id) from products where variable='0'";//ຄຳສັງນັບຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງວ່າມີຈັກຫ້ອງ				
				$sql4="select a.pro_id,a.pro_name,a.unit,a.variable,a.qty,a.bprice,a.sprice,b.cate_id,a.cate_id,b.cate_name,a.remark 
						from products as a,category as b where a.cate_id=b.cate_id and a.variable='0' order by a.pro_id desc";
				$select = mysqli_query($conn,$sql4);
				$select_count=mysqli_query($conn,$sql1);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);//ການສະແດງຜົນໃນຮູບແບບຂອງ array			
	?>
		<div class="contianer-fluid">
			
			<center><p><h4><b> ລາຍງານຂໍ້ມູນຊື່ປະເພດສີນຄ້າທີຖືກລົບ </b></h4></p></center>
			<hr>
			<h4>ຈຳນວນສີນຄ້າທີຖືກລົບມີ : <?php echo $data_count[0];?> ຢ່າງ </h4>
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="form_products.php" class="btn btn-sm btn-info"><i class="fas fa-angle-double-left"></i> ກັບຄືນ</a>
			</div>
			
							
		<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h4>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h4></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			
			
		</form>
		<hr color="yellow">
		<div class="showhere">
			<table class="table table-hover table-striped table-bordered table-sm datatable">
			<thead>
				<tr class="bg-dark text-white btn-sm">
					<th>ລຳດັບ</th>
					<th>ຊື່ເບຍ</th>
					
					<th>ຊື່ປະເພດເບຍ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຊື້</th>
					<th>ລາຄາຂາຍ</th>
					<th>ຫົວໜ່ວຍ</th>
					<th>ກູ້ຄືນ</th>
					<th>ລົບ</th>
				</tr>
				</thead>
			<tbody>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					
					
					<td><?php echo $data["pro_name"]; ?></td>
					
					<td><?php echo $data["cate_name"]; ?></td>
					<td><?php echo $data["qty"]." ລາງ"; ?></td>
					<td><?php echo  number_format($data['bprice'])." ກີບ"; ?></td>
					<td><?php echo  number_format($data['sprice'])." ກີບ"; ?></td>
					<td><?php echo $data["unit"]; ?></td>
					<td>
					<a href="resback.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານຕ້ອງການກູ້ຂໍ້ມູນບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-success">
						
							<i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_restore.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
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