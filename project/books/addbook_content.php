
<?php

function addbookuserConnect() {
					global $mysqliaddbookuser;
					$mysqliaddbookuser = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}



	function addbookusercloseConnection() {
					global $mysqliaddbookuser;
					$mysqliaddbookuser->close();
					
					
			}
			
			
$get_date=date("Y-m-d h:i:s");
$insert_key=true;


?>
<h2>Book Details</h2><br>

<?php


//print_r($_GET);
	if($_SESSION['ul']!=0)
{	
addbookuserConnect() ;

global $mysqliaddbookuser;
$query ="SELECT BookID FROM `KXT209_User_Library` where UserID=".$_GET['user_id']."";
//echo $query;
$result = $mysqliaddbookuser->query($query);
while($arr = $result->fetch_array(MYSQLI_ASSOC))
{
//	print_r($arr);
	if($arr['BookID']===$_GET['book_id'])
	{
		//echo "hahah";
		$insert_key=false;
		}
	//else{
		//echo "hehehe";
		
	//	}
	}
	//print_r($insert_key);
	if($insert_key){
		
		$query ="INSERT INTO `KXT209_User_Library`(`UserID`, `BookID`, `Updated_Time`) VALUES ('".$_GET['user_id']."','".$_GET['book_id']."','".$get_date."')";
	//	echo $query;
		$result = $mysqliaddbookuser->query($query);
		echo "<b style='color:blue;' id='fnmsg'>You have successfully added book in your library.</b>";
				
	}
	else{
		
		
		echo "<b style='color:red;' id='fnmsg'>You have already added this book.</b>";
		
	}
	
	
		echo "<br><br><a name='book_title' href='";
		echo $rootPath;							
		echo"books/index.php?get_book_title=";
		echo $_GET['book_title'];
		echo "&search_submit=Search'>";												
		echo 'Go back to Book Details.';
		echo "</a>";
		echo '<br>';
	
	
addbookusercloseConnection();

}

else{
	
		
		echo "<p style='color:red;'>You do not have access to this page.</p>";
		echo "<a href=".$rootPath."index.php>Go back home page</a>";
	
	
}
?>