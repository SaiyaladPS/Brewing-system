<?php
include("connect.php");
$or_id=$_GET["or_id"];
$sql="update orders set selec='2' where selec='1'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='formor.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດຊໍາລະເງີນໄດ້";
}
mysqli_close($conn);
?>





