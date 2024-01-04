<?php
include("connect.php");
$cus_id=$_GET["cus_id"];
$sql="delete from customer where cus_id='$cus_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='select_customer.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>