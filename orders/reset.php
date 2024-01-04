<?php
include("connect.php");
$pro_id=$_GET["pro_id"];
$oqty=$_GET["oqty"];
$sql="delete from orders where pro_id='$pro_id' and selec='1' ";
$delete=mysqli_query($conn,$sql);
if($delete){
    mysqli_query($conn,"update products set qty=qty+'$oqty' where pro_id='$pro_id'");
	echo "
	<script>
	location='formor.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>