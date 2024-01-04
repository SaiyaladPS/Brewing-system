<?php
session_start();
include("connect.php");
$pro_name = $_POST["pro_name"];
$remark = $_POST["remark"];
$user_id=$_SESSION['user_id'];
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
$sql="insert into province(pro_name,remark,user_id,recover) values('$pro_name','$remark','$user_id','1')";
$insert=mysqli_query($conn,$sql);
if($insert){
	echo"
	<script>
			Swal.fire({
				position:'center',
				icon:'success',
				title:'ບັນທືກຂໍ້ມູນສຳເລັດ',
				showConfirmButton:false,
				timer:1500,
			})
			window.setTimeout(function(){
				location.reload();
			},1500);
		</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
	}}
mysqli_close($conn);
?>