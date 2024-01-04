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
					
						$.post("search_district_recover.php",{
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
				
				$sql1="select a.pro_id,a.pro_name,b.dis_id,b.dis_name,b.pro_id,b.remark from
				province as a,district as b where b.recover='0' and a.pro_id=b.pro_id order by b.pro_id desc";
				$select = mysqli_query($conn,$sql1);
				$sql2="select count(dis_id) from district where recover='0'";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);
                //$check_data = mysqli_num_rows($select);
	//if($check_data == 0){
	//	echo"<h3 align='center' font-family='phetsarath ot'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	//}else{

			?>
		<div class="contianer-fluid">
			
			<center><p><h4><b> ລາຍງານຂໍ້ມູນເມືອງທີຖືກລົບ </b></h4></p></center>
			<hr>
			<h4>ຈຳນວນເມືອງທີຖືກລົບມີ : <?php echo $data_count[0];?> ເມືອງ </h4>
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="form_district.php" class="btn btn-sm btn-info"><i class="fas fa-angle-double-left"></i> ກັບຄືນ</a>
			</div>
			
							
		<form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h4>ຄົ້ນຫາຂໍ້ມູນ</h4></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			
			
		</form>
		<hr color="yellow">
		<div class="showhere">
        <table class="datatable table table-hover table-striped table-sm table-bordered">
        <thead>
				<tr class="bg-dark text-white tr-sm">
					<th>ລຳດັບ</th>
					
					<th>ແຂວງ</th>
					<th>ເມືອງ</th>
					
					<th>ໝາຍເຫດ</th>
					<th width="60px">ກູ້ຄືນ</th>
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
					<a href="recover_back_district.php?dis_id=<?php echo $data['dis_id'];?>" onclick="return confirm('ທ່ານຕ້ອງການກູ້ຂໍ້ມູນບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-success">
						
							<i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_district.php?dis_id=<?php echo $data['dis_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
						<i class="fas fa-trash-alt"></i>
						</button>
					</a>
	 				</td>
				</tr>
				
			<?php
				$a++;
				}
				//}
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