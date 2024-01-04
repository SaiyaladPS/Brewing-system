<html>
<head>
    <title>select</title>
        <meta charset="utf-8" http-equiv="content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=devie-width, initial-scale=1">
        <link rel="stylesheet" href="boosttrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="icon/css/all.min.css">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
        <style>
            *{font-family:phetsarath ot;}
        </style>
        <script src="sweetalert/dist/sweetalert2.all.min.js"></script>
        <script src="jQuery.js"></script>
        <script>
            $(function(){				
                    $(".data").keyup(function(){
                var data = $(".data").val();
                
                    $.post("search_selectt_rocover.php",{
                        data:data
                    },
                    function(out){
                        $(".show_data").html(out);
                });
                
                });
            });
        </script>
</head>
<body class="my-5">
<?php
            include("connect.php");
            $sql = "select*from users where recover='0'";//ຄຳສັງເບີ່ງຂໍ້ມູນທັງໝົດຂອງຕາຕະລາງ
            $sql1="select a.pro_id,a.pro_name,b.dis_id,d.recover,b.dis_name,c.vill_id,c.vill_name,d.user_id,d.fname,d.lname,
                d.gender,d.dob,d.pro_id,d.dis_id,d.vill_id,d.tel,d.status,d.username,d.password,d.remark,d.date 
                from province as a,district as b,village as c,users as d where d.recover='0' and a.pro_id=d.pro_id and b.dis_id=d.dis_id and
                c.vill_id=d.vill_id order by d.user_id desc";
            $sql2="select count(user_id) from users where recover='0'";
            $select = mysqli_query($conn,$sql1);
            $select_count=mysqli_query($conn,$sql2);//ຄຳສັງໃຫ້ທຳງານ
            $data_count=mysqli_fetch_array($select_count);
        ?>
        <div class="container-fulid">
            <h3><center><b>ຂໍ້ມູນ ຜູ້ນຳໃຊ້ທີ່ຖືກລົບ</b></center></h3>
            <hr>
    
    
    
        <h4>ມີທັງໝົດ : <?php echo $data_count[0];?> ຄົນ </h4>	
                        <form class="form-inline bg-white">
        <div class="form-group">
            <label class="mx-sm-4"><h4>ຄົ້ນຫາຂໍ້ມູນພະນັກງານ</h4></label>
            <input type="text" class="form-control data" placeholder="ປ້ອນຂໍ້ມຸນເພື່ອຄົ້ນຫາ...">
        </div>
        <div class="form-group">
            <label class="mx-sm-4"></label>
            
            <a href="select_user.php" class="btn btn-sm btn-info"> <i class="fas fa-angle-double-left"></i> ກັບຄືນ </a>
        </div>
    </form>
                        <div class="show_data">
        <table class="table table-hover table-striped table-bordered table-sm datatable">
            <thead>
            <tr class="bg-dark text-white tr-sm">
                <th>ລຳດັບ</th>					
                <th>ຊື່ ແລະ ນາມສະກຸນ</th>
                <th>ສິດທິ</th>
                <th>ບ້ານ</th>									
                <th>ເມືອງ</th>
                <th>ແຂວງ</th>						
                <th>ໝາຍເຫດ</th>					
                <th width="150px">ລາຍລະອຽດ</th>
                <th>ກູ້ຂໍ້ມູນ</th>
                <th>ລົບ</th>
            </tr>
            </thead>

            <tbody>
        <?php
        $a=1;
        while($data=mysqli_fetch_array($select)){
        ?>
            <tr>
                <td><?php echo $a; ?></td>
                
                <td><?php echo $data["fname"]; ?> <?php echo $data["lname"]; ?></td>
                <td><?php echo $data["status"]; ?></td>	
                <td><?php echo $data["vill_name"]; ?></td>											
                <td><?php echo $data["dis_name"]; ?></td>																			
                <td><?php echo $data["pro_name"]; ?></td>	
                <td><?php echo $data["remark"]; ?></td>							
                <td>
                <a href="showall_recover.php?user_id=<?php echo $data['user_id'];?>">
                    <button type="button" class="btn btn-sm btn-warning">
                        
<i class="fas fa-book"></i>
                    ລາຍອຽດ
                        
                    </button>
                    </a>
                </td>
                <td>
                <a href="recover_back_user.php?user_id=<?php echo $data['user_id'];?>" onclick="return confirm('ທ່ານຕ້ອງການກູ້ຂໍມູນບໍ່ ?')">
                    <button type="button" class="btn btn-sm btn-success">
                    
                        <i class="fas fa-undo"></i>
                    </button>
                    </a>
                </td>
                <td>
                <a href="delete_user.php?user_id=<?php echo $data['user_id'];?>" onclick="return confirm('ທ່ານແນ່ໃຈແລ້ວບໍ່ ?')">
                    <button type="button" class="btn btn-sm btn-danger">
                    
                        <i class="fas fa-window-close"></i>
                    </button>
                </a>
                 </td>
            </tr>
            
        <?php
            $a++;
            }
        ?>
        </tbody>
        </table>
        </div>
    </div>
    </div>
    
    <!--<script src="assets/js/jquery-3.6.0.min.js"></script>-->
<script src="../assets/plugins/datatables/datables_laos.min.js"></script>
<script src="../assets/js/script.js"></script>
</body>

</html>