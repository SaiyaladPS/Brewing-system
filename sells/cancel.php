<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=devie-width, initial-scale=1">
			<link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="icon/css/all.min.css">
			<style>
				*{font-family:phetsarath ot;}
			</style>
			<script src="sweetalert/dist/sweetalert2.all.min.js"></script>
			<script src="jquery.js"></script>
			<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
			<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
    <title></title>
    <style>
        * {
            font-family: "phetsarath ot"
        }

        ;
    </style>
    <script src="../puligins/jquery.js"></script>

    <script>
        //ຄຳນນວນເງີນລວມ
        $(function() {
            $("#rqty").keyup(function() {
                var bprice = $("#bprice").val();
                var rqty = $("#rqty").val();
                $.post("keyup_amount.php", {
                        bprice: bprice,
                        rqty: rqty
                    },
                    function(out) {
                        $("#amount").val(out);
                    });
            });
        });
    </script>
</head>

<body>

    <?php
    include_once('../connection/connection.php');
    include_once('../controllers.php');

    $edit = mysqli_real_escape_string($connection, $_GET['update']);
    $sql = "SELECT a.prod_id,a.prod_name,a.sprice,b.*,
    c.cate_id,cate_name from products as a,sells as b,categories as c
    where a.prod_id=b.prod_id and a.cate_id=c.cate_id and o='1' and o_id='$edit'";
    $query = mysqli_query($connection, $sql);
    $re = mysqli_fetch_array($query);
    if (isset($_POST['save'])) {


        $prod_id = mysqli_real_escape_string($connection, $_POST['prod_id']);
        $oqty = mysqli_real_escape_string($connection, $_POST['oqty']);

        $sql = "UPDATE sells set prod_id='$prod_id',o=0 where o_id='$edit'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            mysqli_query($connection, "UPDATE products set qty=qty+'$oqty' where prod_id='$prod_id' ");

            // echo '<script>';
            // echo 'alertSuccess("ຍົກເລິກຮຽບຮ້ອຍ","cancel.php")';
            // echo '</script>';
            echo "
            <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'ຍົກເລິກຮຽບຮ້ອຍແລ້ວ',
        showConfirmButton: false,
        timer: 2000
        })
        </script>";
        } else {
            echo '<script>';
            echo 'alerterror("ແກ້ໄຂຂໍ້ມູນ ຜິດພາດ","cancel.php")' . $connection->error;
            echo '</script>';
        }
    }
    ?>
    <!--  -->
    <!-- <div class="content">
        <div class="content-header">
            <div class="contianer-fulid">
                <div class="card bg-muted"> -->
                    <!-- <div class="card-header">
                        <h3 align="center">
                            <font color="green"><b><u> ລາຍງານສິນຄ້າຖືກຍົກເລິກ </u></b></font>
                        </h3>
                    </div> -->
                    <form align="center" method="post" class="needs-validation" novalidate>
                            <input type="hidden" name="prod_id" class="form-control" placeholder=" ຈຳນວນ..." value="<?php echo $re['prod_id']; ?>" required>
                            <input type="hidden" name="oqty" id="oqty" class="form-control" placeholder=" ຈຳນວນ..." value="<?php echo $re['oqty']; ?>" required>
                       <br></br>
                            <button type="submit" name="save" class="btn btn-success btn-sm">
                        <span class="ion ion-archive"></span> ຍົກເລິກ</button>
                    </form>
                <!-- </div>
            </div>
        </div>
    </div> -->
    <!--  -->
    <script src="../../dist/main.js"></script>
</body>

</html>