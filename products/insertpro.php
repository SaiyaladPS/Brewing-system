<?php
session_start();
include("connect.php");
$pro_name = $_POST["pro_name"];
$cate_id = $_POST["cate_id"];
$bprice = $_POST["bprice"];
$sprice = $_POST["sprice"];
$unit = $_POST["unit"];
$remark = $_POST["remark"];
$user_id=$_SESSION['user_id'];
	
$sql="insert into products(pro_name,cate_id,variable,bprice,sprice,unit,remark,user_id) values('$pro_name','$cate_id','1','$bprice','$sprice','$unit','$remark','$user_id')";
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
	}
	
mysqli_close($conn);
?>