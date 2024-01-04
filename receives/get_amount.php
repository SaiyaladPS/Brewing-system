
<?php
	$bprice = $_POST['bprice'];
	$rqty = $_POST['rqty'];
	@$aa =$bprice * $rqty;
		if($bprice==' ບໍ່ມີລາຄາ'){
			echo"ບໍ່ມີລາຄາ";
		}else if($aa){
			echo $aa;
		}else{
			echo"ປ້ອນຈໍານວນກ່ອນ";
		}
?>