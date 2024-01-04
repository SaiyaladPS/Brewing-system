<?php
include("connect.php");
$cus_id = $_POST["cus_id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$tel = $_POST["tel"];
$remark = $_POST["remark"];
$sql="update customer set fname='$fname',lname='$lname',tel='$tel',remark='$remark' where cus_id='$cus_id'";
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
			location='form_customer.php';
			},1500);
			</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}
mysqli_close($conn);
?>