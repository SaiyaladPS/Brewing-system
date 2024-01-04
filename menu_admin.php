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
<link rel="stylesheet" href="icon/css/all.min.css">
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
	session_start();
	if(@$_SESSION['checked']<>1){
		echo"
			<script>
			Swal.fire({
					position:'center',
					icon:'error',
					title:'ກະລຸນາລ໋ອກອິນກ່ອນ !',
					timer: 1500
			})
			window.setTimeout(function(){
				location='index.php';
				},1500);
			</script>
		";
	}else{
?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="Homepage.php" target="frame" class="nav-link">ໜ້າຫຼັກ</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
		         <i class="fas fa-expand-arrows-alt"></i>
        
        </a>
      </li>   
	  <li class="nav-item">
        <a class="nav-link" href="#" role="button">
		<i class="fas fa-user-clock"></i>
		  ທ່ານ :
		  <?php

			echo $_SESSION['fname']."   ".$_SESSION['lname'];
		  ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button"> 
          <i class="fas fa-power-off"></i>
		  ອອກຈາກລະບົບ
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!--img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
      <span class="brand-text font-weight-light"> <i class="fas fa-store-alt"></i> ລະບົບ ສາງເບຍ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ສິນຄ້າ
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                ປະເພດສີນຄ້າ
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category/form_category.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ບັນທຶກປະເພດສີນຄ້າ</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                ຂໍ້ມູນສີນຄ້າ
                 <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="products/form_products.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ບັນທຶກຈໍານວນສີນຄ້າແຕ່ລະປະເພດ</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-shopping-cart"></i>
              <p>
                ຈໍານວນສີນຄ້ານຳເຂົ້າ
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="receives/formre.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ບັນທຶກຈໍານວນສີນຄ້ານຳເຂົ້າ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="products/select_products.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ສີນຄ້າໃນສາງ</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-tie"></i>
              <p>
                ຂໍ້ມູນລູກຄ້າ
                 <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="customer/form_customer.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ບັນທຶກລາຍຊື່ລູກຄ້າ</p>
                </a>
              </li>
              
            </ul>
          </li>
		  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-shopping-cart"></i>
              <p>
                ຈໍານວນຂາຍອອກ
                 <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="orders/formor.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ບັນທຶກຈໍານວນສີນຂາຍອອກ</p>
                </a>
              </li>
              
            </ul>
          </li>
		
			<li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-print"></i>
              <p>
                ໃບບີນ
                 <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">1</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="orders/selector.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ຂໍ້ມູນໃບບີນ</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-header"></li>
		     
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
              <p>
              ແຂວງ, ເມືອງ, ບ້ານ
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">3</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="province/form_provinces.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ຂໍ້ມູນແຂວງ</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="district/form_district.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ຂໍ້ມູນເມືອງ</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="village/form_village.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ຂໍ້ມູນບ້ານ</p>
                </a>
              </li>
            </ul>
          </li>

           
                   <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
             ຂໍ້ມູນພະນັກງານ

				<i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
			
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user/form_user.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ບັນທຶກຂໍ້ມູນພະນັກງານ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="user/select_user.php" target="frame" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ລາຍງານຂໍ້ມູນພະນັກງານ</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


	<iframe width="100%" height="100%" frameborder="0" name="frame" src="Homepage.php"></iframe>
       
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>ລະບົບບໍລິຫານສາງເບຍ (ຂະໜາດນ້ອຍ) &copy; ສົກຮຽນ 2021-2022  ພັດທະນາໂດຍ ທ້າວ ຄໍາຫຼ້າ ນາມມະວົງ ແລະ ທ້າວ ມີ ແສນທາ ນັກສຶກສາປີ 3 Tel: 020 92465779</strong>
   
    <div class="float-right d-none d-sm-inline-block">
      <b>BCT Colege  ຫຼຸ້ນທີ XIII</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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

<?php
 }
?>
<!-- update !-->

