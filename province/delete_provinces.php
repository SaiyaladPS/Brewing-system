<?php
include("connect.php");
$pro_id=$_GET["pro_id"];
$sql="update province set recover='2' where pro_id='$pro_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='restore.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>