<?php
//function
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
?>
<?php
$get_date1=date("Y-m-d h:i:s");

dbConnect();

if(isset($_POST['Submit'])){
	
	$sign_up_un=htmlentities($_POST['sign_up_un']);
	$sign_up_pw=htmlentities($_POST['sign_up_pw']);
	$sign_up_pw_re=htmlentities($_POST['sign_up_pw_re']);
	$sign_up_fn=htmlentities($_POST['sign_up_fn']);
	$sign_up_mn=htmlentities($_POST['sign_up_mn']);
	$sign_up_ln=htmlentities($_POST['sign_up_ln']);
	$sign_up_by=htmlentities($_POST['sign_up_by']);
	$sign_up_bm=htmlentities($_POST['sign_up_bm']);
	$sign_up_bd=htmlentities($_POST['sign_up_bd']);
	$sign_up_em=htmlentities($_POST['sign_up_em']);
	$sign_up_pn=htmlentities($_POST['sign_up_pn']);
	$sign_up_ws=htmlentities($_POST['sign_up_ws']);
	$sign_up_afl=htmlentities($_POST['sign_up_afl']);
	
	$signup_key=true;
	
	if($sign_up_un==""){
		$signup_key=false;
		$msg1="Please enter username";	
		
	}
	global $mysqli;
	$query = "select * from KXT209_Users where Username='".trim($sign_up_un)."';";
	if( strlen( $query ) <= 0 ) return;
	$result = $mysqli->query($query);
	$arr = $result->fetch_array(MYSQLI_ASSOC);
	
	if($arr[Username]){
		$signup_key=false;
		$msg1="Username already taken";		
		
	}
	
	// check passwrod
	if($sign_up_pw==""){
		$signup_key=false;
		$msg_pw1="Please enter password";	
		
	}	
	
	
	if(strlen($sign_up_pw)<4){
		$signup_key=false;
		$msg_pw1="Password too short!";	
		
	}	


	if(strpos($sign_up_pw," ")){
		$signup_key=false;
		$msg_pw1="Space not allowed!";
	}

	//check retyped password
	if($sign_up_pw_re!==$sign_up_pw){
		$signup_key=false;
		$msg_pw2="Different password!";	
		
	}	
	
	//check firstname
	if($sign_up_fn==""){
		$signup_key=false;
		$msg_fn="Please enter first name";	
		
	}
	
	
	if($sign_up_ln==""){
		$signup_key=false;
		$msg_ln="Please enter last name";	
		
	}

	//check date
	if(!checkdate($sign_up_bm,$sign_up_bd,$sign_up_by)){
		$signup_key=false;
		$msg_date="invalid date";	
		
	}

	//check email
	
	if($sign_up_em==""){
		$signup_key=false;
		$msg_em="please enter email!";	
		
	}
	
	
	if(!strpos($sign_up_em,"@")&& $sign_up_em!==''){
		$signup_key=false;
		$msg_em="wrong type of email!";
	}
	
	
	//sign_up_afl
	if($sign_up_afl==""){
		$signup_key=false;
		$msg_afl="please enter Affliation!";	
		
	}
	
	


}

if($signup_key){// if there is nothing make the key false it will do insert action!
	
	$md5_pw= md5($sign_up_pw);
	
	
	
	
	$query="INSERT INTO `KXT209_Users`( `Username`, `Password`, `FName`, `MName`, `LName`, `Birthdate`, `Email`, `Phone`, `Website`, `Affli`, `Updated_date`,`Ulevel`) VALUES ('$sign_up_un','$md5_pw','$sign_up_fn','$sign_up_mn','$sign_up_ln','$sign_up_by-$sign_up_bm-$sign_up_bd','$sign_up_em','$sign_up_pn','$sign_up_ws','$sign_up_afl','$get_date1',2)";
	
	
	if( strlen( $query ) <= 0 ) return;
	$result = $mysqli->query($query);
	
	
	
	
	}


	closeConnection();
	


?>




<?php

	//Standard page setup
	
	
	$KERNEL_LOCATION = '../';    
	require($KERNEL_LOCATION.'includes.php');
    
	$pageTitle       = 'Page Title Here';
	$rootPath        = '../../';
	if($signup_key)// if sign success make the page content homecontent and sent information to the session
	{
	//$_SESSION['access']=1;
	//$_SESSION['ul']=2;
	$pageContents = $rootPath.'home_content.php';
	$_SESSION['login_inf']=true;
	
	$un=$sign_up_un;
	
	}
	else $pageContents =$rootPath.'/users/signup_content.php';
	
	require($rootPath.'master_page.php');

	
?>


