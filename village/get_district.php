<?php
	include("connect.php");
	$pro_id = $_POST['pro_id'];
	$select = mysqli_query($conn,"select dis_id,dis_name  from district where recover='1' and pro_id='$pro_id' ");
?>
<select>
	<option value="">ເລືອກເມືອງ</option>
	<?php
		while($a=mysqli_fetch_array($select)){
			?>
			<option value="<?=$a[0];?>"><?=$a[1];?></option>
</select>
		<?php } ?>