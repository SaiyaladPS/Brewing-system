<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
    <script src="../puligins/jquery.js"></script>

    <script>
        //ຄຳນນວນເງີນລວມ
        $(function() {
            $("#oqty").keyup(function() {
                var sprice = $("#sprice").val();
                var oqty = $("#oqty").val();
                $.post("keyup_amount.php", {
                        sprice: sprice,
                        oqty: oqty
                    },
                    function(out) {
                        $("#amounts").val(out);
                    });
            });
        });
    </script>
</head>

<body>
    <?php

    include_once('../connection/connection.php'); //ດືງເອົ່າຖານຂໍ້ມູນມານຳໃຊ້
    include_once('../controllers.php'); //ດືງເອົ່າແຕ່ລະຂໍ້ມູນການຕົກແຕ່ງມາທຳງານ
    if (isset($_POST['save'])) {

        $cus_id = mysqli_real_escape_string($connection, $_POST['cus_id']);
        $prod_id = mysqli_real_escape_string($connection, $_POST['prod_id']);
        $oqty = mysqli_real_escape_string($connection, $_POST['oqty']);
        $sprice = mysqli_real_escape_string($connection, $_POST['sprice']);
        $amounts = mysqli_real_escape_string($connection, $_POST['amounts']);

        $sql = " INSERT INTO sells set cus_id='$cus_id',prod_id='$prod_id',oqty='$oqty',sprice='$sprice',
        amounts='$amounts',o='1',odate=curdate(),otime=curtime() ";

        // ເຊັກຈໍານວນສິນຄ້າຈາກຕາຕະລາງ products ວ່າມີພໍຂາຍຫຼືບໍ
        $select_qty = " SELECT qty from products where prod_id='$prod_id'";
        $query = mysqli_query($connection, $select_qty);
        $qty = mysqli_fetch_array($query);
        $check = $qty[0];
        if ($oqty > $check) { //ຖ້າຫາກວ່າ ຈໍານວນສິນຄ້າໃນຕາຕະລາງ products ມີຈໍານວນນ້ອຍກວ່າ ຈໍານວນທີ່ຂາຍ ໃຫ້ສະແດງຄໍາວ່າດັ່ງນີ້
            echo "
	        <script>
	    Swal.fire({
		position: 'center',
		icon: 'error',
		title: 'ຈໍານວນສິນຄ້າບໍ່ພໍຂາຍ!',
		showConfirmButton: false,
		timer: 1500,
	    });
        </script>";
        } else {

            $result = mysqli_query($connection, $sql);
            if ($result) {
                mysqli_query($connection, "update products set qty=qty-'$oqty',sprice='$sprice',amount=amount-'$amounts' where prod_id='$prod_id' ");

                echo '<script>';
                echo 'alertSuccess("ບັນທຶກຂໍ້ມູນ ສຳເລັດແລ້ວ","show_sells.php")';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'alerterror("ບັນທຶກຂໍ້ມູນ ບໍ່ສຳເລັດ!","show_sells.php")' . $connection->error;
                echo '</script>';
            }
        }
    }

    ?>
    <?php
    include_once('../connection/connection.php'); //ດືງເອົ່າຖານຂໍ້ມູນມານຳໃຊ້
    include_once('../controllers.php'); //ດືງເອົ່າແຕ່ລະຂໍ້ມູນການຕົກແຕ່ງມາທຳງານ

    if (isset($_GET['del'])) {
        $del = mysqli_real_escape_string($connection, $_GET['del']);
        $btn = "update receives set r=0 where re_id='$del'";
        $query = mysqli_query($connection, $btn);
        if ($query) {
            echo '<script>';
            echo 'alertSuccess("ລົບຂໍ້ມູນ ສຳເລັດແລ້ວ","show_sells.php")';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alerterror("ລົບຂໍ້ມູນ ບໍ່ສຳເລັດ","show_sells.php")' . $connection->error;
            echo '</script>';
        }
    }


    $count = mysqli_query($connection, " SELECT count(o_id) from sells where o='2' ");
    $count = mysqli_fetch_array($count);
    ?>

    <div class="content">
        <div class="content-header">
            <div class="contianer-fulid">
                <div class="card">
                    <div class="card-header bg-light card-outline">
                        <h3 align="center">
                            <font color="green"><b> ລາຍງານຂໍ້ມູນສິນຄ້າຂາຍອອກ</b></font>
                        </h3>
                    </div>

                        <div class="col-md-12">
                            <div class="container">
                            <p align="center">ລວມທັງໝົດມີ: <b style="color:red;"><?= $count[0]; ?></b> ລາຍການ.
                            </p>
                            <br>
                            <table id="data" class="table table-bordered table-hover table-sm">
                                <?php
                                $mysql = " SELECT a.*,b.*,c.* from sells as a,products as b,customer as c where a.o='2' and a.prod_id=b.prod_id and a.cus_id=c.cus_id ";
                                $result = mysqli_query($connection, $mysql);
                                $rows = mysqli_num_rows($result);
                                if ($rows == 0) {
                                    echo '<div class="alert alert-danger alert-dismissible">
                                <h3>ບໍ່ພົບຂໍ້ມູນໃນຕາຕະລາງໃດໆ!</h3></div>';
                                } else {
                                ?>
                                    <thead class="bg-secondary">
                                        <tr>
                                            <th>ລຳດັບ</th>
                                            <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                                            <th>ສິນຄ້າ</th>
                                            <th>ລາຄາຂາຍ</th>
                                            <th>ຈຳນວນ</th>
                                            <th>ເງີນລວມ</th>
                                            <th>ວັນທີຂາຍ</th>
                                            <th>ເພີ່ມເຕີມ</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $a = 1;
                                        while ($re = mysqli_fetch_array($result)) { ?>
                                            <tr>

                                                <td width="7%"><?php echo $a; ?></td>
                                                <td><?php echo $re['fname']; ?></td>
                                                <td><?php echo $re['prod_name']; ?></td>
                                                <td><?= number_format($re['sprice']) . " .ກີບ"; ?></td>
                                                <td><?php echo $re['oqty']; ?></td>
                                                <td><?= number_format($re['amounts']) . " .ກີບ"; ?></td>
                                                <td><?php echo $re['odate']; ?></td>

                                                <td width="13%">
                                                    <a href="update_sells.php?update=<?php echo $re['o_id'] ?>" class="btn btn-warning edit badge">
                                                        <span class="ion ion-android-create"></span> ແກ້ໄຂ</a>
                                                    <a href="?del=<?php echo $re['o_id'] ?>" class="btn btn-danger btndel badge">
                                                        <span class="ion ion-ios-trash-outline"></span> ລົບ</a>
                                                </td>
                                        <?php
                                            $a++;
                                        }
                                    }
                                        ?>
                                            </tr>
                                    </tbody>

                            </table>
                        </div>
                    </div>

                    <!-- ================= -->

                
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>