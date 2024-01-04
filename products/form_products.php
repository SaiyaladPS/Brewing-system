<html>
	<head>
		<title>Form</title>
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
			$("#send").click(function(){
				var pro_name = $("#pro_name").val();
				var cate_id = $("#cate_id").val();
				
				var bprice = $("#bprice").val();
				var sprice = $("#sprice").val();
				var unit = $("#unit").val();
				var remark = $("#remark").val();
				if(pro_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire(
							'ປ້ອນຊື່ເບຍກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(bprice==""){
							Swal.fire(
							'ປ້ອນລາຄາຊື້ກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(sprice==""){
							Swal.fire(
							'ປ້ອນລາຄາຂາຍກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insertpro.php",{
				pro_name : pro_name,
				cate_id : cate_id,
				
				bprice : bprice,
				sprice : sprice,
				unit : unit,
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
					
						$.post("search_production.php",{
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
		<div class="container-fluid">
		<div class="row">	
		<div class="card">
		<div class="card-header" style="font-size:24px;"><b> ຟອມເກັບກໍາຂໍ້ມູນສີນຄ້າ</b></div>
				<div class="card-body">
				<div class="row">
				<div class="col-md-4">
						<form accept="utf-8" id="uploadForm" action="insertpro.php" method="post" enctype="multipart/form-data" accept="utf-8">
							<div class="form-group">
								
									<input type="text" placeholder="ປ້ອນຊື່ສິນຄ້າ!" class="form-control" id="pro_name">
							</div>
							<div class="form-froup">
								<label> ເລືອກປະເພດສິນຄ້າ :</label>
									<select class="form-control" id="cate_id">
										
									<?php
										include("connect.php");
										$sql="select cate_id,cate_name from category";
										$select=mysqli_query($conn,$sql);
										while($data=mysqli_fetch_array($select)){;//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
									?>
										<option value="<?php echo $data['cate_id'];?>"><?php echo $data['cate_name'];?></option>
									<?php
									}
									?>	
									</select>
							</div>
							
							<br>
							
							<div class="form-group">
								
									<input type="text" placeholder="ປ້ອນລາຄາຊື້!" class="form-control" id="bprice"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>
							<div class="form-group">
								
									<input type="text" placeholder="ປ້ອນລາຄາຂາຍ!" class="form-control" id="sprice"
									onKeyUp="if(isNaN(this.value)){ Swal.fire({
					position: 'center',
					icon: 'error',
					title: 'ກະລຸນາປ້ອນຕົວເລກ',
					showConfirmButton: false,
					timer: 1500
					}); this.value='';}">
							</div>

							<div class="form-group">
								<select name="unit" id="unit" class="form-control">
									<option value="">ເລືອກຫົວໜ່ວຍ</option>
									<option value="ລາງ">ລາງ</option>
									<option value="ແກັດ">ແກັດ</option>
								</select>
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
			<div class="col-md-8">
				<?php
				include("connect.php");
				$sql = "select*from products";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				$sql1="select count(pro_id) from products where variable=1";//ຄຳສັງນັບຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງວ່າມີຈັກຫ້ອງ				
				$sql4="select a.pro_id,a.pro_name,a.unit,a.variable,a.qty,a.bprice,a.sprice,b.cate_id,a.cate_id,b.cate_name,a.remark 
						from products as a,category as b where a.cate_id=b.cate_id and a.variable=1 order by a.pro_id desc";
				$select = mysqli_query($conn,$sql4);
				$select_count=mysqli_query($conn,$sql1);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);//ການສະແດງຜົນໃນຮູບແບບຂອງ array			
	?>
		<div class="contianer-fluid">
			
			
			<h5>ຈຳນວນສີນຄ້າທັງໝົດມີ : <?php echo $data_count[0];?> ລາຍການ </h5>
			<div class="form-group">
														
							</div>
							<br>
		<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h5>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h5></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
		
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="restore.php" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> ກູ້ຂໍ້ມູນ</a>
			</div>
		</form>
		
		<div class="showhere">
			<table class="table table-hover table-striped table-bordered table-sm datatable">
			<thead>
				<tr class="bg-dark text-white btn-sm">
					<th>ລຳດັບ</th>
					<th>ຊື່ສິນຄາ້</th>
					
					<th>ຊື່ປະເພດສິນຄ້າ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຊື້</th>
					<th>ລາຄາຂາຍ</th>
					<th>ຫົວໜ່ວຍ</th>
					<th>ແກ້ໄຂ</th>
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
					<td><?php echo $data["qty"]; ?></td>
					<td><?php echo  number_format($data['bprice'])." ກີບ"; ?></td>
					<td><?php echo  number_format($data['sprice'])." ກີບ"; ?></td>
					<td><?php echo $data["unit"]; ?></td>
					<td>
					<a href="updatepro.php?pro_id=<?php echo $data['pro_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
						
							<i class="fas fa-edit"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="deletepro.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
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
			</div>
				</div>
				</div>
				<div class="card-footer"><div id="show"></div></div>
		</div>
		</div>
		</div>
		
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>