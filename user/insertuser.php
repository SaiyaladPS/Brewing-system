<?php
include("connect.php");
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$dob = $_POST["dob"];
$pro_id = $_POST["pro_id"];
$dis_id = $_POST["dis_id"];
$vill_id = $_POST["vill_id"];
$tel = $_POST["tel"];
$status = $_POST["status"];
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$remark = $_POST["remark"];
	if($password <> $cpassword){
		echo"ລະຫັດບໍ່ກົງກັນ";
	}else{
		$check=mysqli_query($conn,"select username from users where username='$username'");
		$check_name=mysqli_num_rows($check);
		if($check_name<>0){
			echo "ຊື່ນີ້້ມີແລ້ວ ! ກາລຸນາປ້ອນຊື່ໃໝ່";
		}else{
	
$insert=mysqli_query($conn,"insert into users set fname='$fname',
lname='$lname',gender='$gender',dob='$dob',pro_id='$pro_id',
dis_id='$dis_id',vill_id='$vill_id',tel='$tel',status='$status',
username='$username',password=password('$password'),recover='1',remark='$remark',date=curdate()");
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
	}
	}
mysqli_close($conn);
?> 