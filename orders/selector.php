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
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jquery.js"></script>
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
			
			
			
			<script>
				$(function(){
					
						$(".data").keyup(function(){
					var data = $(".data").val();
					
						$.post("search_or.php",{
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
			<script>
  // ເອີ້ນໃຊ້ ດາຕ້າເທໂບ້ ມາໃຊ້ງານ ຮ່ວມກັບ ຕາຕະລາງ
         $(function(){
            $('#data').DataTable();

            // $('#data').DataTable({

            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering":true,
            //     "info": true,
            //     "autoWidth": false,
            // });
        });
    </script>
	</head>
	<body class="mx-sm-2">
	<?php
		include("connect.php");
		$sql1="select count(or_id) from orders where selec='2'";//ຄຳສັງນັບຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງວ່າມີຈັກຫ້ອງ	
		$select_count=mysqli_query($conn,$sql1);//ຄຳສັງໃຫ້ທຳງານ	
		$data_count=mysqli_fetch_array($select_count);//ການສະແດງຜົນໃນຮູບແບບຂອງ array
		$sum = mysqli_query($conn,"select sum(amount) from orders where selec='2'");
		$check_sum = mysqli_fetch_array($sum);
		$select = mysqli_query($conn,"select bill_fly,sum(amount) as amount,count(or_id) as or_id,fname from orders as a,customer as b where a.cus_id=b.cus_id and selec='2' group by bill_fly desc");	
	?>
		<center><p><h4><b>ລາຍງານສີນຄ້າຂາຍອອກ</b></4></p></center>
			
			<h6><b>ຈຳນວນສີນຄ້າມີ: <?php echo number_format($data_count[0]);?> ລາຍການ ແລະ ລວມເປັນເງີນທັງໝົດ :  <?php echo number_format($check_sum[0]);?> ກີບ </b></h6>
				
			<div class="row">
			<script>
				$(function(){
					$("#s").show();
					$("#buttonsearch").hide();
					$("#s1").hide();
					$("#s2").hide();
					$("#s3").hide();
					$("#salou").show();
					
					$("#salou").click(function(){
						$("#s").hide();
						$("#buttonsearch").show();
						$("#s1").show();
						$("#s2").show();
						$("#s3").show();
						$("#salou").hide();
					});
					
					$("#buttonsearch").click(function(){
						$("#s").show();
						$("#buttonsearch").hide();
						$("#s1").hide();
						$("#s2").hide();
						$("#s3").hide();
						$("#salou").show();
					});
				});
			</script>
					<div class="col-md-10">
					<form class="form-inline bg-white">
						<div class="row mx-sm-4">
							
							<div class="col-md-12" id="s">
								<h6>ຄົ້ນຫາ</h6>
								<input type="text" class="form-control data" placeholder="ຄົ້ນຫາຂໍ້ມູນ...">
							</div>
							<div class="col-md-4" id="s1">
								<h6>ວັນທີເລີ່ມຕົ້ນ :</h6>
								<input type="date" class="form-control dat" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
							</div>
							<div class="col-md-1">

							</div>
							<div class="col-md-4" id="s2">
								<h6>ວັນທີສີ້ນສຸດ :</h6>
								<input type="date" class="form-control da" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
							</div>
							<div class="col-md-3" id="s3" style="margin-top:27px;">
								<button type="button" class="btn btn-primary goo float-right"><i class="fas fa-search"></i> ສະຫຼຸບ</button>
							</div>
						</div>
					</form>
					</div>
					
					<div class="col-md-2">
						<button class="btn btn-outline-primary" id="buttonsearch">ຄົ້ນຫາ</button>
						<button class="btn btn-outline-danger" id="salou">ສະຫຼຸບ</button>
					</div>
			</div>
			
			
			
		<hr color="yellow">
		<div class="showhere">
			<table class="table table-hover table-striped table-sm datatable" id="data">
			<thead>
				<tr class="bg-dark text-white">
					<th>ລຳດັບ</th>
					<th>ເລກບີນ</th>
					<th>ຊື່ລູກຄ້າ</th>
					<th>ລາຍການ</th>
					<th>ເງີນລວມ</th>
					<th>ລາຍລະອຽດ</th>
					<th>ພີມບິນ</th>
				</tr>
				</thead>
				<tbody>
			
				<tr>
				<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
					<td><?php echo $a; ?></td>
					
					<td><?php echo $data["bill_fly"]; ?></td>
					<td><?php echo $data["fname"]; ?></td>
					<td><?php echo $data["or_id"]; ?></td>
				
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					<td>
					<a href="show_bin.php?bill_fly=<?php echo $data['bill_fly']; ?>" class="btn btn-sm btn-warning"> ລາຍລະອຽດ</a>
					</td>
					<td>
					<a href="print.php?bill_fly=<?php echo $data['bill_fly']; ?>" class="btn btn-sm btn-success"> ພີມບິນ</a>
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
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
	
</html>