 <html>
	<head>
		<title>select</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			
			
			<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
			
			<script src="bootstrap-3.3.5-dist/js/jquery.min.js"></script>
			<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
			
			<style>
			body{font-family:phetsarath OT;}
			
			</style>


	</head>
		<body>

<?php
$user_id=$_GET['user_id'];
include("connect.php");
$b=mysqli_query($conn,"select * from users as a,province as b,district as c,village as d where
a.pro_id=b.pro_id and a.dis_id=c.dis_id and a.vill_id=d.vill_id and a.user_id='$user_id'");
$a = mysqli_fetch_array($b);

?>


<div class="container-fulid">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<br>
<div class="panel panel-danger">
<div class="panel panel-body">

<center>
<h3><b>ລາຍລະອຽດທັງໝົດ</b></h3>
</center>
<h4><b>ລະຫັດຜູ້ນຳໃຊ້ :</b>
<?=$a['0'];?> </h4>

<h4><b>ຊື່ ແລະ ນາມສະກຸນ :</b>
<?=$a['fname'];?> <?=$a['lname'];?> </h4>

<h4><b>ເພດ :</b>
<?=$a['gender'];?> </h4>
</h4>

<h4><b>ວັນເດືອນປີເກີດ :</b>
<?=$a['dob'];?> </h4>

<h4><b>ຊື່ຜູ້ນຳໃຊ້ :</b>
<?=$a['username'];?> </h4>
<h4><b>ສິດທິ :</b>
<?=$a['status'];?> </h4>
</h4>

<h4><b>ທີ່ຢູ່ :</b>
<?=$a['pro_name'];?>, <?=$a['dis_name'];?>, <?=$a['vill_name'];?></h4>

<h4><b>ເບີໂທ :</b>
<?=$a['tel'];?> </h4>
<p align="right">
<a href="select_user.php"><button class="btn btn-default"><i class="fas fa-reply-all"></i>ກັບຄືນ</button><a>
</p>
					

</div>
</div>
</div>
<div class="col-md-3"></div>
</div>
</div>
</div>
</body>
</html>