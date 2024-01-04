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
			<script src="jquery.js"></script>
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
						$.post("get_sprices.php",{
							pro_id : pro_id
						},
						function(out){
							$("#sprice").val(out).show();
					});
					});
				});
				$(function(){
					$("#oqty").keyup(function(){
						var sprice = $("#sprice").val();
						var oqty = $("#oqty").val();
						$.post("get_amount.php",{
							sprice : sprice,
							oqty : oqty
						},
						function(out){
							$("#amount").val(out).show();
					});
					});
				});
				
				$(function(){
			$("#aa").keyup(function(){
				var aa = $("#aa").val();
				var bb = $("#bb").val();
				$.post("thon.php",{
					aa : aa,
					bb : bb
				},
				function(out){
					$("#cc").val(out).show();
			});
			});
		});

			$(function(){
			$("#send").click(function(){
				var bill_fly = $("#bill_fly").val();
				var pro_id = $("#pro_id").val();
				var sprice = $("#sprice").val();
				var oqty = $("#oqty").val();
				var amount = $("#amount").val();
				
				var remark = $("#remark").val();
				if(pro_id == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire(
							'ປ້ອນລະຫັດສີນຄ້າກ້ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(pro_id == ""){ 
							Swal.fire(
							'ປ້ອນລະຫັດສີນຄ້າກ້ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(sprice == ""){ 
							Swal.fire(
							'ປ້ອນລາຄາຂາຍກ້ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(oqty == ""){ 
							Swal.fire(
							'ປ້ອນຈໍານວນກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(amount == ""){ 
							Swal.fire(
							'ປ້ອນເງີນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insertor.php",{
				bill_fly : bill_fly,
				pro_id : pro_id,
				sprice : sprice,
				oqty : oqty,
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
			
	<?php
	include("connect.php");

$sql_max=mysqli_query($conn,"select max(or_id)as id from orders");
$row_max=mysqli_fetch_row($sql_max);

$max_id=$row_max['0'];
$id1='000'.'1';  

$id2=$max_id+1;

$User_ID='';
if($max_id<1){    $User_ID=$id1;     }

else if($max_id<9){  $User_ID='000'.$id2;}  // 000.2-000.9
else if($max_id<99){  $User_ID='00'.$id2;}  // 000.2-000.9
else if($max_id<999){  $User_ID='0'.$id2;} // 0010-0099  //   0100 - 999

else if($max_id<9999){  $User_ID='0'.$id2;} 
else if($max_id<99999){  $User_ID= $id2;}
?>
			
			
	</head>
	<body>
	<div class="container-fluid">
			<div class="card">
				<div class="card-header" style="font-size:24px;"><b>ຟອນບັນທືກສີນຄ້າຂາຍອອກ   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ລາຍງານສີນຄ້າທີສັ່ງຊື້ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ລາຍງານສີນຄ້າທີສັ່ງຊື້</b>
					
				</div>
				
				<div class="card-body">
				<div class="row">
			
			<div class="col-md-3">
				<div class="card">
					
					<div class="card-body">
			<div class="row">
			
				
						<form class="form-vertical">
							<div class="form-group">
								<label>ເລກບີນ :</label>
									
									<input type="text" id="bill_fly" class="form-control form-control-border border-width-3"  value="<?php echo $User_ID;?>" readonly="readonly">

							</div>
							
							<div class="form-group">
								
									<input type="text" placeholder="ລະຫັດສິນຄ້າ!" class="form-control" id="pro_id">
							</div>
							<div class="form-group">
								
									<input type="text" readonly placeholder="ຊື່ສິນຄ້າ!" class="form-control" id="pro_name">
							</div>
							
							
							
							
							
							<div class="form-group">
								
									<input type="text" readonly placeholder="ລາຄາຂາຍ!" class="form-control" id="sprice"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							<div class="form-group">
								
									<input type="text" placeholder="ຈໍານວນ!" class="form-control" id="oqty"
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
								</form>
								</div>
				</div>
			
								
					</div>	
                </div>
                    
                    

			<div class="col-md-4">
			
            <?php
				include("connect.php");
				$sql = "select*from products";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				$sql1="select count(pro_id) from products where variable=1";//ຄຳສັງນັບຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງວ່າມີຈັກຫ້ອງ	
				$select_count=mysqli_query($conn,$sql1);//ຄຳສັງໃຫ້ທຳງານ	
				$data_count=mysqli_fetch_array($select_count);//ການສະແດງຜົນໃນຮູບແບບຂອງ array				
				$sql4="select a.pro_id,a.pro_name,a.variable,a.qty,a.bprice,a.sprice,b.cate_id,a.cate_id,b.cate_name,a.remark 
						from products as a,category as b where a.cate_id=b.cate_id and a.variable=1 order by a.pro_id desc";
				$select = mysqli_query($conn,$sql4);
							
	?>
		
		<h6><b>ຈຳນວນສີນຄ້າໃນສາງມີ : <?php echo number_format($data_count[0]);?> ລາຍການ </b></h6>
			<table class="table table-hover table-striped table-bordered table-sm datatable">
				<thead>
				<tr class="bg-dark text-white btn-sm">
					<th width="30px">ລຳດັບ</th>
					<th width="65px">ລະຫັດສີນຄ້າ</th>
					<th>ຊື່ສິນຄ້າ</th>
					<th>ຈໍານວນ</th>
					
					<th>ລາຄາຂາຍ</th>
					
					
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
					<td><?php echo $data["qty"]." ລາງ"; ?></td>
					
					<td><?php echo  number_format($data['sprice'])." ກີບ"; ?></td>
					
					
				</tr>
				
			<?php
				$a++;
				}
			?>
			</tbody>
			</table>
			</div>




			<div class="col-md-5">
			<?php
		include("connect.php");
		$sum = mysqli_query($conn,"select sum(amount) from orders where selec='1'");
		$check_sum = mysqli_fetch_array($sum);
		$count = mysqli_query($conn,"select count(or_id) from orders where selec='1'");
		$check_count = mysqli_fetch_array($count);
		$select = mysqli_query($conn,"select a.*,b.* from products as a,
		orders as b where b.pro_id=a.pro_id and selec='1' order by b.or_id desc");
		
		
	?>

	
	<h6><b>ຈຳນວນສີນຄ້າ <?php echo number_format($check_count[0]);?> ລາຍການ ລວມເປັນເງີນທັງໝົດ :  <?php echo number_format($check_sum[0]);?> ກີບ </b></h6>
		<hr color="yellow">
		<div class="showhere">
			<table class="table table-hover table-striped table-sm datatable" id="data">
			<thead>
				<tr class="bg-dark text-white">
					<th width="30px">ລຳດັບ</th>
					<th width="65px">ລະຫັດ</th>
					<th>ຊື່ສິນຄ້າ</th>
					<th width="45px">ຈໍານວນ</th>
					
					<th>ເປັນເງີນ</th>
					
					<th>ຍົກເລີກ</th>
				</tr>
				</thead>
				<tbody>
			
				<tr>
				<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
					<td><?php echo $a; ?></td>
					<td><?php echo $data["pro_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>
					<td><?php echo $data["oqty"]; ?></td>
					
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					<td width="15px">
					<a href="pay.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານຕ້ອງການຍົກເລີກລາຍການນີ້ບໍ່ ?')">
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
				<br>
			<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-6 col-sm-5">
			<?php
		include("connect.php");
		$sum = mysqli_query($conn,"select sum(amount) from orders where selec='1'");
		$check_sum = mysqli_fetch_array($sum);
		
	?>
	<div class="card">
		<div class="card-body">
						<div class="form-group">
								<input type="text" placeholder="ຈໍານວນເງີນທີຈ່າຍຕົວຈີງ!" class="form-control"  id="aa">
						</div>
						<div class="form-group">
								<label>ເງີນລວມ :</label>
									
									<input type="text" readonly class="form-control" value="<?php echo number_format($check_sum[0]).' ກີບ';?>">
							</div>
						<div class="form-group" hidden>
								<label>ເງີນລວມ :</label>
									
									<input type="text" readonly id="bb" class="form-control" value="<?php echo ($check_sum[0]);?>">
							</div>
						<div class="form-group">
								<input type="text" placeholder="ເງີນທອນ!" class="form-control" id="cc">
						</div>

		</div>
	</div>
			</div>
			<div class="col-md-4"></div>
			</div>

			<div class="col-sm-6">
                 <a href="formprint.php" class="btn btn-dark btn-sm">
                         <i class="fa fa-print"></i> ພິມ</a>
                 <a href="pay.php" class="btn btn-success btn-sm btndele" onclick="return confirm('ຕ້ອງການຊໍາລະບໍ່ ?')">
                        <i class="fa fa-money"></i> ຊຳລະ</a>
			</div>
			
		</div>
				
			</div>
			
		</div>

		</div>
				<div class="card-footer"><div id="show">
					
				</div></div>
				</div>
		</div>
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>