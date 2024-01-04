<?php
session_start();
include("connect.php");
$vill_name = $_POST["vill_name"];
$dis_id = $_POST["dis_id"];
$pro_id = $_POST["pro_id"];
$remark = $_POST["remark"];
$user_id=$_SESSION['user_id'];
$insert=mysqli_query($conn,"insert into village(vill_name,pro_id,dis_id,remark,recover,user_id)
 values('$vill_name','$pro_id','$dis_id','$remark','1','$user_id')");
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
		echo"ບໍ່ສາມາດບັນທືກຂໍ້ມູນໄດ້";
	}
mysqli_close($conn);
?> 