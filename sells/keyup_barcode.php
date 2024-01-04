
<?php
include("../connection/connection.php");

$barcode = $_POST['barcode'];
$select_name1 = mysqli_query($connection, " SELECT prod_id from products where barcode='$barcode'");
$show_name1 = mysqli_fetch_array($select_name1);
if ($show_name1) {
    echo $show_name1[0];
} else {
    echo "ຊື່ສິນຄ້າ...";
}

?>