<h2>Popular Subject</h2>
<?php


function searchdbConnectps() {
					global $mysqlips;
					$mysqlips = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}



	function searchcloseConnectionps() {
					global $mysqlips;
					$mysqlips->close();
					
					
			}


?>

<?php 

searchdbConnectps();

//searchdbConnectps();

//echo $get_pop_sbj;
/*

if(isset($get_pop_sbj))
{

//SELECT id FROM `KXT209_Subject` where subject='Computer Science'
$querry_get_sbjid="SELECT id FROM `KXT209_Subject` where subject='$get_pop_sbj'";
//echo $querry_get_sbjid;
$result_get_sujid = $mysqlips->query($querry_get_sbjid);
$arr_get_sbid=$result_get_sujid->fetch_array(MYSQLI_ASSOC);
//print_r($arr_get_sbid);
$get_sbid=$arr_get_sbid['id'];
//echo $get_sbid;


//SELECT * FROM `KXT209_Popularity` where element_id=14 and type='Subject'
$querry_pop_info="SELECT * FROM `KXT209_Popularity` where element_id=$get_sbid and type='Subject'";
//echo $querry_pop_info;
$result_pop_info = $mysqlips->query($querry_pop_info);
$arr_pop_info=$result_pop_info->fetch_array(MYSQLI_ASSOC);
//echo "point1:<br>";
//print_r($arr_pop_info);
	 if(!$arr_pop_info['Element_id'])
	 {
	 
		 //INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`, `LUpdated_time`) VALUES ('Subject',$get_sbid,1,'$get_date','$get_date')
		 $querry_inser_popsbj="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`, `LUpdated_time`) VALUES ('Subject',$get_sbid,1,'$get_date','$get_date')";
	//	 echo $querry_inser_popsbj;
	 	$result_inser_popsbj = $mysqlips->query($querry_inser_popsbj);
	 
	 }
	else
	{
		//UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' WHERE Element_id=14 and Type='Subject'
		$i=$arr_pop_info[Count]+1;
		$querry_ud_popsbj="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' WHERE Element_id=$get_sbid and Type='Subject'";
		$result_ud_popsbj = $mysqlips->query($querry_ud_popsbj);
		
		
		}

}

*/


$querry_pri_popsbjid="SELECT element_id FROM `KXT209_Popularity` where Type='Subject' ORDER BY `KXT209_Popularity`.`Count`  DESC";

$result_pri_popsbjid = $mysqlips->query($querry_pri_popsbjid);
 $i=1;
 echo "<br>";
while($arr_pri_popsbjid=$result_pri_popsbjid->fetch_array(MYSQLI_ASSOC))
{
	
	$idnum =$arr_pri_popsbjid[element_id];
	$querry_pri_sbj="SELECT * FROM `KXT209_Subject` where ID=$idnum";
	$result_pri_popsbj = $mysqlips->query($querry_pri_sbj);
	$arr_pri_popsbj=$result_pri_popsbj->fetch_array(MYSQLI_ASSOC);
	$get_print_sbj=$arr_pri_popsbj[Subject];
	
	
	if($i<7)
	{
	echo $i.'. ';
	
	echo '<a href="';
	echo $rootPath;
	echo '/search/index.php?get_index=Subject&get_search_info=';
	echo urlencode($get_print_sbj);
	echo '&search_submit=Search';
	echo '">';
	echo $get_print_sbj;
	echo '</a>';
	echo "<br>";
	$i++;
	}
	
	
	}




searchcloseConnectionps();
?>