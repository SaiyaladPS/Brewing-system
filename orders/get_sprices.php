<?php
	include("connect.php");
	$pro_id = $_POST['pro_id'];
	$select_sprices = mysqli_query($conn,"select sprice from products where pro_id='$pro_id' ");
	$show_sprices = mysqli_fetch_array($select_sprices);
	if($show_sprices){
		echo $show_sprices[0];
	}else{
		echo"00";
	}
?>