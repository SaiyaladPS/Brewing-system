<html>
	<head>
		<title>Form</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1"><!--ເຮັດໃຫ້ຊັບພອດກັບທຸກອຸປຸກອນ-->
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css"><!--ແມ່ນການດືງຟາຍ bootstrap ມານໍາໃຊ້-->
			<link rel="stylesheet" href="icon/css/all.min.css"><!--ແມ່ນການໄອຄອນມານໍາໃຊ້-->
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css"><!--ແມ່ນການດືງຟາຍ bootstrap ມານໍາໃຊ້-->
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css"> <!--ເອີ້ນໃຊ້ດາຕາເທ້ໂທ-->
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<script>
			$(function(){
			$("#send").click(function(){
				var cate_name = $("#cate_name").val();
				var remark = $("#remark").val();
				if(cate_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire(
							'ປ້ອນປະເພດສິນຄ້າກ່ອນ', 
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insertcategory.php",{
				cate_name : cate_name,
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
					
						$.post("search_category.php",{
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
			<div class="card">
				<div class="card-header" style="font-size:24px;"><b>ຟອມເກັບກໍາຂໍ້ມູນປະເພດສີນຄ້າ</b></div>
				<div class="card-body">
				<div class="row">
			
			<div class="col-md-4">
				<div class="card">
					
					<div class="card-body">			
						<form class="form-vertical">	
							<div class="form-group">
								
									<input type="text" placeholder="ປ້ອນປະເພດສິນຄ້າ!"  class="form-control" id="cate_name">
							
							</div>
							<div class="form-group">
								
									<textarea class="form-control" placeholder="ໝາຍເຫດ!"  id="remark"></textarea>
							</div>							
							<div class="form-group">
								<button type="button" class="btn btn-success" id="send"><i class="fas fa-download"></i> ບັນທືກ</button>
								<button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i> ລ້າງຂໍ້ມູນ</button>
								
							</div>
								
						</form>
				</div>
			
					<div>
						
					</div>	
</div>						
			</div>
			
			<div class="col-md-8">
				
				<?php
				include("connect.php");
				$sql = "select*from category where variable='1' and cate_id order by cate_id desc ";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				
				$select = mysqli_query($conn,$sql);
				$sql2="select count(cate_id) from category where variable='1'";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);

			?>
		<div class="container-fluid">
			
			
			<h5>ມີທັງໝົດ : <?php echo $data_count[0];?> ປະເພດ </h5>
			<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h5>ຄົ້ນຫາຂໍ້ມູນສີນຄ້າ</h5></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
		
			<div class="form-group">
				<label class="mx-sm-4"></label>
				<a href="restore_cate.php" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> ກູ້ຂໍ້ມູນ</a>
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
					<td><?php echo $data["cate_id"]; ?></td>
					<td><?php echo $data["cate_name"]; ?></td>					
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="update_category.php?cate_id=<?php echo $data['cate_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
						
							<i class="fas fa-edit"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_restor.php?cate_id=<?php echo $data['cate_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
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
				</div>
				<div class="card-footer"><div id="show"></div>
			</div>
				
		</div>
		
		
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>