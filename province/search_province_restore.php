<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
            <?php
	include("connect.php");
	$data = $_POST["data"];
	$sql = "select * from province
	where recover='0' and (pro_id like'$data%' or pro_name like'$data%') order by pro_id desc";
	$select = mysqli_query($conn,$sql);
	$check_data = mysqli_num_rows($select);
	if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
		?>
		
		
			<table class="datatable table table-hover table-striped table-sm table-bordered">
				<thead>
				<tr class="bg-dark text-white">
					<th>ລຳດັບ</th>
					<th>ລະຫັດແຂວງ</th>
					<th>ຊື່ແຂວງ</th>
					<th>ໝາຍເຫດ</th>
					<th width="60">ກູ້ຄືນ</th>
					<th width="60">ລົບ</th>
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
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="recover_back.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານຕ້ອງການກູ້ຂໍ້ມູນບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-success">
						
							<i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_provinces.php?pro_id=<?php echo $data['pro_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
							<i class="fas fa-window-close"></i>
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
			<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	