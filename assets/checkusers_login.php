<html>
<head>
<title>ກວດສອບການເຂົ້າໃຊ້ງານ</title>
<style>
*{font-family:phetsarath OT;}
</style>
	<meta charset="utf-8" http-equiv="content-teyp" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="icon/css/all.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
	<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="jquery.js"></script>
<script>
$(function(){
		$("#go").click(function(){ // ເມື່ອກົດໃສ່ປູ່ມທີ່ມີ class ຊື່ວ່າ go
		var data1 = $("#data1").val(); // ວາງຕົວປ່ຽນ data ຮັບເອົາຂໍ້ມູນຈາກບ່ອກທີມີ class ຊື່ວ່າ data
		var data2 = $("#data2").val(); // ວາງຕົວປ່ຽນ data ຮັບເອົາຂໍ້ມູນຈາກບ່ອກທີມີ class ຊື່ວ່າ data
	$.post("ສະຫຼຸບການເຂົ້າໃຊ້ງານ.php",{ // ສົ່ງຂໍ້ມູນໄປຫາຟາຍ search_products.php
		data1:data1,
		data2:data2
	},
	function(out){
		$("#show_data").html(out).show(); // ໃຫ້ມາລາຍງານ div ທີ່ມີ class ຊື່ວ່າ show_data
	});
	});
});
$(function(){
		$("#go").click(function(){ // ເມື່ອກົດໃສ່ປູ່ມທີ່ມີ class ຊື່ວ່າ go
		var data1 = $("#data1").val(); // ວາງຕົວປ່ຽນ data ຮັບເອົາຂໍ້ມູນຈາກບ່ອກທີມີ class ຊື່ວ່າ data
		var data2 = $("#data2").val(); // ວາງຕົວປ່ຽນ data ຮັບເອົາຂໍ້ມູນຈາກບ່ອກທີມີ class ຊື່ວ່າ data
	$.post("ສະຫລຸບ.php",{ // ສົ່ງຂໍ້ມູນໄປຫາຟາຍ search_products.php
		data1:data1,
		data2:data2
	},
	function(out){
		$("#show_data1").html(out).show(); // ໃຫ້ມາລາຍງານ div ທີ່ມີ class ຊື່ວ່າ show_data
	});
	});
});
$(function(){
    $('#truncate').on ('click',function(e){
		e.preventDefault();
		const href=$(this).attr('href')
		Swal.fire({
		title: 'ທ່ານຕ້ອງການລ້າງຂໍ້ມູນ ຫຼື ບໍ?',
		text:'ຂໍ້ມູນຜູ້ນຳໃຊ້ທີ່ເຄິຍເຂົ້າໃຊ້ງານລະບົບໃນໄລຍະຜ່ານມາຈະຖືກລ້າງອອກຢ່າງຖາວອນ ເຊິ່ງຈະບໍ່ສາມາດກູ້ຄືນໄດ້ ກະລຸນາຕ້ອງການດຳເນີນຕໍ່ ຫຼື ບໍ ! 🔺 ຖ້າບໍ່ໝັ້ນໃຈໃຫ້ກົດ (ຍົກເລີກ)',
		showCancelButton: true,
		cancelButtonColor: '#0000FF',
		confirmButtonColor: '#FF0000',
		cancelButtonText:'ຍົກເລີກ',
		confirmButtonText:'ລ້າງຂໍ້ມູນ',
		}).then((result)=>{
		if(result.value){
		document.location.href = href;
		};
		});
	});
});

$(function(){
	$("#search").keyup(function(){
		var search=$("#search").val();
		$.post("search_select_display.php",{
			search:search
		},
		function(out){
			$("#showme").html(out);
		});
	});
});
</script>
</head>
<body>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="row">
							<div class="col-md-10">
								<form id="searchall">
									<input type="search" class="form-control" id="search" placeholder="ຄົ້ນຫາ" style="border: 2px solid #008cff;font-weight:bold;">
								</form>
							</div>
							<div class="col-md-2" id="clickhere">
								<i class="fas fa-info-circle float-right" id="hlep" style="font-size:26px;color:gray;"></i>
								<i class="fas fa-info-circle float-right" id="hlep1" style="font-size:26px;color:red;"></i>
							</div>
						</div>
					</div>
					<div class="col-md-6 text-center">
						<label><h4><b>ລາຍງານການເຂົ້ານຳໃຊ້ລະບົບ</b></h4></label>
					</div>
					<div class="col-md-3">
					<script>
						$(function(){
							$("#sal1").show();
							$("#sal2").hide();
							$("#display1").show();
							$("#display2").hide();
							$("#show_sum").hide();
							$("#hr").hide();
							$("#searchall").show();
							$("#clickhere").show();
							$("#showhere01").show();
							
							$("#sal1").click(function(){
								$("#sal1").hide();
								$("#sal2").show();
								$("#display1").hide();
								$("#display2").show();
								$("#trun").hide();
								$("#show_sum").show();
								$("#hr").show();
								$("#searchall").hide();
								$("#clickhere").hide();
								$("#showhere01").hide();
							});
							
							$("#sal2").click(function(){
								$("#sal1").show();
								$("#sal2").hide();
								$("#display1").show();
								$("#display2").hide();
								$("#trun").show();
								$("#show_sum").hide();
								$("#hr").hide();
								$("#searchall").show();
								$("#clickhere").show();
								$("#showhere01").show();
							});
						});
					</script>
						<button type="button" class="btn btn-outline-primary float-right" id="sal1">ສະຫຼູບການເຂົ້າໃຊ້ງານ</button>
						<button type="button" class="btn float-right" style="background:red;color:white;" id="sal2"><i class="fas fa-times"></i> ປິດການສະຫຼຸບ</button>
						<a href="truncate.php" id="truncate">
							<button type="button" class="btn float-right" style="background:red;color:white;margin-right:10px;" id="trun"><i class="fas fa-broom"></i> ລ້າງຂໍ້ມູນ</button>
						</a>
					</div>
					<div class="col-md-12" id="showhere01">
						<script>
							$(function(){
								$("#showhlep").hide();
								$("#hlep1").hide();
								$("#hlep").click(function(){
									$("#showhlep").show();
									$("#hlep1").show();
									$("#hlep").hide();
								});
								$("#hlep1").click(function(){
									$("#showhlep").hide();
									$("#hlep1").hide();
									$("#hlep").show();
								});
							});
						</script>
						<div id="showhlep" style="padding:10px;margin-bottom:10px;border-radius:5px;background:green;color:white;font-size:16px;font-weight:bold;">
							ກ່ຽວກັບບ໋ອກຄົ້ນຫາ: ຄົ້ນຫາໄດ້ສະເພາະ (<font color='yellow'>ຊື່ຜູ້ນຳໃຊ້ລະບົບ ແລະ ສະເພາະມື້ນີ້ມື້ດຽວເທົ່ານັ້ນ</font>) ຖ້າຫາກຕ້ອງການຢາກຮູ້ມື້ທີ່ຜ່ານມາແມ່ນໃຫ້ເຂົ້າໄປທີ່ການສະຫຼຸບ
						</div>
					</div>
					<div class="col-md-12" id="display1">
						<div class="row">
							<div class="col-md-12">
							<?php
							include("controler/connection.php");
							$count33 = mysqli_query($conn,"select count(check_id) from checkusers");
							$curdate = mysqli_query($conn,"select count(check_id) from checkusers where date_in=curdate()");
							$check_count33 = mysqli_fetch_array($count33);
							$curdate1 = mysqli_fetch_array($curdate);
							?>
								<font size="3px"><b>▶ ມີຜູ້ເຂົ້ານຳໃຊ້ລະບົບທັງໝົດ:<font style="background:red" color="white"> <?= number_format($check_count33[0]);?> </font> ຄົນ.</b>
								<font size="3px"><b>ມີຜູ້ເຂົ້ານຳໃຊ້ລະບົບສະເພາະມື້ນີ້:<font style="background:red" color="white"> <?= number_format($curdate1[0]);?> </font> ຄົນ</b>
							</div>
						</div>
						<div id="showme">
						<table class="datatable table table-hover table-striped table-sm my-1">
						<thead>
							<tr class="table-bordered text-white" style="background:#000066">
								<th width="1%">ລຳດັບ</th>
								<th>ຊື່ຜູ້ນຳໃຊ້ລະບົບ</th>
								<th>ລະຫັດຜ່ານນຳໃຊ້ລະບົບ</th>
								<th>ວັນທີ ເວລາ ເຂົ້ານຳໃຊ້ລະບົບ</th>
								<th>ວັນທີ ເວລາ ອອກຈາກລະບົບ</th>
								<th width="120px;">Online & Ofline</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$select = mysqli_query($conn,"select * from checkusers where date_in=curdate() order by check_id desc");
							$a=1;
							while($data = mysqli_fetch_array($select)){
							?>
							<tr class="table-bordered">
								<td><b><?php echo $a; ?></b></td>
								<td><b><?php echo $data["username"]; ?></b></td>
								<td><b><?php echo $data["password"]; ?></b></td>
								<td><font color="green"><b><?php echo $data["date_in"]; ?></font>
								&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
								<font color="blue"><?php echo $data["time_in"]; ?></font></b></td>
								<td><font color="green"><b><?php echo $data["date_out"]; ?></font>
								&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
								<font color="blue"><?php echo $data["time_out"]; ?></font></b></td>
								<td><?php
								if($data['line'] == 'online'){
									echo "<font style='color:green;margin-left:10px;font-weight:bold;'><i class='fas fa-circle'></i> Online</font>";
								}else{
									echo "<font style='color:red;margin-left:10px;font-weight:bold;'><i class='fas fa-circle'></i> Ofline</font>";
								}
								?></td>
							</tr>
							<?php
							$a++;
							}
							?>
						</tbody>
						</table>
						</div>
					</div>
					<div class="col-md-12" id="display2">
						<div class="row">
						<form class="form-inline">
							<div class="col-md-2">
								<label>ເລືອກວັນທີເລີ່ມຕົ້ນ</label>
								<input type="date" class="form-control" id="data1" style="border: 1px solid red;">
							</div>
							<div class="col-md-2">
								<label>ເລືອກວັນທີສຸດທ້າຍ</label>
								<input type="date" class="form-control" id="data2" style="border: 1px solid red;">
							</div>
							<div class="col-md-2" style="margin-top:23px;">
								<button type="button" class="btn" id="go" style="background:green;color:white;">ສະຫຼຸບ</button>
							</div>
							<div class="col-md-6"></div>
						</form>
						</div>
					</div>
				</div>
				<hr id="hr" style="margin-top:0px;">
				<div class="row" id="show_sum" style="margin-top:-15px;">
					<div class="col-md-4">
						<div class="card-body">
							<div class="form-control" id="show_data1">
								<b>ສະຫຼຸບການເຂົ້ານຳໃຊ້ລະບົບລະຫວ່າງ ວັນທີ ຫາ ວັນທີ</b>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card-body">
							<div class="form-control" id="show_data"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="assets/plugins/datatables/datables_laos.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>