<?php
				
					$a = $_POST['a'];
					$b = $_POST['b'];
					if($a && $b){
						echo number_format($a - $b)." ກີບ";
					}else{
						echo "0.00";
					}
					?>
