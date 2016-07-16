<style>
p.msg{
	position:relative;
	right:200px
	}
A.login:link{text-decoration:none}
A.login:visited{text-decoration:none}
A.login:hover {text-decoration:underline}
</style>
<?php
session_start();
if(!isset($_SESSION['login_inf']))
  $_SESSION['login_inf']=true;

if(!isset($_SESSION['un']))
  $_SESSION['un']='';
//this session is to save user's information. In this case, just a bool varilable to control the login status and username are saved. In future maybe save something more
if(!isset($_SESSION['ul']))
  $_SESSION['ul']='0';

if(!isset($_SESSION['id']))
  $_SESSION['id']='0';

if(!isset($_SESSION['access']))
  $_SESSION['access']=0;

if(!isset($_SESSION['userpage']))
  $_SESSION['userpage']=0;
if(!isset($_SESSION['bookpage']))
  $_SESSION['bookpage']=0;
if(!isset($_SESSION['update_uid']))
  $_SESSION['update_uid']=0;

if(!isset($_SESSION['back']))
  $_SESSION['back']=0;

if(!isset($_SESSION['addinfo']))
  $_SESSION['addinfo']=0;

if(!isset($_SESSION['addbook']))
  $_SESSION['addbook']=array();
?>

<?php
//function
function signindbConnect() {
					global $mysqli2;
					$mysqli2 = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
	function signincloseConnection() {
					global $mysqli2;
					$mysqli2->close();
			}
?>
<?php

	signindbConnect();
	if(isset($_POST["loginsubmit"]))
	{
		$_SESSION['un']=$_POST["loginun"];
		$un=$_POST["loginun"];
		$pw=$_POST["loginpw"];
		$md5_pw=md5($pw); //check password
		
		//signindbConnect();
		
		global $mysqli2;
		$query = "select * from KXT209_Users where Username='".trim($un)."';";
		if( strlen( $query ) <= 0 ) return;
		$result = $mysqli2->query($query);
		$arr2 = $result->fetch_array(MYSQLI_ASSOC);
		
		
		
		if(!$arr2){
			$_SESSION['login_inf']=true;
			$msglogin="Username not exist,sign up first!";
			
			}
		
		if($arr2&&$md5_pw!==$arr2[Password]){
			$_SESSION['login_inf']=true;
			$msglogin="Your password is not corret!";
								
		}
		if($arr2&&$md5_pw===$arr2[Password]){
			$_SESSION['login_inf']=false;
			$_SESSION['ul']=$arr2[Ulevel];
			$_SESSION['id']=$arr2[ID];
		}
		//print_r($arr2);
		//print_r($arr2);
		//print_r($_SESSION);
		
		//signincloseConnection();
	}
	
	
	
	if (isset($_POST['logoff']))
	{
		$_SESSION['login_inf']=true;//logff button clicked. clear session
		$_SESSION['un']='';
		$_SESSION['ul']=0;
		
		}
	
	if(isset($signup_key)&&$signup_key){
		 $_SESSION['login_inf']=false;// login success
		 $_SESSION['un']=$sign_up_un;
		
		
		
		
		}
		
	signincloseConnection();	

?>

<form action="" method="post"><?php //just post to the current page rooPath/index.php?>

<?php
	
			

	if($_SESSION['login_inf'])//login fail or started status of loginbar
	{
		echo '<a href="';
		
		echo $rootPath;
		echo 'users/index.php">If you haven\'t sign up, create your account </a>';
		echo'Username:<input type="text" name="loginun"> ';
		echo 'Password:<input type="password" name="loginpw" >';
		echo "&nbsp;&nbsp;&nbsp;";
		echo'<input type="submit" value="Login" name="loginsubmit">';
		
		echo "<p class='msg' align='right'><font color='red'> ";
		if (isset($msglogin)) echo	"$msglogin";
		echo " &nbsp;</font></p>";
		
	}
	
	else {//login status of loginbar
		
		
		echo"Welcome! &nbsp;";
		echo "<font color='#78a040'>";
		echo $_SESSION['un'];
		echo "</font>";
		
		echo "&nbsp;";
		
		echo "[";
		echo'<a class="login" href=';
		echo $rootPath;
		echo 'kernel/mylibrary/index.php>My Library</a>';
		echo "]";
		
		echo "&nbsp;";
		
		echo "[";
		echo'<a class="login" href=';
		echo $rootPath;
		echo 'kernel/mypage/index.php>My Page</a>';
		echo "]";
		
		echo "&nbsp;";
		
		if($_SESSION['ul']==1)
		{
		echo "[";
		echo'<a class="login" href=';
		echo $rootPath;
		echo 'admin/index.php>Admin Page</a>';
		echo "]";
		}
		
		echo "&nbsp;";
		
		echo '<form action="';
		echo $rootPath;
		echo '" index.php method="post">';
		echo '<input type="submit" value="Logout" name="logoff">';
		
		echo '</form>';
		
		
	
	}
	
?>
</form>

