<?php
include("connect.php");
$vill_id=$_GET["vill_id"];
$sql="delete from village where vill_id='$vill_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='select_village.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>