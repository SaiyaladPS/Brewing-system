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
			$("#send").click(function(){
				
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var tel = $("#tel").val();
				var remark = $("#remark").val();
				if(fname == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire( 
							'ປ້ອນຊື່ກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(lname == ""){
							Swal.fire(
							'ປ້ອນນາມສະກຸນກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(tel == ""){
							Swal.fire(
							'ປ້ອນເບີໂທກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insert_customer.php",{
				fname : fname,
				lname : lname,
				tel : tel,
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
					
						$.post("search_custommer.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
			</script>
	</head>
	<body class="my-5">
		<div class="container-fluid">
		<div class="row">
			
			<div class="col-md-4">
				<div>
					<div class="card-header"> <center><h4><b>ຟອມບັນທືກລາຍຊື່ລູກຄ້າ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-vertical">
							<div class="form-group">
								<label></label>
									<input type="text" placeholder="ຊື່!" class="form-control" id="fname">
							</div>
							<div class="form-group">
								<label></label>
									<input type="text" placeholder="ນາມສະກຸນ!" class="form-control" id="lname">
							</div>
							<div class="form-group">
								<label></label>
									<input type="text" placeholder="ເບີໂທ!" class="form-control" id="tel">
							</div>
							<div class="form-group">
								<label></label>
									<textarea class="form-control" placeholder="ໝາຍເຫດ!" id="remark"></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-success" id="send"><i class="fas fa-download"></i> ບັນທືກ</button>
								<button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> ລ້າງຂໍ້ມູນ</button>
							</div>							
						</form>
				</div>
				
					<div class="card-footer">
						<div id="show"></div>
					</div>				
			</div>
			</div>
			<div class="col-md-8">
			
		
			<center><p><h4><b> ລາຍງານລາຍຊື່ລູກຄ້າ </b></h4></p></center>
			<hr>
			<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h5>ຄົ້ນຫາຂໍ້ມູນລູກຄ້າ</h5></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
		
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="restore_customer.php" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> ກູ້ຂໍ້ມູນ</a>
			</div>
		</form>
		<?php
				include("connect.php");
				
				$sql1="select *from customer where recover='1' and cus_id order by cus_id desc";
				$select = mysqli_query($conn,$sql1);
				$check_data = mysqli_num_rows($select);
				$sql2="select count(cus_id) from customer where recover='1'";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);
				if($check_data == 0){
					echo"<h3 style='font-family:phetsarath ot' align='center'>ບໍ່ມີຂໍ້ມູນທີ່ຖືກລືບ</h3>";
				}else{

			?>
			<h5>ລູກຄ້າມີທັງໝົດ : <?php echo $data_count[0];?> ຄົນ </h5>
			<div class="showhere">
			<table class="table table-hover table-striped table-bordered table-sm datatable">
			<thead>
				<tr class="bg-dark text-white tr-sm">
					<th width="40px">ລຳດັບ</th>
					<th width="80px">ລະຫັດລູກຄ້າ</th>
					
					<th>ຊື່</th>
					<th>ນາມສະກູນ</th>
					<th>ເບີໂທ</th>
					<th>ໝາຍເຫດ</th>
					<th width="60px">ແກ້ໄຂ</th>
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
					
					<td><?php echo $data["cus_id"]; ?></td>	
					<td><?php echo $data["fname"]; ?></td>	
					<td><?php echo $data["lname"]; ?></td>					
					<td><?php echo $data["tel"]; ?></td>					
									
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="update_customer.php?cus_id=<?php echo $data['cus_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
						
							<i class="fas fa-edit"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_recover_customer.php?cus_id=<?php echo $data['cus_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
						<i class="fas fa-trash-alt"></i>
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
			</div>
		</div>
		</div>
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>