<?php
include("connect.php");
$cate_id=$_GET["cate_id"];
$sql="delete from category where cate_id='$cate_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='form_category.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>