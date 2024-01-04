<script src="../puligins/jquery.js"></script>
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
    $(function() {
        $(".data").keyup(function() {
            var a = $(".data").val();
            $.post("search.php", {
                    data: a
                },
                function(output) {
                    $(".show").html(output);
                });
        });
    });
</script>

<?php
include_once('../connection/connection.php'); //ດືງເອົ່າຖານຂໍ້ມູນມານຳໃຊ້
include_once('../controllers.php'); //ດືງເອົ່າແຕ່ລະຂໍ້ມູນການຕົກແຕ່ງມາທຳງານ

// $count = mysqli_query($connection, " SELECT count(o_id) from sells where o='2' ");
// $count = mysqli_fetch_array($count);

?>

<div class="content">
    <div class="content-header">
        <div class="contianer-fulid">
            <div class="card" id="non-printable">
                <div class="card-header bg-light card-outline">
                    <h3 align="center">
                        <font color="green"><b> ລາຍງານສິນຄ້າຂາຍອອກໃນມື້ນີ້</b></font>
                    </h3>
                </div>

                <div class="col-md-12">
                    <div class="container">
                        <!-- <p align="center">ລວມທັງໝົດມີ: <b style="color:red;"><?= $count[0]; ?></b> ລາຍການ.</p> -->
                        <div class="row">
                            <div class="col-md-4">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fa fa-user"></span>
                                        </div>
                                        <input type="search" class=" form-control data" placeholder="ປ້ອນຊື່ລູກຄ້າ...">
                                    </div>
                                </form>
                            </div>

                            <!-- <div class="col-md-4">
                                <a class="btn btn-success" onclick="window.print();"><i class="fa fa-print"></i> ພີມບີນ</a>
                            </div> -->
                        </div>


                        <div class="show"></div>
                    </div>
                    <!-- ================= -->


                </div>
            </div>
        </div>
    </div>