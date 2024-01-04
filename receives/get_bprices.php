<?php
	include("connect.php");
	$pro_id = $_POST['pro_id'];
	$select_bprices = mysqli_query($conn,"select bprice from products where pro_id='$pro_id' ");
	$show_bprices = mysqli_fetch_array($select_bprices);
	if($show_bprices){
		echo $show_bprices[0];
	}else{
		echo"00";
	}
?>