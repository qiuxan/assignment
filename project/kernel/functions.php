<?php

function dbConnect() {
					global $mysqli;
					$mysqli = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
				
				
	function closeConnection() {
					global $mysqli;
					$mysqli->close();
					
					
			}	
			
			



/*
echo $_POST["sign_up_un"];// testing!
echo $_POST["sign_up_pw"];
echo $_POST["sign_up_pw_re"];
echo $_POST["sign_up_fn"];
echo $_POST["sign_up_mn"];
echo $_POST["sign_up_ln"];
echo $_POST["sign_up_by"];
echo $_POST["sign_up_bm"];
echo $_POST["sign_up_bd"];
echo $_POST["sign_up_em"];
echo $_POST["sign_up_pn"];
echo $_POST["sign_up_ws"];
echo $_POST["sign_up_afl"];*/


?>