<?php
	session_start();//ປະກາດນຳໃຊ້ session
	include("connect.php");//ເອີ້ນຟາຍທີເຊືອມໂຍງຫາຖານຂ້ມູນມານຳໃຊ້
	$username=$_POST["username"];//ວາງຕົວປຽນຮັບເອົາຂໍ້ມູນ
	$password=$_POST["password"];
	
	$q=mysqli_query($conn,"select user_id,status,fname,lname from users
	where username='$username' and password=password('$password')");
	$a=mysqli_num_rows($q);//ກວດສອບຂໍ້ມູນ
	if($a <> 0){//ຖ້າມີຂໍ້ມູນ ໃຫ້ທຳຕາມເງືອນໄຂດັ່ງນີ້
		$rows=mysqli_fetch_array($q);
			if($rows['status']=="ບໍລິຫານ"){//ຖ້າຫາກສະຖານະຂອງຜູ້ລ໋ອກອີນແມ່ນຜູ້ບໍລິຫານ
				$_SESSION['user_id']=$rows['user_id'];//ວາງຕົວປຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
				$_SESSION['fname']=$rows['fname'];//ວາງຕົວປຽນ fname ເກັບເອົາຊື່
				$_SESSION['lname']=$rows['lname'];//ວາງຕົວປຽນ fname ເກັບເອົາຊື່
				
				$_SESSION['checked']=1;//ວາງຕົວປຽນ check ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ
				echo"
				<script>
let timerInterval
Swal.fire({
  title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
  timer: 1500,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
window.setTimeout(function(){ 
    location='menu_admin.php';
} ,1500);
				</script>
				";
			}else if($rows['status']=="ຜູ້ຊື້"){//ຖ້າຫາກສະຖານະຂອງຜູ້ລ໋ອກອີນແມ່ນຜູ້ບໍລິຫານ
				$_SESSION['user_id']=$rows['user_id'];//ວາງຕົວປຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
				$_SESSION['fname']=$rows['fname'];//ວາງຕົວປຽນ fname ເກັບເອົາຊື່
				$_SESSION['lname']=$rows['lname'];//ວາງຕົວປຽນ lname ເກັບເອົານາມສະກຸນ
				$_SESSION['checked']=1;//ວາງຕົວປຽນ check ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ
				echo"
				<script>
let timerInterval
Swal.fire({
  title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
  timer: 1500,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
window.setTimeout(function(){ 
    location='menu_buy.php';
} ,1500);
				</script>
				";
			}else if($rows['status']=="ຜູ້ຂາຍ"){//ຖ້າຫາກສະຖານະຂອງຜູ້ລ໋ອກອີນແມ່ນຜູ້ບໍລິຫານ
				$_SESSION['user_id']=$rows['user_id'];//ວາງຕົວປຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
				$_SESSION['fname']=$rows['fname'];//ວາງຕົວປຽນ fname ເກັບເອົາຊື່
				$_SESSION['lname']=$rows['lname'];//ວາງຕົວປຽນ lname ເກັບເອົານາມສະກຸນ
				$_SESSION['checked']=1;//ວາງຕົວປຽນ check ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ
				echo"
				<script>
let timerInterval
Swal.fire({
  title: 'ກຳລັງເຂົ້າສູ່ລະບົບ!',
  timer: 1500,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
window.setTimeout(function(){ 
    location='menu_sell.php';
} ,1500);
				</script>
				";
			}
			}else{
				echo"
					<script>
					Swal.fire({
							position: 'center',
							icon: 'error',
							title: 'ຊື່ ຫຼື ລະຫັດຜ່ານບໍຖືກຕ້ອງ',
							showConfirmButton: false,
							timer: 1500
						})
					</script>
				";
			}
?>