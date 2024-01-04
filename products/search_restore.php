<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
<?php
	include("connect.php");
	$data = $_POST["data"];
	$sql = "select a.pro_id,a.unit,a.pro_name,a.variable,a.cate_id,a.qty,a.bprice,a.sprice,
	a.remark,b.cate_id,b.cate_name from products as a,category as b 
	where a.cate_id=b.cate_id and a.variable='0' and (a.pro_id like'$data%' or a.pro_name like'$data%') order by a.pro_id desc";
	$select = mysqli_query($conn,$sql);
	$check_data = mysqli_num_rows($select);
	if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
		?>
<table class="table table-hover table-striped table-bordered table-sm datatable">
				<thead>
				<tr class="bg-dark text-white btn-sm">
					<th>ລຳດັບ</th>
					<th>ຊື່ສີນຄ້າ</th>
					
					<th>ຊື່ປະເພດສີນຄ້າ</th>
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
					<td><?php echo $data["qty"]." ລາງ"; ?></td>
					<td><?php echo  number_format($data['bprice'])." ກີບ"; ?></td>
					<td><?php echo  number_format($data['sprice'])." ກີບ"; ?></td>
					<td><?php echo $data["unit"]; ?></td>
					<td>
					<a href="updatepro.php?pro_id=<?php echo $data['pro_id'];?>">
						<button type="button" class="btn btn-sm btn-success">
						
							<i class="fas fa-undo"></i>
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
				}
			?>
			</tbody>
			</table>
			<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
	