<html>
	<head>
		<title>Form</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
			<script>
				$(function(){
					$("#pro_id").keyup(function(){
						var pro_id = $("#pro_id").val();
						$.post("get_prodname.php",{
							pro_id : pro_id
						},
						function(out){
							$("#pro_name").val(out).show();
					});
					});
				});
				$(function(){
					$("#pro_id").keyup(function(){
						var pro_id = $("#pro_id").val();
						$.post("get_bprices.php",{
							pro_id : pro_id
						},
						function(out){
							$("#bprice").val(out).show();
					});
					});
				});
				$(function(){
					$("#rqty").keyup(function(){
						var bprice = $("#bprice").val();
						var rqty = $("#rqty").val();
						$.post("get_amount.php",{
							bprice : bprice,
							rqty : rqty
						},
						function(out){
							$("#amount").val(out).show();
					});
					});
				});
				
			$(function(){
			$("#send").click(function(){
				var pro_id = $("#pro_id").val();
				var bprice = $("#bprice").val();
				var rqty = $("#rqty").val();
				var amount = $("#amount").val();
				var remark = $("#remark").val();
				if(pro_id == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire(
							'ປ້ອນລະຫັດສີນຄ້າກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(pro_id == ""){ 
							Swal.fire(
							'ປ້ອນລະຫັດສີນຄ້າກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(rqty == ""){ 
							Swal.fire(
							'ປ້ອນຈໍານວນກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(amount == ""){ 
							Swal.fire(
							'ປ້ອນຈໍານວນກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insertre.php",{
				pro_id : pro_id,
				bprice : bprice,
				rqty : rqty,
				amount : amount,
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
	<div class="container-fluid">
			<div class="card">
				<div class="card-header" style="font-size:24px;"><b>ຟອນບັນທືກສີນຄ້ານໍາເຂົ້າ</b></div>
				<div class="card-body">
					<div class="row">
					<div class="col-md-4">
				<div class="card">
					
					<div class="card-body">
			
				
						<form class="form-vertical">
							<div class="form-group">
								
									
									<input type="text" hidden id="bill_no" class="form-control form-control-border border-width-3"  value="<?php echo $User_ID;?>" readonly="readonly">

							</div>
							<div class="form-group">
								
									<input type="text" placeholder="ລະຫັດສີນຄ້າ!" class="form-control" id="pro_id">
							</div>
							<div class="form-group">
								
									<input type="text" readonly placeholder="ຊື່ສີນຄ້າ!" class="form-control" id="pro_name">
							</div>
							
							
							
							<div class="form-group">
								
									<input type="text" readonly placeholder="ລາຄາຊື້!" class="form-control" id="bprice"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							
							<div class="form-group">
								
									<input type="text" placeholder="ຈໍານວນ!" class="form-control" id="rqty"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							<div class="form-group">
								
									<input type="text" readonly placeholder="ເງີນລວມ!" class="form-control" id="amount"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							<div class="form-group">
								
									<textarea class="form-control" placeholder="ໝາຍເຫດ!" id="remark"></textarea>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-success" id="send"><i class="fas fa-download"></i> ບັນທືກ</button>
								<button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> ລ້າງຂໍ້ມູນ</button>
								
							</div>	
								
								</div>
								
								
						</form>
				</div>
			
					
					<div class="card-footer">
						<div id="show"></div>
					</div>				
					</div>				
			
			<div class="col-md-8">
			<?php
		include("connect.php");
		$sql1="select count(re_id) from receives";//ຄຳສັງນັບຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງວ່າມີຈັກຫ້ອງ	
		$select_count=mysqli_query($conn,$sql1);//ຄຳສັງໃຫ້ທຳງານ	
		$data_count=mysqli_fetch_array($select_count);//ການສະແດງຜົນໃນຮູບແບບຂອງ array
		$sum = mysqli_query($conn,"select sum(amount) from receives");
		$check_sum = mysqli_fetch_array($sum);
		$select = mysqli_query($conn,"select re_id,b.pro_id,b.rqty,b.bprice,
		b.amount,b.remark,b.rdate,b.rtime,a.pro_name from products as a,
		receives as b where b.pro_id=a.pro_id order by b.re_id desc");		
	?>
		<div class="contianer-fluid">
		
			
			
			
			<h6><b>ຈຳນວນສີນຄ້າມີ : <?php echo number_format($data_count[0]);?> ລາຍການ ແລະ ລວມເປັນເງີນທັງໝົດ :  <?php echo number_format($check_sum[0]);?> ກີບ </b></h6>
			
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
						<div class="row">
							<div class="col-md-12" id="s">
								<h6>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h6>
								<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
							</div>
							<div class="col-md-4" id="s1">
								<h6>ວັນທີເລີ່ມຕົ້ນ :</h6>
								<input type="date" class="form-control dat">
							</div>
							<div class="col-md-4" id="s2">
								<h6>ວັນທີສຸດທ້າຍ :</h6>
								<input type="date" class="form-control da">
							</div>
							<div class="col-md-4" id="s3" style="margin-top:27px;">
								<button type="button" class="btn btn-primary goo float-right"><i class="fas fa-search"></i> ສະຫຼຸບ</button>
							</div>
						</div>
					</form>
					</div>
					<div class="col-md-2">
						<button class="btn btn-outline-primary" id="buttonsearch">search</button>
						<button class="btn btn-outline-danger" id="salou">ສະຫຼຸບ</button>
					</div>
			</div>
			
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
					
					<td><?php echo $data["pro_id"]; ?></td>
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
		</div>
			</div>
					</div>
				</div>
				<div class="card-footer"><div id="show"></div></div>
			</div>
	</div>
		
			
			
		
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>