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
					
						$.post("search_re.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
				
				
				$(function(){
					
						$(".goo").click(function(){
					var dat = $(".dat").val();
					var da = $(".da").val();
					if(dat == ""){
						Swal.fire({
							position:'center',
							icon:'error',
							title:'ປ້ອນວັນທີເລີມ',
							showConfirmButton:false,
							timer:1500,
						})
					}else if(da==""){
						Swal.fire({
							position:'center',
							icon:'error',
							title:'ປ້ອນວັນທີສີ້ນສຸດ',
							showConfirmButton:false,
							timer:1500,
						})
					}else{
						$.post("select_search_date.php",{
							dat:dat,
							da:da
						},
						function(out){
							$(".showhere").html(out);
					});
					}
					});
				});
			</script>
	</head>
	<body>
	<?php
		include("connect.php");
		$sum = mysqli_query($conn,"select sum(amount) from receives");
		$check_sum = mysqli_fetch_array($sum);
		$select = mysqli_query($conn,"select re_id,b.bill_no,b.pro_id,b.rqty,b.bprice,
		b.amount,b.remark,b.rdate,b.rtime,a.pro_name from products as a,
		receives as b where b.pro_id=a.pro_id order by b.re_id desc");		
	?>
		<div class="contianer-fluid">
		
			
			<center><p><h4><b> ລາຍງານຂໍ້ມູນສີນຄ້າຮັບເຂົ້າ </b></h4></p></center>
			<hr>
			
			<h4><b>ຈຳນວນສີນຄ້າລວມເປັນເງີນທັງໝົດ :  <?php echo number_format($check_sum[0]);?> ກີບ </b></h4>
			
							<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h6>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h6></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			
			<div class="form-group my-5">
				<label class="mx-sm-4"><h6>ຄົນຫາຂໍ້ມູນດ້ວຍວັນທີເດືອນປີ :</h6></label>
				<input type="date" class="form-control dat" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			<div class="form-group">
				<label class="mx-sm-4"><h4></h4></label>
				<input type="date" class="form-control da" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			<div class="form-group">
				<label class="mx-sm-4"></label>
				<button type="button" class="btn btn-sm btn-primary goo"><i class="fas fa-search"></i> ຄົ້ນຫາ</button>
			</div>
			
			
			
		<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="selectre.php" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> ຍົກເລີກ</a>
			</div>
			
		</form>
		<hr color="yellow">
		<div class="showhere">
			<table class="table table-hover table-striped table-sm table-bordered datatable">
				<thead>
				<tr class="bg-dark tr-sm text-white">
					<th>ລຳດັບ</th>
					<th>ລະຫັດສິນຄ້າ</th>
					<th>ຊື່ສິນຄ້າ</th>
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
			while($data=mysqli_fetch_array($select)){
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