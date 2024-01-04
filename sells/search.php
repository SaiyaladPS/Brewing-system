<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="content">
        <div class="content-header">
            <div class="contianer-fulid">
                <div class=" animate__animated animate__fadeInUp">
                    <div class="container-fluid">

                        <table id="" class="table table-bordered table-sm">
                            <?php
                            include("../connection/connection.php");
                            include('../controllers.php');
                            $data = $_POST['data'];
                            $mysql = "SELECT a.*,b.*,c.*,d.* from
                                sells as a,customer as b,products as c,categories as d
                                where o='2' and
                                a.cus_id=b.cus_id and a.prod_id=c.prod_id and c.cate_id=d.cate_id and
                                (b.cus_id like'%$data%' or b.fname like'%$data%') and a.odate=curdate() ";

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
                                        <th>ເວລາຂາຍ</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $a = 1;
                                    while ($re = mysqli_fetch_array($result)) { ?>
                                        <tr>

                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $re['fname']; ?></td>
                                            <td><?php echo $re['prod_name']; ?></td>
                                            <td><?= number_format($re['sprice']) . " .ກີບ"; ?></td>
                                            <td><?php echo $re['oqty']; ?></td>
                                            <td><?= number_format($re['amounts']) . " .ກີບ"; ?></td>
                                            <td><?php echo $re['odate']; ?></td>
                                            <td><?php echo $re['otime']; ?></td>
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
            </div>
        </div>
</body>

</html>