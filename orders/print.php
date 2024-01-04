<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print</title>
    <?php 
        include("connect.php");

        $bill_fly=$_GET['bill_fly'];

	$select = mysqli_query($conn,"select a.*,b.* from products as a,
		orders as b where b.pro_id=a.pro_id and bill_fly='$bill_fly'");
        $amount=mysqli_query($conn,"select sum(amount) as amount from orders where bill_fly='$bill_fly'");
        $sum_amount=mysqli_fetch_array($amount);
    ?>
    		<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jquery.js"></script>
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
</head>
<body onload="window.print();">
<br>
<br>
<br>
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
                </script> <br>
				 <h6><b class='float-right'> ເລກທີບີນ: <?php echo $bill_fly; ?> </b></h6>
				</div>
            </div>
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
                    
                     <td colspan="3"><b><?php echo number_format($sum_amount['amount'])." ກີບ";?> </b></td>
                     
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
</body>
</html>