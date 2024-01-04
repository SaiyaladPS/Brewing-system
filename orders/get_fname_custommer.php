<?php
	include("connect.php");
	$cus_id = $_POST['cus_id'];
	$select_name = mysqli_query($conn,"select fname  from customer where recover='1' and cus_id='$cus_id' ");
	$show_name = mysqli_fetch_array($select_name);
	if($show_name){
		echo $show_name[0];
	}else{
		echo"0";
	}
?>