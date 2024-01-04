<?php
include("Connect.php");

echo $cus_id=$_GET['cus_id'];
 $ano=$_GET['ano'];
$sql="delete from customer where cus_id='$cus_id'";
$delete = mysqli_query($conn,$sql);
if($delete){
	mysqli_query($conn,"insert bill set bill_on='$ano' ");
	echo "
	<script>
	location='form_bin.php';
	</script>
	";
}else{
	echo "
	<script>
	alert('not deleted');
	</script>
	";
}
?>
