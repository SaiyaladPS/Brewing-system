<?php
include("connect.php");
$user_id=$_GET["user_id"];
$sql="update users set recover='1' where user_id='$user_id'";
$delete=mysqli_query($conn,$sql);

if($delete){
	echo "
	<script>
	location='restore_user.php';
	</script>
	";
}else{
	echo "ບໍ່ສາມາດລືບຂໍ້ມູນໄດ້";
}
mysqli_close($conn);
?>