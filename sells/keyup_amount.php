<?php
include('../connection/connection.php');
$a=$_POST['sprice'];
$b=$_POST['oqty'];
if ($a && $b) {
	echo ($a * $b);
} else {
	echo "0.00";
}
?>
