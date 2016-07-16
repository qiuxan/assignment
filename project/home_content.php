<h2>Home</h2>
<h3>Welcome to CIS Library Portal Website</h3>
<p> <font color="#78a040">A brief introduction</font></p>

<p>

	
	<b>Home</b><font color="#78a040">-A brief decription</font><br />
    <b>Search result</b><font color="#78a040">-A brief decription</font><br />
    <b>Book details</b><font color="#78a040">-A brief decription</font><br />
    <b>Sign up</b><font color="#78a040">-A brief decription</font><br />
    <b>My Page</b><font color="#78a040">-A brief decription</font><br />
    <b>My Library</b><font color="#78a040">-A brief decription</font><br />
    <b>Admin Page</b><font color="#78a040">-A brief decription</font><br />
    
<?php

function mpdbConnect() {
					global $mysqlimp;
					$mysqlimp = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
	function mpcloseConnection() {
					global $mysqlimp;
					$mysqlimp->close();
			}

mpdbConnect();
if($_SESSION['un']!=''&&!$_SESSION['login_inf'])

{
	global $mysqlimp;
$query = "SELECT * FROM `KXT209_Users` where `Username`='".$_SESSION['un']."'";

$resultmp = $mysqlimp->query($query);
$arr = $resultmp->fetch_array(MYSQLI_ASSOC);
//print_r($arr);
$_SESSION['ul']=$arr['Ulevel'];
$_SESSION['id']=$arr['ID'];
//print_r($_SESSION);
//nothing special here!
}
mpcloseConnection();
?>

</p>	




