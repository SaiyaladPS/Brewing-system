<html>
<head>
	<title>bin</title>
	<meta charset="utf-8" http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial0scale=1">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="icon/css/all.min.css">
	
	<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
	<script src="jQuery.js"></script>
	<script>
	
		$(function(){
			$("#send").click(function(){
				$("#a").hide();
				var bill_fly = $("#bill_fly").val();
				
			$.post('search_bin.php',{
				bill_fly:bill_fly
			},
			function(output){
				$("#textarea").html(output);
			});
			});
		});

	</script>
		
	<style>
		*{font-family:phetsarath ot;}body {
 background-image: url("pic/DSC04924-01.jpg");
  background-repeat: no-repeat;
  background-size: 1700px 900px;
}
	</style>
</head>
<body>
<br><br><br><br>
	<div class="container-fluid" >
		<div class="row">
		
			<div class="col-md-3">
			<div class="card" id="a">
			
					<div class="card-header bg-danger">
					</div>
					<div class="card-body" >
						<form class="form-vertical" id="form1">
						<div class="form-group">
						<label><b>ເລກໃບບີນ</b></label>
								<input type="text"  placeholder="ເລກໃບບີນ!" class="form-control" id="bill_fly">
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-success" id="send"><i class="fas fa-download"></i> ພີມ</button>
								
						</div>	
							
						</form>
					</div>
					<div class="card-footer bg-danger">
					
						
						<div id="show"></div>
					</div> 
					</div>
			</div>
			<div class="col-md-9">
				<div class="form-group">
				<p type="text" placeholder="ກະລຸນາປ້ອນເລກບີນ" class="form_contrl" id="textarea"> </p>
				</div>
				</div>
		
		</div>
	</div>
</body>
</html>