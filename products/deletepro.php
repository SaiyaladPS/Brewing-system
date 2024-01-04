<?php
include("connect.php");
$pro_id=$_GET["pro_id"];
$sql="update products set variable='0' where pro_id='$pro_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='form_products.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>