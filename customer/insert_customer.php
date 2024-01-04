<?php
session_start();
include("connect.php");
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$tel = $_POST["tel"];
$remark = $_POST["remark"];
$user_id=$_SESSION['user_id'];
$insert=mysqli_query($conn,"insert into customer(fname,lname,tel,remark,recover,user_id)
 values('$fname','$lname','$tel','$remark','1','$user_id')");
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