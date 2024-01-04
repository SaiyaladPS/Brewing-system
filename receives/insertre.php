<?php
session_start();
include("connect.php");
$pro_id=$_POST["pro_id"];
$bprice=$_POST["bprice"];
$rqty=$_POST["rqty"]; 
$amount=$_POST["amount"];
$remark=$_POST["remark"];
$user_id=$_SESSION['user_id'];
$insert=mysqli_query($conn,"insert into receives set pro_id='$pro_id',
bprice='$bprice',rqty='$rqty',amount='$amount',remark='$remark',
		rdate=curdate(),rtime=curtime(),user_id='$user_id'");
	if($insert){
		mysqli_query($conn,"update products set qty=qty+'$rqty',bprice='$bprice' where pro_id='$pro_id'");
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