<?php
include("connect.php");
$vill_id = $_POST["vill_id"];
$vill_name = $_POST["vill_name"];
$dis_id = $_POST["dis_id"];
$pro_id = $_POST["pro_id"];
$remark = $_POST["remark"];
$sql="update village set vill_name='$vill_name',dis_id='$dis_id',pro_id='$pro_id',remark='$remark' where vill_id='$vill_id' ";
$insert=mysqli_query($conn,$sql);
if($insert){
	echo"
	<script>
				Swal.fire({
				position:'center',
				icon:'success',
				title:'ແກ້ໄຂສຳເລັດ', 
				showConfirmButton:false,
				timer:1500,
			})	
			window.setTimeout(function(){
			location='form_village.php';
			},1500);
			</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}
mysqli_close($conn);
?>