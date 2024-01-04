<?php
	session_start();//ປະກາດນຳໃຊ້ session_start
	//ລ້າງຂໍ້ມູນຂອງຄົນທີລ໋ອກອີນເຂົ້າມາ
	unset($_SESSION['user_id']);
	unset($_SESSION['fname']);
	unset($_SESSION['lname']);
	session_destroy();
	
	header("location:index.php");
	exit;
?>