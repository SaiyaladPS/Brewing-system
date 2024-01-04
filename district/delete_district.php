<?php
include("connect.php");
$dis_id=$_GET["dis_id"];
$sql="delete from district where dis_id='$dis_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='select_district.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>