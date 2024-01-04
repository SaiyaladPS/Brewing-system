<?php
include("connect.php");
$user_id = $_POST["user_id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$pro_id = $_POST["pro_id"];
$dis_id = $_POST["dis_id"];
$vill_id = $_POST["vill_id"];
$tel = $_POST["tel"];
$status = $_POST["status"];		
include("connect.php");
$sql=mysqli_query($conn,"update users set 
fname='$fname',
lname='$lname',
gender='$gender',
pro_id='$pro_id',
dis_id='$dis_id',
vill_id='$vill_id',
tel='$tel',
status='$status'
where user_id='$user_id'");

if($sql){
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
			location='select_user.php';
			},1500);
			</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}


mysqli_close($conn);
?>