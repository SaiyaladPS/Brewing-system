
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
<?php
				include("connect.php");
				$data=$_POST["data"];
				$sql1="select a.*,b.* from products as a,
		orders as b where b.pro_id=a.pro_id and odate=curdate() and (a.pro_id like'$data%' or a.pro_name like'$data%' or b.bill_fly like'$data%')";
				
				$select = mysqli_query($conn,$sql1);
				$check_data=mysqli_num_rows($select);
				if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
			?>
<table class="table table-hover table-striped table-sm datatable">
	<thead>
				<tr class="bg-dark text-white">
					<th>ລຳດັບ</th>
					<th>ເລກທີບີນ</th>
					<th>ລະຫັດເບຍ</th>
					<th>ຊື່ເບຍ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຂາຍ</th>
					<th>ເງີນລວມ</th>
					<th>ໝາຍເຫດ</th>
					<th>ວັນທີ ແລະ ເວລາ</th>
					
				</tr>
	</thead>
	<tbody>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					
					<td>NO: <?php echo $data["bill_fly"]; ?></td>
					<td><?php echo $data["pro_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>
					<td><?php echo $data["oqty"]; ?></td>
					<td><?php echo number_format ($data["sprice"])." ກີບ"; ?></td>
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					
					<td><?php echo $data["remark"]; ?></td>
					<td><?php echo $data["odate"]; ?> <?php echo $data["otime"]; ?></td>					
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
			