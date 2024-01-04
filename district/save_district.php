<?php
include("connect.php");
$dis_id = $_POST["dis_id"];
$dis_name = $_POST["dis_name"];
$pro_id = $_POST["pro_id"];
$remark = $_POST["remark"];
$sql="update district set dis_name='$dis_name',pro_id='$pro_id',remark='$remark' where dis_id='$dis_id' ";
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
			location='form_district.php';
			},1500);
			</script>
		";		}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}
mysqli_close($conn);
?>