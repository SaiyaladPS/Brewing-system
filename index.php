<html>
	<head>
		<title>Form</title>
			<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
				a{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<script>
			$(function(){
				$("#send").click(function(){
					var username = $("#username").val();
					var password = $("#password").val();
					if(username == ""){
							Swal.fire({
							position: 'center',
							icon: 'warning',
							title: 'ປ້ອນຊື່ຜູ້ນຳໃຊ້ກ່ອນ',
							showConfirmButton: false,
							timer: 1500
						})
							
						}else if(password == ""){
						Swal.fire({
							position: 'center',
							icon: 'warning',
							title: 'ປ້ອນລະຫັດກ່ອນ',
							showConfirmButton: false,
							timer: 1500
						})
					}else{
						$.post("check_users.php",{
							username:username,
							password:password
						},
						function(out){
							$("#show").html(out).show();
						});
					}
				});
				});
						
			</script>
	</head>
	<body class="my-5">
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header bg-secondary text-white"> <center><h3><b>ລ໋ອກອີນເພື່ອ ເຂົ້າສູ່ລະບົບ</b></h3></center></div>
					<div class="card-body bg-warning">
						<div class="row">
							<div class="col-md-6">
						<form class="form-vertical">
							<div class="form-group">
								<label><i class="fas fa-user-tie"></i> ຊື່ຜູ້ນຳໃຊ້ </label>
									<input type="text" placeholder="ປ້ອນຊື່ຜູ້ນຳໃຊ້..." class="form-control" id="username">
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<label><i class="fas fa-key"></i> ລະຫັດຜ່ານ </label>
									<input type="password" placeholder="********" class="form-control" id="password">
							</div>						
						</form>
							</div>
						</div>
					</div>
			
					
					<div class="card-footer bg-secondary text-white">
					
					<strong>ກົດປຸ່ມ ລ໋ອກອີນເພື່ອຢືນຢັນ</strong>
					
					<div class=" form-group float-right d-sm-inline-block">
					<button type="button" class=" btn btn-info bg-info text-white" id="send"><i class="fas fa-lock-open"></i> ລ໋ອກອີນ
					</button>
					</div>
						<div id="show"></div>
					</div>
				
			</div>
			</div>
			<div class="col-md-4"></div>
		
		</div>
		</div>
	</body>
</html>