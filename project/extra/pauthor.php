<h2> Popular Authors</h2>
<?php

//THE COMMENT here is also can be use at other file in this folder!!!!!

$get_date=date("Y-m-d h:i:s");
?>
<?php
//function
function signindbConnectpa() {
					global $mysqlipa;
					$mysqlipa = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}

	function signincloseConnectionpa() {
					global $mysqlipa;
					$mysqlipa->close();
					
					
			}

function signindbConnectprint() {
					global $mysqlipr;
					$mysqlipr = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}

	function signincloseConnectionprint() {
					global $mysqlipr;
					$mysqlipr->close();
					
			}


?>

<?php
//THIS IS THE CODE I DID FIRSTLY: every time serch the name popularity ++1 


/*
signindbConnectpa();

 if(isset($pget_fn))
 {
	global $mysqlipa;
	$query="SELECT id FROM `KXT209_Author` Where Fname='$pget_fn' and Mname='$pget_mn' and Lname='$pget_ln';";
	//echo $query;

	$result = $mysqlipa->query($query);
	 $arr3 = $result->fetch_array(MYSQLI_ASSOC);
	 //print_r($arr3);
	 $pget_aid=$arr3[id];
	 //echo $pget_aid;
	 
//SELECT id FROM `KXT209_Author` Where Fname='$pget_fn' and Mname='$pget_mn' and Lname='$pget_ln'
//SELECT *  FROM `KXT209_Popularity` Where Element_id ='$pget_aid'
	$queryp="SELECT *  FROM `KXT209_Popularity` Where Element_id ='$pget_aid'";
	
	$result = $mysqlipa->query($queryp);
	
	$arrpau = $result->fetch_array(MYSQLI_ASSOC);
	//print_r($arrpau);
	
	if(!isset($arrpau[Element_id]))
	{
		$queryinsert=" INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`,`Created_time`) VALUES ('Author',$pget_aid,1,'$get_date')";
		//echo $queryinsert;
		$result = $mysqlipa->query($queryinsert);
		
		
		}
	else
	{
		
		//echo"<br>";
		//echo $arrpau[Count];
		$count_num=$arrpau[Count]+1;
		
		$queryupdate="UPDATE `KXT209_Popularity` SET `Count`=$count_num,`LUpdated_time`='$get_date' WHERE Type='Author' and Element_id=$arrpau[Element_id]";
		//echo $queryupdate;
		$result = $mysqlipa->query($queryupdate);
		
		//UPDATE `KXT209_Popularity` SET `ID`=[value-1],`Type`=[value-2],`Element_id`=[value-3],`Count`=[value-4],`Created_time`=[value-5],`LUpdated_time`=[value-6] WHERE 1
		
		
		
		}
 }
	
	
			


signincloseConnectionpa();
*/


?>

<?php // this page now just print the outcome
signindbConnectprint();
global $mysqlipr;
$querypd=" SELECT Element_id FROM `KXT209_Popularity` Where Type ='Author' ORDER BY `KXT209_Popularity`.`Count`  DESC";
//echo $querypd;
$result = $mysqlipr->query($querypd);
$i=1;
while(($arrprint = $result->fetch_array(MYSQLI_ASSOC)))
{
		if($i<7)//only print the first 6 elements
		{	
					echo'<br>';
				$get_author_id=$arrprint[Element_id];
				$queryget_name="SELECT Fname,Mname,Lname FROM `KXT209_Author` Where ID=$get_author_id";
				$result2 = $mysqlipr->query($queryget_name);
				$arrname = $result2->fetch_array(MYSQLI_ASSOC);
				
				echo $i.'. ';
				echo"<a name='author_name'";
						
						echo "href='";
						echo $rootPath;
						echo "/search/index.php?get_index=Author&get_search_info=";
						
						echo $arrname[Fname].'+';
						echo $arrname[Mname].'+';
						echo $arrname[Lname];
															
						echo "&search_submit=Search'";
						
						echo ">";
						
						
						echo $arrname[Fname].' ';
						echo $arrname[Mname].' ';
						echo $arrname[Lname].' ';
						echo "</a>";
						echo " &nbsp;";

							$i++;
	}

}


signincloseConnectionprint();

?>