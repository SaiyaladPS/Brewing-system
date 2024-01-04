
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
<?php
				include("connect.php");
				$data = $_POST["data"];
				$sql1="select *from customer where recover='0' and (cus_id like'$data%' or fname like'$data%' or lname like'$data%') order by cus_id desc";
				$select = mysqli_query($conn,$sql1);
                $check_data = mysqli_num_rows($select);
	if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
				

			?>
		
			
			
			
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
					<a href="recover_back_cstomer.php?cus_id=<?php echo $data['cus_id'];?>">
						<button type="button" class="btn btn-sm btn-success">
						
                        <i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_customer.php?cus_id=<?php echo $data['cus_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
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
            <!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>