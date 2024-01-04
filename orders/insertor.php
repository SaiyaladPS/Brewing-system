<?php
session_start();
include("connect.php");
$cus_id=$_POST["cus_id"];
$bill_fly=$_POST["bill_fly"];
$pro_id=$_POST["pro_id"];
$sprice=$_POST["sprice"];
$oqty=$_POST["oqty"]; 
$amount=$_POST["amount"];
$remark=$_POST["remark"];
$user_id=$_SESSION['user_id'];
$qtyy = mysqli_query($conn,"select qty from products where pro_id='$pro_id' ");
$check_qty = mysqli_fetch_array($qtyy);
$check = $check_qty[0];
if($check < $oqty){
	echo"
		<script>
			Swal.fire({
				position:'center',
				icon:'warning',
				title:'ສີນຄ້າບໍ່ພໍຂາຍ',
				showConfirmButton:false,
				timer:1500,
			})
			window.setTimeout(function(){
				location.reload();
			},1500);
		</script>
		";	
}else{
$insert=mysqli_query($conn,"insert into orders set pro_id='$pro_id',bill_fly='$bill_fly',
sprice='$sprice',oqty='$oqty',amount='$amount',remark='$remark',cus_id='$cus_id',selec='1',
		odate=curdate(),otime=curtime(),user_id='$user_id'");
	if($insert){
		mysqli_query($conn,"update products set qty=qty-'$oqty',sprice='$sprice' where pro_id='$pro_id'");
		mysqli_query($conn,"update orders set bill_fly='$bill_fly' where selec='1'");
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
mysqli_close($conn);
?> 