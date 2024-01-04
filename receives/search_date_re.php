<html>
	<head>
		<title>select</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<script>
				$(function(){
					
						$(".goo").click(function(){
					var dat = $(".dat").val();
					var da = $(".da").val();
					if(dat == ""){
						Swal.fire({
							position:'center',
							icon:'error',
							title:'ປ້ອນວັນທີເລີມ',
							showConfirmButton:false,
							timer:1500,
						})
					}else if(da==""){
						Swal.fire({
							position:'center',
							icon:'error',
							title:'ປ້ອນວັນທີສີ້ນສຸດ',
							showConfirmButton:false,
							timer:1500,
						})
					}else{
						$.post("select_search.php",{
							dat:dat,
							da:da
						},
						function(out){
							$(".show_data").html(out);
					});
					}
					});
				});
				
				
			</script>
	</head>
	<body>
		
		<div class="contianer-fluid">
			
			
			
		<form class="form-inline bg-white">
			<div class="form-group my-5">
				<label class="mx-sm-4"><h4>ຄົນຫາຂໍ້ມູນດ້ວຍວັນທີເດືອນປີ :</h4></label>
				<input type="date" class="form-control dat" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			<div class="form-group">
				<label class="mx-sm-4"><h4></h4></label>
				<input type="date" class="form-control da" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
			<div class="form-group">
				<label class="mx-sm-4"></label>
				<button type="button" class="btn btn-primary goo"> ຄົ້ນຫາ</button>
			</div>
			
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<div class="form-group my-5">
								<button type="button" class="btn btn-info">
								<a href="selectre.php" class=" text-white"><i class="fas fa-plus-square"></i> ໜ້າລາຍງານ</a>
							</button>							
							</div>
		</form>
		
		<hr color="yellow">
		<div class="show_data"></div>
			
			
		</div>
	</body>
	
</html>