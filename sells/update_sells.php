<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update_sells</title>
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

<body style="background-color:#cccccc">

    <?php
    include_once('../connection/connection.php');
    include_once('../controllers.php');

    $edit = mysqli_real_escape_string($connection, $_GET['update']);
    $sql = "SELECT a.*,b.*,c.* from sells as a,products as b,customer as c
    where a.prod_id=b.prod_id and a.cus_id=a.cus_id and o_id='$edit'";
    $query = mysqli_query($connection, $sql);
    $re = mysqli_fetch_array($query);
    if (isset($_POST['save'])) {


        $cus_id = mysqli_real_escape_string($connection, $_POST['cus_id']);
        $prod_id = mysqli_real_escape_string($connection, $_POST['prod_id']);
        $oqty = mysqli_real_escape_string($connection, $_POST['oqty']);
        $sprice = mysqli_real_escape_string($connection, $_POST['sprice']);
        $amounts = mysqli_real_escape_string($connection, $_POST['amounts']);

        $sql = "UPDATE sells set cus_id='$cus_id',prod_id='$prod_id',oqty='$oqty',sprice='$sprice',
        amounts='$amounts',o='1' and o_id='$edit'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            // mysqli_query($connection, "update products set qty=qty-'$oqty',sprice=sprice-'$sprice',amount=amount-'$amounts' where prod_id='$prod_id' ");

            echo '<script>';
            echo 'alertSuccess("ແກ້ໄຂຂໍ້ມູນ ສຳເລັດແລ້ວ","show_sells.php")';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alerterror("ແກ້ໄຂຂໍ້ມູນ ຜິດພາດ","show_sells.php")' . $connection->error;
            echo '</script>';
        }
    }
    ?>
    <!--  -->
    <div class="content">
        <div class="content-header">
            <div class="contianer-fulid">
                <div class="card bg-light">
                    <div class="card-header">
                        <h3 align="center">
                            <font color="green"><b><u> ແກ້ໄຂຂໍ້ມູນສິນຄ້າຂາຍອອກ </u></b></font>
                        </h3>
                    </div>
                    <form method="post" class="needs-validation" novalidate>
                        <div class="card-body">
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <h6 for="">* ຊື່ລູກຄ້າ : </h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-ios-partlysunny"></span>
                                        </div>
                                        <select name="cus_id" class="form-control" required>
                                            <option value="<?php echo $re['cus_id']; ?>"><?php echo $re['fname']; ?></option>
                                            <?php
                                            $select = mysqli_query($connection, "select cus_id,fname from customer where ct=1");
                                            while ($result = mysqli_fetch_array($select)) {
                                            ?>
                                                <option value="<?php echo $result['cus_id']; ?>"><?php echo $result['fname']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <h6 for="">* ຊື່ສິນຄ້າ : </h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-ios-partlysunny"></span>
                                        </div>
                                        <select name="prod_id" class="form-control" required>
                                            <option value="<?php echo $re['prod_id']; ?>"><?php echo $re['prod_name']; ?></option>
                                            <?php
                                            $select = mysqli_query($connection, "select prod_id,prod_name from products where pd=1");
                                            while ($result = mysqli_fetch_array($select)) {
                                            ?>
                                                <option value="<?php echo $result['prod_id']; ?>"><?php echo $result['prod_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <h6 for="#">* ລາຄາຂາຍ :</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-ios-shuffle-strong"></span>
                                        </div>
                                        <input type="text" name="sprice" id="sprice" class="form-control" placeholder="ລາຄາຂາຍ..." value="<?php echo $re['sprice']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <h6 for="#">* ຈຳນວນ :</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-ios-shuffle-strong"></span>
                                        </div>
                                        <input type="text" name="oqty" id="oqty" class="form-control" placeholder=" ຈຳນວນ..." value="<?php echo $re['oqty']; ?>" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <h6 for="#">* ເງີນລວມ :</h6>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text ion-ios-shuffle-strong"></span>
                                        </div>
                                        <input type="text" name="amounts" id="amounts" class="form-control" placeholder=" Auto..." value="<?php echo $re['amounts']; ?>" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="save" class="btn btn-success btn-sm" onclick="window.location.reload()">
                                <span class="ion ion-archive"></span> ບັນທຶກ</button>

                            <a href="show_sells.php" class="btn btn-danger btn-sm">
                                <span class="ion-android-cancel"></span> ປິດ</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
    <script src="../../dist/main.js"></script>
</body>

</html>