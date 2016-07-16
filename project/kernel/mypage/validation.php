<?php

//This page is used to submit the update data into the database. Also give feedback of whether updating success or not!

//echo 'dbconnect';

	$get_date=date("Y-m-d h:i:s");
	function validationdbConnect() {
		
					global $mysqlivalidation;
					$mysqlivalidation = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
	function validationcloseConnection() {
					global $mysqlivalidation;
					$mysqlivalidation->close();
			}

?>


<?php
	
	$msg='';
	$update_key=true;
	//print_r($_POST);
	if(isset($_POST['update_fn']))
	{
		$un=$_POST['update_un'];
		$fn=$_POST['update_fn'];
		$mn=$_POST['update_mn'];
		$ln=$_POST['update_ln'];
		$dob=$_POST['update_dob'];
		$em=$_POST['update_em'];
		$ph=$_POST['update_ph'];
		$ws=$_POST['update_ws'];
		$afl=$_POST['update_afl'];
				
		
		}

		if($fn==""){
		
				$update_key=false;
				echo "<b id='fn_msg'>Require</b>";	
				
			}
		
			
		if($ln==""){
		
				$update_key=false;
				echo "<b id='ln_msg'>Require</b>";	
				
			}
		
			if($dob==""){

					$update_key=false;
					echo "<b id='dob_msg'>Require</b>";	

				}
			
		
				if($em==""){

						$update_key=false;
						echo "<b id='em_msg'>Require</b>";	

					}
				
					else if(!strpos($em,"@")&& $sign_up_em!==''){
							$update_key=false;
							echo "<b id='em_msg'>wrong type of email!</b>";
						}
				
					if($afl==""){

							$update_key=false;
							echo "<b id='afl_msg'>Require</b>";	

						}
				
					
							
			
	
		validationdbConnect();
		
if($update_key){		
	
	
	global $mysqlivalidation;
	$query = "UPDATE `KXT209_Users` SET `FName`='$fn',`MName`='$mn',`LName`='$ln',`Birthdate`='$dob',`Email`='$em',`Phone`='$ph',`Website`='$ws',`Affli`='$afl',`Updated_date`='$get_date' WHERE username='$un' ";
	
	//echo $query;
	$result = $mysqlivalidation->query($query);
	
	echo '<b id="msgupdate">You have success updateed your details.</b>';
	
	
		
}

validationcloseConnection();


?>