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
            <!-- ຄໍາສັ່ງເຊືອມແລະສະແດງ-->
            <script>
      $(function(){
          $(".a").hide();
          $(".b").show();
          $(".c").hide();

        $(".a").click(function(){
          $(".a").show();
          $(".b").hide();
          $(".c").show();
        });

        $(".b").click(function(){
          $(".a").hide();
          $(".b").show();
          $(".c").hide();

        });
      });
    </script>
</head>
<?php
						include("connect_dbstock.php");
  					// ສະຫຼຸບນໍາເຂົ້າ
					  $sum_receives = mysqli_query($conn,"select count(re_id) from receives ");
					  	$receives = mysqli_fetch_array($sum_receives);
				 	  $sum_receives_max = mysqli_query($conn,"select count(re_id) from receives where rdate=curdate() ");
					 	 $max_receives = mysqli_fetch_array($sum_receives_max);
					// ສະຫຼຸບຂາຍອອກ
					$sum_orders = mysqli_query($conn,"select count(or_id) from orders where selec='2'");
						$orders = mysqli_fetch_array($sum_orders);
					 $sum_order_max = mysqli_query($conn,"select count(or_id) from orders where odate=curdate() and selec='2' ");
						$max_order = mysqli_fetch_array($sum_order_max);
					// ສະຫຼຸບລາຍຈ່າຍ
						$sum_r = mysqli_query($conn,"select sum(amount) from receives ");
							$amount_r = mysqli_fetch_array($sum_r);
						$sum_year = mysqli_query($conn,"select sum(amount) from receives where year(rdate)=year(curdate()) ");
							$amount_year = mysqli_fetch_array($sum_year);
             			$sum_mon = mysqli_query($conn,"select sum(amount) from receives where month(rdate)=month(curdate()) ");
							$amount_mon = mysqli_fetch_array($sum_mon);
              			$sum_week = mysqli_query($conn,"select sum(amount) from receives where week(rdate)=week(curdate()) ");
							$amount_week = mysqli_fetch_array($sum_week);
             			$sum_rr = mysqli_query($conn,"select sum(amount) from receives where rdate=curdate() ");
							$amount_rr = mysqli_fetch_array($sum_rr);
              		// ສະຫຼຸບລາຍຮັບ
						$sum_o = mysqli_query($conn,"select sum(amount) from orders where selec='2' ");
							$amount_o = mysqli_fetch_array($sum_o);
						$sum_oyear = mysqli_query($conn,"select sum(amount) from orders where year(odate)=year(curdate()) and selec='2' ");
							$amount_oyear = mysqli_fetch_array($sum_oyear);
						$sum_omonth = mysqli_query($conn,"select sum(amount) from orders where month(odate)=month(curdate()) and selec='2'");
							$amount_omonth = mysqli_fetch_array($sum_omonth);
						$sum_oweek = mysqli_query($conn,"select sum(amount) from orders where week(odate)=week(curdate()) and selec='2'");
							$amount_oweek = mysqli_fetch_array($sum_oweek);
						$sum_oo = mysqli_query($conn,"select sum(amount) from orders where odate=curdate() and selec='2'");
							$amount_oo = mysqli_fetch_array($sum_oo);
					
						?>



<body class="hold-transition sidebar-mini layout-fixed">
		<div class="container-fluid my-5">
        <div class="row">

		<div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ລາຍຮັບທັງໝົດ</h4>
                <p><?= number_format($amount_o[0]);?> ກີບ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ລາຍຮັບມື້ນີ້</h4>
                <p><?= number_format($amount_oo[0]);?> ກີບ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ລາຍຈ່າຍທັງໝົດ</h4>
                <p><?= number_format($amount_r[0]);?> ກີບ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>

		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ລາຍຈ່າຍມື້ນີ້</h4>
                <p><?= number_format($amount_rr[0]);?> ກີບ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
  				<!-- ລາຍງານສີນຄ້ານໍາເຂົ້າ-->
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ສີນຄ້ານໍາເຂົ້າທັງໝົດ</h4>
                <p><?= number_format($receives[0]);?> ລາຍການ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="receives/selectre.php" class="small-box-footer"> ຂໍ້ມູນ </a>
            </div>
          </div>

		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ສີນຄ້ານໍາເຂົ້າມື້ນີ້</h4>
                <p><?= number_format($max_receives[0]);?> ລາຍການ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="receives/selectre_today.php" class="small-box-footer"> ຂໍ້ມູນ </a>
            </div>
          </div>
  					<!-- ລາຍງານສີນຄ້າຂາຍອອກ-->
		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ສີນຄ້າສົ່ງອອກທັງໝົດ</h4>
                <p><?= number_format($orders[0]);?> ລາຍການ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="orders/selector.php" class="small-box-footer"> ຂໍ້ມູນ </a>
            </div>
          </div>

		  <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h4>ສີນຄ້າສົ່ງອອກມື້ນີ້</h4>
                <p><?= number_format($max_order[0]);?> ລາຍການ</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="orders/selector_today.php" class="small-box-footer"> ຂໍ້ມູນ </a>
            </div>
          </div>
		</div>

    
		<hr>
	<!--	<button class="a"> ເພີ່ມເຕີ່ມ </button>
		<button class="b"> ປິດ </button>
		<hr>-->
  			<div class="c">
  		<div class="row">

          <div class="col-lg-6 col-6">
            <div class="small-box">
              <div class="inner">
              <center> <h4><b>ລາຍຈ່າຍ <i class="ion ion-stats-bars"></i></b></h4><hr> </center>

                <p><h6><b>ລາຍຈ່າຍທັງໝົດ: </b><div class="float-right"><?="<font color='red'>".number_format($amount_r[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຈ່າຍປີນີ້:</b> <div class="float-right"><?= "<font color='red'>".number_format($amount_year[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຈ່າຍເດືອນນີ້: </b><div class="float-right"><?= "<font color='red'>".number_format($amount_mon[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຈ່າຍອາທິດນີ້: </b><div class="float-right"><?= "<font color='red'>".number_format($amount_week[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຈ່າຍມື້ນີ້:</b> <div class="float-right"><?= "<font color='red'>".number_format($amount_rr[0])."</font>";?> ກີບ</div></h6></p>
              </div>
              
             <!-- <a href="receives/selectre.php" class="small-box-footer"></a>-->
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box">
              <div class="inner">
               <center> <h4><b>ລາຍຮັບ <i class="ion ion-stats-bars"></i></b></h4></center>
               <hr>
                <p><h6><b>ລາຍຮັບທັງໝົດ: </b> <div class="float-right"><?= "<font color='green'>".number_format($amount_o[0])."</font>";?> ກີບ </div></h6></p><hr>
                <p><h6><b>ລາຍຮັບປີນີ້:</b><div class="float-right"> <?= "<font color='green'>".number_format($amount_oyear[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຮັບເດືອນນີ້: </b><div class="float-right"><?= "<font color='green'>".number_format($amount_omonth[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຮັບອາທິດນີ້: </b><div class="float-right"><?= "<font color='green'>".number_format($amount_oweek[0])."</font>";?> ກີບ</div></h6></p><hr>
                <p><h6><b>ລາຍຮັບມື້ນີ້:</b> <div class="float-right"><?= "<font color='green'>".number_format($amount_oo[0])."</font>";?> ກີບ</div></h6></p>
              </div>
              
              
            </div>
          </div>
          
        </div>
		</div>
						
						

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



