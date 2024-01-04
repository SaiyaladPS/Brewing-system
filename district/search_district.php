<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
            <?php
	include("connect.php");
	$data = $_POST["data"];
	$sql = "select a.pro_id,a.pro_name,b.dis_id,b.dis_name,b.pro_id,b.remark from
    province as a,district as b where b.recover='1' and a.pro_id=b.pro_id and (b.dis_id like'$data%' or b.dis_name like'$data%' or a.pro_name like'$data%') order by b.dis_id desc";
	$select = mysqli_query($conn,$sql);
	$check_data = mysqli_num_rows($select);
	if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
		?>
		
		
			<table class="datatable table table-hover table-striped table-sm table-bordered">
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
				}
			?>
			</tbody>
			</table>
			<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	