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
			<script src="jquery.js"></script>
			
			<script>
				$(function(){
					
						$(".data").keyup(function(){
					var data = $(".data").val();
					
						$.post("search_or.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
				
				
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
						$.post("select_search_date.php",{
							dat:dat,
							da:da
						},
						function(out){
							$(".showhere").html(out);
					});
					}
					});
				});
			</script>
			<script>
  // ເອີ້ນໃຊ້ ດາຕ້າເທໂບ້ ມາໃຊ້ງານ ຮ່ວມກັບ ຕາຕະລາງ
         $(function(){
            $('#data').DataTable();

            // $('#data').DataTable({

            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering":true,
            //     "info": true,
            //     "autoWidth": false,
            // }); 
        });
    </script>
	</head>
	<body class="mx-sm-5 my-5" onload="window.print()">
	<?php
        session_start();
		include("connect.php");
		$sum = mysqli_query($conn,"select sum(amount) from orders where selec='1'");
		$check_sum = mysqli_fetch_array($sum);

		$select = mysqli_query($conn,"select a.*,b.* from products as a,
		orders as b where b.pro_id=a.pro_id and selec='1' order by b.or_id desc");		
	?>
    <h3><center><b> ໃບເກັບເງີນ </b></center></h3>
		<div class="row">
            <div class="col-md-6">
                <h5 style="font-family:'phetsarath ot'"><b> ຊື່ສາງ :</b> ສາງເບຍ K&M </h5>
                <h6><b> ເບີໂທ : 020 92465779 </b></h6></div>
            <div class="col-md-6">
                <script> 
                    var date=new Date();  
                    var day=date.getDate();  
                    var month=date.getMonth()+1;  
                    var year=date.getFullYear();  
                    document.write("<b stype='font-family:phetsarath ot;margin-right:20px;' class='float-right'>ວັນທີ : "+day+"/"+month+"/"+year+"</b>");  
                </script> <br><?php
				$bill_fly = mysqli_query($conn,"select bill_fly from orders where selec='1'");
				$bill_flyl = mysqli_fetch_array($bill_fly);?>
				 <h6><b class='float-right'> ເລກທີບີນ: <?php echo ($bill_flyl[0]); ?> </b></h6>
				</div>
            </div>
      
       
			
			
		
        
        
		<div class="showhere">
			<table class="table table-hover table-striped table-bordered table-sm datatable" id="data">
			<thead>
				<tr class="bg-dark text-white">
					<th width="80px">ລຳດັບ</th>
						
					<th width="100px">ລະຫັດສິນຄ້າ</th>
					<th>ຊື່ສິນຄ້າ</th>
					<th>ຈໍານວນ</th>
					<th>ລາຄາຂາຍ</th>
					<th>ເງີນລວມ</th>
					<th>ໝາຍເຫດ</th>
					
				</tr>
				</thead>
				<tbody>
			
				<tr>
				<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
					<td><?php echo $a; ?></td>
					
					
					
					<td><?php echo $data["pro_id"]; ?></td>
					<td><?php echo $data["pro_name"]; ?></td>
					<td><?php echo $data["oqty"]; ?></td>
					<td><?php echo number_format ($data["sprice"])." ກີບ"; ?></td>
					<td><?php echo number_format ($data["amount"])." ກີບ"; ?></td>
					<td><?php echo $data["remark"]; ?></td>
				</tr>
                
			<?php
				$a++;
				}
			?>
            <tr class="table-hover table-striped">
                     <td colspan="1"></td>
                    <td colspan="4" class=""><b>ເງີນລວມ :</b></td>
                    
                     <td colspan="3"><b><?php echo number_format($check_sum[0])." ກີບ";?> </b></td>
                     
                 </tr>
			</tbody>
			</table>
            <table>
                <tr>
                    <td>
                    <b style="margin-left:50px"> ພະນັກງານ : </b>
                    <?php
                        echo $_SESSION['fname']."   ".$_SESSION['lname'];
                    ?>
                    </td>
                    <td width="700px;"></td>
                    <td><b class="float-right"> ຜູ້ຮັບ: </b></td>
                </tr>
            </table>
			
		</div>
				
			</div>
		</div>

		</div>
		
	</body>
	
</html>