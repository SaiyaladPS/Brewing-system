<?php
include("connect.php");
$cate_id = $_POST["cate_id"];
$cate_name = $_POST["cate_name"];
$remark = $_POST["remark"];
$select_cate_name="select cate_name from category where cate_name='$cate_name'";//select_cate_name ວາງຕົວປ່ຽນກວດສອບຊື່ເພື່ອບໍໃຫ້ຊ້ຳກັນ
$query=mysqli_query($conn,$select_cate_name);
$check=mysqli_num_rows($query);
	if($check<>0){
		echo"
		<script>
			swal.fire({
				position:'center',
				icon:'error',
				title:'ຊຶ່ນີ້ມີແລ້ວ',
				showConfirmButton:false,
				timer:1500,
			})
		</script>
		";
	}else{
$sql="update category set cate_name='$cate_name',remark='$remark' where cate_id='$cate_id'";
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
			location='form_category.php';
			},1500);
			</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}}
mysqli_close($conn);
?>