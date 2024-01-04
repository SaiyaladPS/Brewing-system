<?php
include("connect.php");
$cus_id=$_GET["cus_id"];
$sql="update customer set recover='1' where cus_id='$cus_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='restore_customer.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>