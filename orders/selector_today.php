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
					
						$.post("search_or_today.php",{
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
		$sum = mysqli_query($conn,"select sum(amount) from orders where odate=curdate()");
		$check_sum = mysqli_fetch_array($sum);
		$select = "select a.*,b.* from products as a,
		orders as b where b.pro_id=a.pro_id and odate=curdate() order by b.or_id desc";	
		$check=mysqli_query($conn,$select);
		
		if($check==""){
			echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນ</h3>";
		}else{
	?>
		<div class="contianer-fluid">
		
			
			<center><p><h4><b> ລາຍງານຂໍ້ມູນຂາຍອອກ </b></h4></p></center>
			
			<hr>
			
			<h4><b>ຈຳນວນສີນຄ້າລວມເປັນເງີນທັງໝົດ :  <?php echo number_format($check_sum[0]);?> ກີບ </b></h4>
			
							<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h6>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h6></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			
		</form>
		<hr color="yellow">
		
		<div class="showhere">
			<table class="table datatable table-hover table-striped table-sm">
				<thead>
				<tr class="bg-dark text-white">
					<th>ລຳດັບ</th>
					<th>ເລກທີບີນ</th>
					<th>ລະຫັດເບຍ</th>
					<th>ຊື່ເບຍ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຂາຍ</th>
					<th>ເງີນລວມ</th>
					<th>ໝາຍເຫດ</th>
					<th>ວັນທີ ແລະ ເວລາ</th>
					
				</tr>
				</thead>
				<tbody>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($check)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					
					<td>NO: <?php echo $data["bill_fly"]; ?></td>
					<td><?php echo $data["pro_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>
					<td><?php echo $data["oqty"]; ?></td>
					<td><?php echo number_format ($data["sprice"])." ກີບ"; ?></td>
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					
					<td><?php echo $data["remark"]; ?></td>
					<td><?php echo $data["odate"]; ?> <?php echo $data["otime"]; ?></td>					
				</tr>
				
			<?php
				$a++;
				}
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