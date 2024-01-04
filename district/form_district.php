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
				
				var pro_id = $("#pro_id").val();
				var dis_name = $("#dis_name").val();
				var remark = $("#remark").val();
				if(dis_name == ""){
							//alert("ປ້ອນຊື່ກ່ອນ...");
							Swal.fire( 
							'ປ້ອນຊື່ເມືອງກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else if(pro_id == ""){
							Swal.fire(
							'ປ້ອນຊື່ເມືອງກ່ອນ',
							'ກົດ ok ເພື່ອອອກຈາກໜ້າຕ່າງ',
							'warning'
							)
						}else{
			$.post("insertdistrict.php",{
				pro_id : pro_id,
				dis_name : dis_name,
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
					
						$.post("search_district.php",{
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
				<div class="card">
					<div class="card-header"> <center><h4><b>ຟອມບັນທືກເມືອງ</b></h4></center></div>
					<div class="card-body">			
						<form class="form-veriacal">
							
							
							<div class="form-group">
								<label></label>
									<select class="form-control" id="pro_id">
										<option value="">ເລືອກແຂວງ</option>
									<?php
										include("connect.php");
										$sql="select pro_id,pro_name from province where recover='1'";
										$select=mysqli_query($conn,$sql);
										while($data=mysqli_fetch_array($select)){;//ເປັນຕົວກຳນົດທີໃຊ້ໃນການເອົາຂໍ້ມູນມາສະແດງຜົນ
									?>
										<option value="<?php echo $data['pro_id'];?>"><?php echo $data['pro_name'];?></option>
									<?php
									}
									?>	
									</select>
							</div>
							<div class="form-group">
								<label></label>
									<input type="text" placeholder="ປ້ອນຊື່ເມືອງ" class="form-control" id="dis_name">
							</div>
							<div class="form-group">
								<label></label>
									<textarea class="form-control" placeholder="ໝາຍເຫດ" id="remark"></textarea>
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
			<?php
				include("connect.php");
				
				$sql1="select a.pro_id,a.pro_name,b.dis_id,b.dis_name,b.pro_id,b.remark from
				province as a,district as b where b.recover='1' and a.pro_id=b.pro_id order by b.pro_id desc";
				$select = mysqli_query($conn,$sql1);
				$sql2="select count(dis_id) from district where recover='1'";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);

			?>
		<div class="contianer-fluid">
			<center><p><h4><b> ລາຍງານຂໍ້ມູນເມືອງ </b></h4></p></center>
			<hr>
			<h5>ມີທັງໝົດ : <?php echo $data_count[0];?> ເມືອງ </h5>
			<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h4>ຄົ້ນຫາຂໍ້ມູນ</h4></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			
			
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="restore.php" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i> ກູ້ຂໍ້ມູນ</a>
			</div>
		</form>
		<div class="showhere">
			<table class="table table-hover table-striped table-bordered table-sm datatable">
				<thead>
				<tr class="bg-dark text-white tr-sm">
					<th>ລຳດັບ</th>
					
					<th>ແຂວງ</th>
					<th>ເມືອງ</th>
					
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
					
					<td><?php echo $data["pro_name"]; ?></td>	
					<td><?php echo $data["dis_name"]; ?></td>					
									
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="update_district.php?dis_id=<?php echo $data['dis_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
						
							<i class="fas fa-edit"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_recover.php?dis_id=<?php echo $data['dis_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
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
		<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	</body>
</html>