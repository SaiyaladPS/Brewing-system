<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../puligins/jquery.js"></script>
    <title>Sell</title>

    <!-- ຄຳສັ່ງປິ່ນໃບບິນ -->
    <style type="text/css" media="print">
        #wow,
        a {
            visibility: hidden;
        }

        #show {
            text-align: center;
            font-size: 20px;
        }

        #printable,
        a {
            display: block;
        }

        @media print {

            #non-printable,
            a {
                display: none;
            }

            #printable {
                display: block;
            }
        }
    </style>

    <script>
        $(function() { // ສະແດງຊື່ສິນຄ້າ
            $("#barcode").change(function() {
                var barcode = $("#barcode").val();
                $.post("keyup_barcode.php", {
                        barcode: barcode
                    },
                    function(output) {
                        $("#prod_id").val(output).show();
                    });
            });
        });
    </script>

    <script>
        $(function() { // ສະແດງຊື່ສິນຄ້າ
            $("#barcode").change(function() {
                var barcode = $("#barcode").val();
                $.post("keyup_prod_name.php", {
                        barcode: barcode
                    },
                    function(output) {
                        $("#prod_ids").val(output).show();
                    });
            });
        });
    </script>

    <script>
        $(function() { // ສະແດງລາຄາຂາຍສິນຄ່າ
            $("#barcode").change(function() {
                var barcode = $("#barcode").val();
                $.post("keyup_sprice.php", {
                        barcode: barcode
                    },
                    function(output) {
                        $("#sprice").val(output).show();
                    });
            });
        });
    </script>

    <!-- <script>
        $(function() { // ສະແດງລາຄາຂາຍ
            $("#prod_id").change(function() {
                var prod_id = $("#prod_id").val();
                $.post("keyup_sprice.php", {
                        prod_id: prod_id
                    },
                    function(output) {
                        $("#sprice").val(output).show();
                    });
            });
        });
    </script> -->

    <script>
        $(function() { //ຄຳນນວນເງີນລວມ
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

    <!-- <script>
        $(function() {
            $("#cate_id").change(function() {
                var cate_id = $("#cate_id").val();
                $.post("keyup_prod_name.php", {
                        cate_id: cate_id
                    },
                    function(output) {
                        $("#prod_id").html(output).show();
                    });
            });
        });
    </script> -->

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

        $sql = " INSERT INTO sells set cus_id='$cus_id',prod_id='$prod_id',sprice='$sprice',oqty='$oqty',
        amounts='$amounts',o='1',odate=curdate(),otime=curtime() ";

        // ເຊັກຈໍານວນສິນຄ້າຈາກຕາຕະລາງ products ວ່າມີພໍຂາຍຫຼືບໍ
        // $select_qty = " SELECT qty from products where prod_id='$prod_id'";
        // $query = mysqli_query($connection, $select_qty);
        // $qty = mysqli_fetch_array($query);
        // $check = $qty[0];
        // if ($oqty > $check) { //ຖ້າຫາກວ່າ ຈໍານວນສິນຄ້າໃນຕາຕະລາງ products ມີຈໍານວນນ້ອຍກວ່າ ຈໍານວນທີ່ຂາຍ ໃຫ້ສະແດງຄໍາວ່າດັ່ງນີ້
        //     echo "
        //     <script>
        // Swal.fire({
        // position: 'center',
        // icon: 'error',
        // title: 'ຈໍານວນສິນຄ້າບໍ່ພໍຂາຍ!',
        // showConfirmButton: false,
        // timer: 1500,
        // })
        // window.setTimeout(function(){ 
        // location='select.php';
        // } ,1500);
        // </script>";
        // } else {

        $result = mysqli_query($connection, $sql);
        if ($result) {
            mysqli_query($connection, "UPDATE products set qty=qty-'$oqty' where prod_id='$prod_id' ");

            echo '<script>';
            echo 'alertSuccess("ບັນທຶກຂໍ້ມູນ ສຳເລັດແລ້ວ","select.php")';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alerterror("ບັນທຶກຂໍ້ມູນ ບໍ່ສຳເລັດ!","select.php")' . $connection->error;
            echo '</script>';
        }
    }

    // if (isset($_GET['dele'])) {
    //     $dele = mysqli_real_escape_string($connection, $_GET['dele']);
    //     // $oqty = mysqli_real_escape_string($connection, $_POST['oqty']);

    //     $btn = "UPDATE sells set o='0' where o_id='$dele'";
    //     $query = mysqli_query($connection, $btn);

    //     if ($query) {
    //         // mysqli_query($connection, "UPDATE products set qty=qty+'$oqty' where prod_id='$prod_id' ");
    //         echo '<script>';
    //         echo 'alertSuccess("ຍົກເລີກຮຽບຮ້ອຍແລ້ວ","select.php")';
    //         echo '</script>';
    //     } else {
    //         echo '<script>';
    //         echo 'alerterror("ມີບາງຢ່າງຜິດພາດ...!","select.php")' . $connection->error;
    //         echo '</script>';
    //     }
    // }
    //}
    ?>

    <br>

    <body style="background-color:C7F5FC">
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" id="non-printable">
                    <form method="post" class="needs-validation" value="" novalidate>
                        <div class="card shadow">
                            <div class="card-header text-center">
                                <h5><b>ຟອມຂາຍສິນຄ້າ</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <h6 for="">* ຊື່ລູກຄ້າ : </h6>
                                        <div class="input-group">
                                            <input type="text" name="cus_id" id="cus_id" class="form-control" placeholder="ລະຫັດລູກຄ້າ..." required>
                                        </div>
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <h6 for="">* ລະຫັດບາໂຄດ : </h6>
                                        <div class="input-group">
                                            <input type="text" name="barcode" id="barcode" class="form-control" placeholder="ລະຫັດບາໂຄດ..." required>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6 form-group">
                                        <h6 for="">* ຊື່ສິນຄ້າ : </h6>
                                        <div class="input-group">
                                            <select name="prod_id" id="prod_id" class="form-control" required></select>
                                        </div>
                                    </div> -->

                                    <div class="col-md-12 form-group">
                                        <h6 for="">* ຊື່ສິນຄ້າ : </h6>
                                        <div class="input-group">
                                            <input type="hidden" name="prod_id" id="prod_id" class="form-control" placeholder="ຊື່ສິນຄ້າ..." readonly>
                                            <input type="text" name="" id="prod_ids" class="form-control" placeholder="ຊື່ສິນຄ້າ..." readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <h6 class="col-form-label">ລາຄາ:</h6>
                                        <input type="text" name="sprice" id="sprice" class="form-control" placeholder="0.00 ກີບ" readonly>
                                    </div>

                                    <!-- <div class="col-md-6 form-group">
                                        <h6 class="col-form-label">ຈຳນວນ:</h6> -->
                                    <input type="hidden" name="oqty" id="1" class="form-control" value="1" placeholder="ປ້ອນຈຳນວນ..." required>
                                    <!-- </div> -->

                                    <!-- <div class="col-md-12 form-group">
                                        <h6 class="col-form-label">ເງີນລວມ:</h6> -->
                                    <input type="hidden" name="amounts" id="amounts" class="form-control" placeholder="Auto..." readonly>
                                    <!-- </div> -->

                                </div>

                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" name="save" class="btn btn-success btn-sm">
                                    <span class="fa fa-save"></span> Save</button>
                                <button type="reset" onclick="window.location.reload()" class="btn btn-warning btn-sm">
                                    <span class="fa fa-cog fa-spin"></span> Reset</button>
                            </div>
                        </div>
                    </form>
                    <div class="" style="font-size:0pt" id="show"></div>
                </div>

                <!-- =================== Orders ລາຍງານສິນຄ້າຂາຍອອກ ==================== -->

                <div class="col-md-4" id="non-printable">
                    <div class="card-header text-center">
                        <h5><b>ລາຍງານສິນຄ້າ</b></h5>
                    </div>
                    <div class="card shadow">
                        <table class="table table-bordered table-hover table-sm " style="font-size:small; color:blue;">
                            <tr class="bg-secondary">
                                <!-- <th>ລະຫັດ</th> -->
                                <th>ບາໂຄດ</th>
                                <th>ປະເພດ</th>
                                <th>ຊື່ສິນຄ້າ</th>
                                <th>ຈຳນວນ</th>
                                <th>ລາຄາ</th>
                            </tr>
                            <?php
                            include("../connection/connection.php");
                            $select = mysqli_query($connection, "SELECT a.*,b.cate_id,cate_name from products as a,
                            categories as b where a.cate_id=b.cate_id order by prod_id desc");
                            $i = 1;
                            while ($data = mysqli_fetch_array($select)) {
                            ?>
                                <tr>
                                    <!-- <td><?= $i; ?></td> -->
                                    <td><?= $data['barcode']; ?></td>
                                    <td><?= $data['cate_name']; ?></td>
                                    <td><?= $data['prod_name']; ?></td>
                                    <td><?= $data['qty']; ?></td>
                                    <td><?= number_format($data['sprice']) . " ກີບ"; ?></td>

                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </table>
                    </div>
                </div>

                <!-- ================================================== -->

                <div class="col-md-5">
                    <script>
                        $(function() { //ຄຳນນວນເງີນລວມ
                            $("#a").keyup(function() {
                                var a = $("#a").val();
                                var b = $("#b").val();
                                $.post("keyup_thon.php", {
                                        a: a,
                                        b: b
                                    },
                                    function(out) {
                                        $("#c").val(out);
                                    });
                            });
                        });
                    </script>

                    <?php
                    include('../connection/connection.php');
                    $select = mysqli_query($connection, " SELECT a.prod_id,a.prod_name,a.sprice,b.*,
                    c.cate_id,cate_name from products as a,sells as b,categories as c
                    where a.prod_id=b.prod_id and a.cate_id=c.cate_id and o='1'   ");

                   

                    if (isset($_GET['dele'])) {
                        $dele = mysqli_real_escape_string($connection, $_GET['dele']);

                        $btn = "UPDATE sells set o='0' where o_id='$dele'";
                        $query = mysqli_query($connection, $btn);

                        if ($query) {
                            mysqli_query($connection, "UPDATE products set qty=qty+'$oqty' where prod_id='$prod_id' ");
                            echo '<script>';
                            echo 'alertSuccess("ຍົກເລີກຮຽບຮ້ອຍແລ້ວ","select.php")';
                            echo '</script>';
                        } else {
                            echo '<script>';
                            echo 'alerterror("ມີບາງຢ່າງຜິດພາດ...!","select.php")' . $connection->error;
                            echo '</script>';
                        }
                    }

                    ?>
                    <div class="card-header text-center">
                        <h5><b>ລາຍການຂາຍສິນຄ້າ</b></h5>
                    </div>

                    <div class="card shadow container-fluid">
                        <table class="table table-bordered table-sm " style="font-size: small; color:red">
                            <tr class="btn-secondary">
                                <th>ລຳດັບ</th>
                                <th>ປະເພດ</th>
                                <th>ຊື່</th>
                                <th>ຈຳນວນ</th>
                                <th>ລາຄາ</th>
                                <!-- <th>ເງີນລວມ</th> -->
                                <th>ເລືອກ</th>
                            </tr>
                            <?php
                            $i = 1;
                            while 
                            ($data = mysqli_fetch_array($select)) {
                            ?>
                            

                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['cate_name']; ?></td>
                                    <td><?= $data['prod_name']; ?></td>
                                    <td><?= $data['oqty']; ?></td>
                                    <td><?= number_format($data['sprice']) . " ກີບ"; ?></td>
                                    <!-- <td><?= number_format($data['amounts']) . " ກີບ"; ?></td> -->
                                    <td align="center">
                                        <a type="button" class="btn btn-danger badge" data-toggle="dropdown">
                                            <font color="white"><i class="fa fa-times-circle"></i></font>
                                        </a>
                                        <div class="dropdown-menu" role="menu">
                                            <h4 class="modal-title btn-light">&nbsp;&nbsp;&nbsp; ສະແດງຂໍ້ມູນຍົກເລິກ:</h4>
                                            <iframe src="cancel.php?update=<?php echo $data['o_id'] ?>" class="frame-responsive" width="100%" height="300px" frameborder="0"></iframe>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }

                            ?>
                            <?php
                            include("../connection/connection.php");
                            $sum = mysqli_query($connection, " SELECT sum(sprice) as sm from sells where o=1 and o_id ");
                            $data_sum = mysqli_fetch_array($sum);
                            ?>
                            <tr>
                                <td colspan="4" style="font-size:12pt;text-align: right;"><b style="color: #000000;">ລວມເປັນເງີນ:</b></td>
                                <td colspan="2" style="font-size:12pt;color: red"><?= number_format($data_sum['sm']) . " ກີບ"; ?></td>
                            </tr>
                        </table>

                        <div class=" row" id="non-printable">
                            <div class="col-sm-6">
                                <h6><u><i><b>ອັດຕາຖອນເງີນ:</b></i></u></h6>
                                <?php
                                include("../connection/connection.php");
                                $sum = mysqli_query($connection, " SELECT sum(amounts) as sm from sells where o=1 ");
                                $data_summ = mysqli_fetch_array($sum);
                                ?>

                                <input type="hidden" class="form-control" id="b" value="<?php echo $data_summ['sm']; ?>">

                                <div class="form-group">
                                    <h6 class="col-form-label">ເງິນທີ່ໄດ້ຮັບ:</h6>
                                    <input type="text" id="a" class="form-control" placeholder="ປ້ອນຈຳນວນເງີນທີ່ໄດ້..." required>
                                </div>
                                <div class="form-group">
                                    <h6>ເງິນຖອນ:</h6>
                                    <input type="text" class="form-control" id="c" placeholder="0.00" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="btn bg-pink btn-sm" onclick="window.print()">
                                    <i class="fa fa-print"></i> ພິມ</a>
                                <a href="up.php" class="btn btn-success btn-sm btndele">
                                    <i class="fa fa-money"></i> ຊຳລະ</a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>


            </div>
        </div>
    </body>
</body>

</html>