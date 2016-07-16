
<script src="http://code.jquery.com/jquery-1.6.3.js"></script>
<script type="text/javascript">


		
			$(document).ready(function(){
				//var haha=$('#validation_un').attr('value');
				$("#validation_un_show").prop('disabled', true);
			//	$('#msg').html(haha);

			});
			
			/*
			$(document).ready(function(){
			$('#vasubmit').click( function(){
				
				
				$.post($("#valiform").attr("action"),
				$("#valiform:input").serializeArray(),
				function(info){
					$("#msg").empty();
					$("#msg").html(info);
					
					
					});
				$("#valiform").submit( function() {
					
					return false;
					});
				
				});

			});*/
			
		
</script>
<?php
$update_key=false;
include_once('db.php');
if(isset($_POST['vasubmit']))
		{

			$vaun=$_POST["validation_un"];
			$vapw=$_POST["validation_pw"];


		}
			//echo $vaun;
			//echo $vapw;
			$vapw=md5($vapw);
			
			vadbConnect();
			$msg='';
	global $mysqliva;
	$query = "select * from KXT209_Users where Username='".trim($vaun)."';";
	//echo $query;
	$result = $mysqliva->query($query);
	$arr2 = $result->fetch_array(MYSQLI_ASSOC);
	//print_r($arr2);
	if(isset($vaun)&&$arr2[Password]!=$vapw)
	{ 
		$msg='You have entered wrong password. Please try again';
		
	
	}
	 if($arr2[Password]===$vapw)
	{
	$msg='';
	$update_key=true;
	}
vacloseConnection() ;
			

?>
<h2>Admin Page</h2>

<?php
	if($_SESSION['ul']==1){
		
		//echo $_SESSION['ul'];
		echo "<form action='' method='POST' id='valiform'>";
		echo "<input type='hidden' name='validation_un' id='validation_un' value='".$_SESSION['un']."'>";
		echo "<center>";
		echo "<table>";
		//echo "working";
	
		echo "<tr>";
		echo "<td>";
		echo "Username: ";
		echo "</td>";
		echo "<td>";
		echo "<input disabled type='text' name='validation_un_show' id='validation_un_show' value='".$_SESSION['un']."'><br>";
		
		echo "</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td>";
		echo "Password:";
		echo "</td>";
		echo "<td>";
		echo" <input type='password' id='validation_pw' name='validation_pw'>";
		echo "<input type='submit' id='vasubmit' name='vasubmit' value='submit'>";
		echo "</td>";
		echo "</tr>";
		
	
		echo "</form>";
		echo "</table>";
		echo "<div id='msg'  style='color:red;'>".$msg."</div>";
		echo "</center>";
		
		
		}
	else{
		
		//echo $_SESSION['ul'];
		
		echo "<p style='color:red;'>You do not have access to this page.</p>";
		echo "<a href=".$rootPath."index.php>Go back home page</a>";
		
		}
		if($update_key)
   {
	 echo '<meta http-equiv="refresh" content="0; url=managepage.php" />';
	 $_SESSION['access']=1;
	
	}
?>

<br><br><br>