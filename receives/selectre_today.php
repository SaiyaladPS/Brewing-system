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
					
						$.post("search_re_today.php",{
							data:data
						},
						function(out){
							$(".show").html(out);
					});
					
					});
				});
				
				
				
			</script>
	</head>
	<body>
	<?php
		include("connect.php");
		$sum = mysqli_query($conn,"select sum(amount) from receives where rdate=curdate()");
		$check_sum = mysqli_fetch_array($sum);
		$select = "select a.*,b.* from products as a,
		receives as b where b.pro_id=a.pro_id and rdate=curdate() order by b.re_id desc";		
		$check=mysqli_query($conn,$select);
		
		if($check==""){
			echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນ</h3>";
		}else{
	?>
		<div class="contianer-fluid">
		
			
			<center><p><h4><b> ລາຍງານຂໍ້ມູນສີນຄ້າຮັບເຂົ້າມື້ນີ້ </b></h4></p></center>
			<hr>
			
			<h4><b>ຈຳນວນສີນຄ້າລວມເປັນເງີນທັງໝົດ :  <?php echo number_format($check_sum[0]);?> ກີບ </b></h4>
			
							<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h6>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h6></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			
		</form>
		<hr color="yellow">
		<div class="show">
			<table class="datatable table table-hover table-striped table-sm table-bordered">
				<thead>
				<tr class="bg-dark tr-sm text-white">
					<th>ລຳດັບ</th>
					<th>ລະຫັດສີນຄ້າ</th>
					<th>ຊື່ສີນຄ້າ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຊື້</th>
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
					<td><?php echo $data["re_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>
					<td><?php echo $data["rqty"]; ?></td>
					<td><?php echo number_format ($data["bprice"])." ກີບ"; ?></td>
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					<td><?php echo $data["remark"]; ?></td>
					<td><?php echo $data["rdate"]; ?> <?php echo $data["rtime"]; ?></td>					
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
			
		</div>
	</body>
	
</html>