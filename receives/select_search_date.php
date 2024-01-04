<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
<?php
				include("connect.php");
				$dat=$_POST["dat"];
				$da=$_POST["da"];
				
				$sql = "select*from covid";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
				$sql1="select a.*,b.* from products as a,
		receives as b where b.pro_id=a.pro_id and b.rdate between '$dat' and '$da'";
				
				$select = mysqli_query($conn,$sql1);
				$check_data=mysqli_num_rows($select);
				if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
			?>
<table class="table table-hover table-striped table-sm table-bordered datatable">
				<thead>
				<tr class="bg-dark tr-sm text-white">
					<th>ລຳດັບ</th>
					<th>ລະຫັດເບຍ</th>
					<th>ຊື່ເບຍ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຊື້</th>
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
					<td><?php echo $data["re_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>
					<td><?php echo $data["rqty"]; ?></td>
					<td><?php echo number_format ($data["bprice"])." ກີບ"; ?></td>
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					
					<td><?php echo $data["remark"]; ?></td>
					<td><?php echo $data["rdate"]; ?> <?php echo $data["rtime"]; ?></td>					
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
			