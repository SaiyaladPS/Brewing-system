

<?php
	$sprice = $_POST['sprice'];
	$oqty = $_POST['oqty'];
	@$aa =$sprice * $oqty;
		if($sprice=='ບໍ່ມີລາຄາ'){
			echo"ບໍ່ມີລາຄາ";
		}else if($oqty=='ບໍ່ມີລາຄາ'){
			echo"ບໍ່ມີລາຄາ";
		}else if($aa){
			echo $aa;
		}else{
			echo"ປ້ອນຈໍານວນກ່ອນ";
		}
?>