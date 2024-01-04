<?php
include("connect.php");
$pro_id = $_POST["pro_id"];
$pro_name = $_POST["pro_name"];
$cate_id = $_POST["cate_id"];
$qty = $_POST["qty"];
$bprice = $_POST["bprice"];
$sprice = $_POST["sprice"];
$unit = $_POST["unit"];
$remark = $_POST["remark"];
$sql="update products set pro_name='$pro_name',cate_id='$cate_id',qty='$qty',bprice='$bprice',sprice='$sprice',unit='$unit',remark='$remark' where pro_id='$pro_id'";
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
			location='form_products.php';
			},1500);
			</script>
		";		
}else{
	echo"ບໍ່ສາມາດບັນທືກໄດ້";
}
mysqli_close($conn);
?>