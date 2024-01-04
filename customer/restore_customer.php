
<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jQuery.js"></script>
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
            <script>
				$(function(){
					
						$(".data").keyup(function(){
					var data = $(".data").val();
					
						$.post("search_custommer_recover.php",{
							data:data
						},
						function(out){
							$(".showhere").html(out);
					});
					
					});
				});
			</script>

		
			
        <center><p><h4><b> ລາຍງານລາຍຊື່ລູກຄ້າທີຖືກລືບ </b></h4></p></center>

        <form class="form-inline bg-white">
			<div class="form-group">
				<label class="mx-sm-4"><h5>ຄົ້ນຫາຂໍ້ມູນລູກຄ້າທີ່ຖືກລົບ</h5></label>
				<input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
			</div>
		
			<div class="form-group">
				<label class="mx-sm-4"></label>
				
				<a href="form_customer.php" class="btn btn-sm btn-info"><i class="fas fa-angle-double-left"></i> ຍ້ອນກັບ</a>
			</div>
		</form>
        <?php
				include("connect.php");
				$sql1="select *from customer where recover='0' and cus_id order by cus_id desc";
				$select = mysqli_query($conn,$sql1);
                $check_data = mysqli_num_rows($select);
                $sql2="select count(cus_id) from customer where recover='0'";
				$select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
				$data_count=mysqli_fetch_array($select_count);
	if($check_data == 0){
		echo"<h3 style='font-family:phetsarath ot' align='center'>ບໍ່ມີຂໍ້ມູນທີ່ຖືກລືບ</h3>";
	}else{
				

			?>
        <h5 style="font-family:phetsarath ot">ລູກຄ້າມີທັງໝົດ : <?php echo $data_count[0];?> ຄົນ </h5>
			<div class="showhere">
           
			<table class="table table-hover table-striped table-bordered table-sm datatable">
			<thead>
				<tr class="bg-dark text-white tr-sm">
                    <th width="40px">ລຳດັບ</th>
					<th width="80px">ລະຫັດລູກຄ້າ</th>
					<th>ຊື່</th>
					<th>ນາມສະກູນ</th>
					<th>ເບີໂທ</th>
					
					<th>ໝາຍເຫດ</th>
					<th width="60px">ກູ້ຄືນ</th>
					<th width="60px">ລົບ</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					
					<td><?php echo $data["cus_id"]; ?></td>	
					<td><?php echo $data["fname"]; ?></td>	
					<td><?php echo $data["lname"]; ?></td>					
					<td><?php echo $data["tel"]; ?></td>					
									
					<td><?php echo $data["remark"]; ?></td>	
					<td>
					<a href="recover_back_cstomer.php?cus_id=<?php echo $data['cus_id'];?>">
						<button type="button" class="btn btn-sm btn-success">
						
                        <i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_customer.php?cus_id=<?php echo $data['cus_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
						<i class="fas fa-trash-alt"></i>
						</button>
					</a>
	 				</td>
				</tr>
				
			<?php
				$a++;
				}
				}
			?>
			</tbody>
			</table>
			</div>
			</div>
            <!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>