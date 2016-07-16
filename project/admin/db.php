<?php
//echo 'dbconnect';
	function vadbConnect() {
		
					global $mysqliva;
					$mysqliva = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
	function vacloseConnection() {
					global $mysqliva;
					$mysqliva->close();
			}

?>