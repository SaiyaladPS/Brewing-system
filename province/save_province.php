<?php
include("connect.php");
$pro_id = $_POST["pro_id"];
$pro_name = $_POST["pro_name"];
$remark = $_POST["remark"];
$sql="update province set pro_name='$pro_name',remark='$remark' where pro_id='$pro_id'";
$insert=mysqli_query($conn,$sql);
$select_cate_name="select pro_name from province where pro_name='$pro_name'";
$query=mysqli_query($conn,$select_cate_name);
$check=mysqli_num_rows($query);
	if($check<>0){
		echo"
		<script>
			swal.fire({
				position:'center',
				icon:'error',
				title:'ແຂວງນີ້ມີແລ້ວ',
				showConfirmButton:false,
				timer:1500,
			})
		</script>
		";
	}else{
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
			location='select_provinces.php';
			},1500);
			</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}
}
mysqli_close($conn);
?>