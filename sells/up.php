<?php
include("../connection/connection.php");
$o_id = $_GET['o_id'];
$delete = mysqli_query($connection," UPDATE sells set o=2 where o=1 ");
if($delete){
	echo "<script>
    location='select.php';
    </script>";
}else{
	echo "
    <script>
    alert('ມີບາງຢ່າງຜິດພາດ...!');
    location='select.php';
    <script>";
}
