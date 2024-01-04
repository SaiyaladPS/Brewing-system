<?php
	include("connect.php");
	$dis_id = $_POST['dis_id'];
	$select = mysqli_query($conn,"select vill_id,vill_name  from village where dis_id='$dis_id' ");
?>
<select>
	<option value="">ເລືອກບ້ານ</option>
	<?php
		while($a=mysqli_fetch_array($select)){
			?>
			<option value="<?=$a[0];?>"><?=$a[1];?></option>
</select>
		<?php } ?>