

<?php
	include("connect.php");
	$data = $_POST["data"];
	$sql = "select a.pro_id,a.pro_name,b.dis_id,b.dis_name,c.vill_id,c.vill_name,d.user_id,d.fname,d.lname,
					d.gender,d.dob,d.pro_id,d.recover,d.dis_id,d.vill_id,d.tel,d.status,d.username,d.password,d.remark,d.date 
					from province as a,district as b,village as c,users as d where a.pro_id=d.pro_id and b.dis_id=d.dis_id and
					c.vill_id=d.vill_id and d.recover='0' and (d.user_id like'$data%' or d.fname like'$data%' or d.lname like'$data%'
					 or a.pro_name like'$data%' or b.dis_name like'$data%' or c.vill_name like'$data%' or d.status like'$data%')";
	$select = mysqli_query($conn,$sql);
	$check_data = mysqli_num_rows($select);
	if($check_data == 0){
		echo"<h3 align='center'>ບໍ່ມີຂໍ້ມູນທີ່ທ່ານຄົ້ນຫາ</h3>";
	}else{
		?>
<table class="table table-hover table-sm table-striped table-bordered">
				<tr class="bg-dark text-white tr-sm">
					<th>ລຳດັບ</th>					
					<th>ຊື່ ແລະ ນາມສະກຸນ</th>
					<th>ສິດທິ</th>
					<th>ບ້ານ</th>									
					<th>ເມືອງ</th>
					<th>ແຂວງ</th>						
					<th>ໝາຍເຫດ</th>					
					<th width="150px">ລາຍລະອຽດ</th>
					<th>ແກ້ໄຂ</th>
					<th>ລົບ</th>
				</tr>
			<?php
			$a=1;
			while($data=mysqli_fetch_array($select)){
			?>
				<tr>
					<td><?php echo $a; ?></td>
					
					<td><?php echo $data["fname"]; ?> <?php echo $data["lname"]; ?></td>
					<td><?php echo $data["status"]; ?></td>	
					<td><?php echo $data["vill_name"]; ?></td>											
					<td><?php echo $data["dis_name"]; ?></td>																			
					<td><?php echo $data["pro_name"]; ?></td>	
					<td><?php echo $data["remark"]; ?></td>							
					<td>
					<a href="showall_recover.php?user_id=<?php echo $data['user_id'];?>">
						<button type="button" class="btn btn-sm btn-warning">
							
<i class="fas fa-book"></i>
						ລາຍອຽດ
							
						</button>
						</a>
					</td>
					<td>
					<a href="recover_back_user.php?user_id=<?php echo $data['user_id'];?>" onclick="return confirm('ທ່ານຕ້ອງການກູ້ຂໍມູນບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-success">
						
                        <i class="fas fa-undo"></i>
						</button>
						</a>
					</td>
					<td>
					<a href="delete_user.php?user_id=<?php echo $data['user_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
						<button type="button" class="btn btn-sm btn-danger">
						
							<i class="fas fa-window-close"></i>
						</button>
					</a>
	 				</td>
				</tr>
				
			<?php
				$a++;
				}
				}
			?>
			</table>
			