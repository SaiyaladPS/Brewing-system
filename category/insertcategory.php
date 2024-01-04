<?php
session_start();
include("connect.php");
$cate_name = $_POST["cate_name"];
$remark = $_POST["remark"];
$user_id=$_SESSION['user_id'];
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
$sql="insert into category(cate_name,variable,remark,user_id) values('$cate_name','1','$remark','$user_id')";
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