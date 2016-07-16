<h2> Popular Keyword</h2>

<?php

function searchdbConnectpk() {
					global $mysqlipk;
					$mysqlipk = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}


	function searchcloseConnectionpk() {
					global $mysqlipk;
					$mysqlipk->close();
					
			}

?>

<?php 

searchdbConnectpk();
//echo $get_popu_keyword;
//SELECT id FROM `KXT209_Keyword` where keyword='Computer Science'

/*
if(isset($get_popu_keyword))
{
$querry_get_id="SELECT id FROM `KXT209_Keyword` where keyword='$get_popu_keyword'";


//echo $querry_get_id;

$result_get_id = $mysqlipk->query($querry_get_id);
$arr_get_kwid=$result_get_id->fetch_array(MYSQLI_ASSOC);


//print_r($arr_get_kwid);


$get_kwid=$arr_get_kwid[id];


//echo $get_kwid;


$querrypk="select element_id,count from KXT209_Popularity where type='Keyword' and  element_id=(SELECT id FROM `KXT209_Keyword` where keyword='$get_popu_keyword')";

//echo $querrypk;

$resultpk = $mysqlipk->query($querrypk);
$arrpk = $resultpk->fetch_array(MYSQLI_ASSOC);

//print_r($arrpk);
if(!$arrpk[element_id])
{
	$querry_insert="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`) VALUES ('Keyword',$get_kwid,1,'$get_date')";
	
	//echo $querry_insert;
	//echo "<br>";
	$result_inert=$mysqlipk->query($querry_insert);
	
	
	}
	
	else
	{
		
		
		$i= $arrpk[count]+1;
		//UPDATE `KXT209_Popularity` SET `Count`=[value-4],`LUpdated_time`='$get_date'
		//echo"UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date'";
		$queery_update="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' where Type='Keyword' and Element_id=$get_kwid";
		$result_update=$mysqlipk->query($queery_update);
			
		}
		
		
}*/
	
	$querry_get_pid="SELECT element_id FROM `KXT209_Popularity` where Type='Keyword' ORDER BY `KXT209_Popularity`.`Count`  DESC";
	$result_pid=$mysqlipk->query($querry_get_pid);
	
	$j=1;
	echo "<br>";
	while($arr_pid= $result_pid->fetch_array(MYSQLI_ASSOC)){
		
		
		$get_kid= $arr_pid[element_id];
		$querry_print_keyword="SELECT keyword FROM `KXT209_Keyword` where id=$get_kid";
		$result_print_kw=$mysqlipk->query($querry_print_keyword);
		
		$arr_print_kw= $result_print_kw->fetch_array(MYSQLI_ASSOC);
		
		$get_p_keyword= $arr_print_kw[keyword];
		
		if($j<7)
		{
			
		echo $j.". ";
		echo "<a href='";
		echo $rootPath;
		echo "search/index.php?get_index=Keyword&get_search_info=";
		echo urlencode($get_p_keyword);
		echo "+&search_submit=Search'";
		echo " >";
		
		echo "$get_p_keyword";
		
		echo "</a><br>";
		}
		$j++;
		
		
		
	}
	
	

?>

<?php
searchcloseConnectionpk();
?>