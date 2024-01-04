<?php
include("connect.php");
$vill_id=$_GET["vill_id"];
$sql="update village set recover='0' where vill_id='$vill_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='form_village.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>