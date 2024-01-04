<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
<?php
	include("connect.php");
	$data = $_POST["data"];
	$sql = "select a.pro_id,a.pro_name,a.cate_id,b.rqty,
	a.sprice,b.re_id,b.bill_no,b.rdate,b.rtime,b.pro_id,b.bprice,
	b.amount,b.remark from products as a,receives as b where a.pro_id=b.pro_id and (b.re_id like'$data%' or a.pro_name like'$data%')";
	$select = mysqli_query($conn,$sql);
	$check_data = mysqli_num_rows($select);
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
			