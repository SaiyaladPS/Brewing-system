 <?php
$server = "localhost";// ເຊີບເວີ
$user = "root";//ຊື່ user
$password = "";//ລະຫັດຜ່ານ user
$db_name = "beer_shop";//ຊື່ຖານຂໍ້ມູນທີຕ້ອງການເຊື່ອມໂຍງ
$conn = mysqli_connect($server,$user,$password,$db_name);
//ຄໍາສັ່ງທີ່ໃຊ້ໃນການເຊື່ອມໂຍງຫາຖານຂໍ້ມູນ
mysqli_set_charset($conn,"utf8");//ຄຳສັ່ງໃຫ້ຂໍ້ມູນຮອງຮັບພາສາລາວ

if($conn){
	
}else{
	echo "ການເຊື່ອມໂຍງລົ້ມແຫຼວ";
}
?>
