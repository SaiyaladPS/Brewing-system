<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
<?php
				include("connect.php");
				$dat=$_POST["dat"];
				$da=$_POST["da"];
				$sql1="select bill_fly,sum(amount) as amount,a.odate,count(or_id) as or_id,fname from orders as a,customer as b where a.cus_id=b.cus_id and selec='2' and a.odate between '$dat' and '$da' group by bill_fly desc";
				
				$select = mysqli_query($conn,$sql1);
				$check_data=mysqli_num_rows($select);
				if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
			?>
<table class="table table-hover table-striped table-sm datatable" id="data">
			<thead>
				<tr class="bg-dark text-white">
					<th>ລຳດັບ</th>
					<th>ເລກບີນ</th>
					<th>ລາຍຊື່ລູກຄ້າ</th>
					<th>ລາຍການ</th>
				
					<th>ເງີນລວມ</th>
					<th>ລາຍລະອຽດ</th>
					<th>ພີມບິນ</th>
			
					
				</tr>
				</thead>
				<tbody>
			
				<tr>
				<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
					<td><?php echo $a; ?></td>
					
					<td><?php echo $data["bill_fly"]; ?></td>
					<td><?php echo $data["fname"]; ?></td>
					<td><?php echo $data["or_id"]; ?></td>
				
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					<td>
					<a href="show_bin.php?bill_fly=<?php echo $data['bill_fly']; ?>" class="btn btn-sm btn-warning"> ລາຍລະອຽດ</a>
					</td>
					<td>
					<a href="print.php?bill_fly=<?php echo $data['bill_fly']; ?>" class="btn btn-success"> ພີມບິນ</a>
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
			