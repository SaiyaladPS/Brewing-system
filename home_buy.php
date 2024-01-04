<?php
/*
session_start();
if(@$_SESSION['authuser']<>1){
echo"<script>alert('ກະລຸນາລ໋ອກອິນກ່ອນ');location='index.php';</script>";
}
else{
*/
?>
<html>
<style>
*{font-family:'Phetsarath OT';}
</style>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ລະບົບບໍລິຫານສາງເບຍ</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="icon/css/all.min.css">
<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
<script src="jquery.js"></script>	
	<script src="datatables/dataTables.min.js"></script> 
<script src="datatables/dataTables.bootstrap4.min.js"></script> 
<link href="datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<script>
 $(document).ready(function(){
	   $("#myTable").dataTable();
  });
</script>

</head>
<?php
						include("connect_dbstock.php");
							$sum_r = mysqli_query($conn,"select sum(amount) from receives ");
							$sum_rr = mysqli_query($conn,"select sum(amount) from receives where rdate=curdate() ");
							
							$amount_r = mysqli_fetch_array($sum_r);
							$amount_rr = mysqli_fetch_array($sum_rr);
							
							
							$maxre = mysqli_query($conn,"select pro_name from receives as a,products as b where a.pro_id=b.pro_id and rqty=(select max(rqty) from receives); ");
							$minre = mysqli_query($conn,"select pro_name from receives as a,products as b where a.pro_id=b.pro_id and rqty=(select min(rqty) from receives);");
							
							$max = mysqli_fetch_array($maxre);
							$min = mysqli_fetch_array($minre);
					
						?>
<body class="hold-transition sidebar-mini layout-fixed">
		<div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ລາຍຈ່າຍທັງໝົດ</h4>

                <p><?= number_format($amount_r[0]);?> ກີບ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="receives/selectre.php" class="small-box-footer">ລາຍຈ່າຍທັງໝົດ <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div>
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h4>ລາຍຈ່າຍໃນມື້ນີ້</h4>

                <p> <?= number_format($amount_rr[0]);?> ກີບ </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="receives/selectre_today.php" class="small-box-footer"> ລາຍຈ່າຍໃນມື້ນີ້ <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4>ສີນຄ້າທີ່ຊື້ຫຼາຍສຸດ</h4>

                <p> <?=$max['pro_name'];?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="receives/select_max_receives.php" class="small-box-footer">ສີນຄ້າທີ່ຊື້ຫຼາຍສຸດ <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4>ສີນຄ້າທີ່ຊື້ໜ້ອຍສຸດ</h4>

                <p> <?=$min['pro_name'];?> </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="receives/select_min_receives.php" class="small-box-footer"> ສີນຄ້າທີ່ຊື້ໜ້ອຍສຸດ <i class="fas fa-dollar-sign"></i></a>
            </div>
          </div>
        </div>
			<hr>
		<p><h4><b>ສາງສິນຄ້າ </b></h4></p>
	<hr>
						<?php
						include("connect_dbstock.php");
							// ນັບຈຳນວນລາຍການສິນຄ້າ
							$count = mysqli_query($conn,"select count(pro_id) from products ");
							$check_count = mysqli_fetch_array($count);
							// ດືງຂໍ້ມູນມາສະແດງຜົນ		
							$select = mysqli_query($conn,"select b.pro_id,b.variable,b.pro_name,b.qty,
							b.bprice,b.sprice,b.remark,a.cate_name,a.cate_id
							from products as b,category as a where b.variable=1 and b.cate_id=a.cate_id ");
						?>
						
						<p><b>ຈຳນວນລາຍການສິນຄ້າທັງໝົດມີ  <button class="btn btn-danger btn-sm">
						<?= $check_count[0];?></button> ລາຍການ.</b></p>
						
						<table id="myTable" class="table table-hover table-striped table-sm">
							 <thead class="thead-dark">
							<tr>
								<th>ລຳດັບ</th>
								<th>ປະເພດເບຍ</th>
								<th>ລະຫັດເບຍ</th>
								<th>ຊື່ເບຍ</th>
								<th>ຈຳນວນ</th>
								<th>ລາຄາຊື້</th>
								<th>ລາຄາຂາຍ</th>
								<th>ໝາຍເຫດ</th>
						
							</tr>
							</thead>
							<tbody>
						<?php
							$i = 1;
							while($data = mysqli_fetch_array($select)){
						?>
							<tr>
								<td><?= $i; ?></td>
								<td><?= $data['cate_name']; ?></td>
								<td><?= $data['pro_id']; ?></td>
								<td><?= $data['pro_name']; ?></td>
								<td><?= $data['qty']; ?></td>
								<td><?php echo  number_format($data['bprice'])." ກີບ"; ?></td>
								<td><?php echo  number_format($data['sprice'])." ກີບ"; ?></td>
								<td><?= $data['remark']; ?></td>
						</tr>
						
						<?php
						$i++;
						}
						?>
						</tbody>
					</table>
					

        </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>



