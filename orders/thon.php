

<?php
	$aa = $_POST['aa'];
	$bb = $_POST['bb'];
	@$aaa =$aa - $bb;
	@$bbb = $bb-$aa;
		if($aa < $bb){
			echo "ຍັງ ".number_format($bbb)." ກີບ";
		}else if($aa<=$bb){
            echo $aaa;
        }else{
			echo "ທອນ ".number_format($aaa)." ກີບ";
		}
?>