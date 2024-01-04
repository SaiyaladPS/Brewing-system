<?php
	include("connect.php");
	$pro_id = $_POST['pro_id'];
	$select_name = mysqli_query($conn,"select pro_name  from products where pro_id='$pro_id' ");
	$show_name = mysqli_fetch_array($select_name);
	if($show_name){
		echo $show_name[0];
	}else{
		echo"ບໍ່ມີຊື່ສີນຄ້າ";
	}
?>