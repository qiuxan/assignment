<?php
session_start();

if(!isset($_SESSION['title']))
  $_SESSION['title']='';
  
  		if(!isset($_SESSION["book"]))
		
		{
			$_SESSION["book"] = array(
						    			
				);//this arry here is to make sure the popularity dada only update once when visiting the book site
		}

?>

<?php 
//print_r($_SESSION["book"]);

?>
<style>

A.read:link{text-decoration:none}
A.read:visited{text-decoration:none}
A.read:hover {text-decoration:underline}
	

</style>

<h2>Book Details</h2>
<br>
<b>
<?php

function bookinfodbConnect() {
					global $mysqlibifo;
					$mysqlibifo = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}



	function bookinfocloseConnection() {
					global $mysqlibifo;
					$mysqlibifo->close();
					
					
			}
			
			
$get_date=date("Y-m-d h:i:s");



?>

<?php

 echo "Title: ";
 echo $_GET['get_book_title']."<br>";
 
 $sestitle=$_GET['get_book_title'];
 
 

 



if(isset($_GET['get_book_title']))
{
	
	bookinfodbConnect() ;
	
	$get_book_title_info=$_GET['get_book_title'];
	
	$querybinfo ="SELECT * FROM `KXT209_Books` where title='$get_book_title_info'";
	$resultbinfo = $mysqlibifo->query($querybinfo);
	$arrbinfo = $resultbinfo->fetch_array(MYSQLI_ASSOC);
	$get_url=$arrbinfo [URL] ;//NEED TO BE USED AFTER 1
	$get_pubilc_date=$arrbinfo [Published_date];//NEED TO BE USED AFTER 2
	$get_book_id=$arrbinfo [ID];//NEED TO BE USED FOR LATER DATABASE LINK TABLE KTBK& TABLE KTBA
	$get_pub_id=$arrbinfo [Pub_id];//NEED TO BE USED FOR LATER DATABASE LINK TABLE KP .............100%..........used!
	
	
	//SELECT * FROM `KXT209_Publisher` where ID=5
	
	$querygetpn ="SELECT * FROM `KXT209_Publisher` where ID=$get_pub_id";
	$resultgetpn = $mysqlibifo->query($querygetpn);
	$arrpubinfo = $resultgetpn->fetch_array(MYSQLI_ASSOC);
	$get_pub_name=$arrpubinfo[Name];//NEED TO BE USED AFTER 3
	
	
	$querygetau ="Select* from  KXT209_Author where id in(SELECT author_id FROM `KXT209_Books_author` where Book_id=$get_book_id)";
	$resultgetau = $mysqlibifo->query($querygetau);
	echo"Author: ";
	while($arrauthorinfo = $resultgetau->fetch_array(MYSQLI_ASSOC))
		{
			
			
						echo"<a name='author_name'";
						echo "href='";
						echo $rootPath;
						echo "/search/index.php?get_index=Author&get_search_info=";
						echo $arrauthorinfo[FName].'+';
						echo $arrauthorinfo[MName].'+';
						echo $arrauthorinfo[LName];
						echo "&search_submit=Search'";
						echo ">";
						
						
						echo $arrauthorinfo[FName].' ';
						echo $arrauthorinfo[MName].' ';
						echo $arrauthorinfo[LName].' ';
						echo "</a>";
						echo " &nbsp;";
						
						$get_fn_popu=$arrauthorinfo[FName];
						$get_mn_popu=$arrauthorinfo[MName];
						$get_ln_popu=$arrauthorinfo[LName];
			
			
			if(!$_SESSION['login_inf']){
				
				if(!isset($_SESSION['book'][$sestitle]))//only allow to update once, the same code below for the same reason
				
				{
				
				$querry_popu_autherid="SELECT id FROM `KXT209_Author` Where Fname='$get_fn_popu' and Mname='$get_mn_popu' and Lname='$get_ln_popu'";
					$resultaid = $mysqlibifo->query($querry_popu_autherid);
	 			$arrpaid = $resultaid->fetch_array(MYSQLI_ASSOC);
	 			$get_aid=$arrpaid[id] ;
				
				$queryp="SELECT *  FROM `KXT209_Popularity` Where Element_id =$get_aid and Type='Author'";
	
				$result = $mysqlibifo->query($queryp);
					$arrpau = $result->fetch_array(MYSQLI_ASSOC);
				
				if(!isset($arrpau[Element_id]))
			{
				$queryinsert="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`,`Created_time`,`LUpdated_time`) VALUES ('Author',$get_aid,1,'$get_date','$get_date')";
				$result = $mysqlibifo->query($queryinsert);
	
					}
				else{
					
					
					$i=$arrpau[Count]+1;
					$querry_ud_popsbj="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' WHERE Element_id=$get_aid and Type='Author'";
					$result_ud_popsbj = $mysqlibifo->query($querry_ud_popsbj);
		
					
					}	
				}
			
			
				
					
			}//  "}" for "if(!$_SESSION['login_inf'])" add else next mean user not login
		else{
				
					
					if(!isset($_SESSION['book'][$sestitle])){
					
						$querry_popu_autherid="SELECT id FROM `KXT209_Author` Where Fname='$get_fn_popu' and Mname='$get_mn_popu' and Lname='$get_ln_popu'";
					$resultaid = $mysqlibifo->query($querry_popu_autherid);
	 			$arrpaid = $resultaid->fetch_array(MYSQLI_ASSOC);
	 			$get_aid=$arrpaid[id] ;
				
				$queryp="SELECT *  FROM `KXT209_Popularity` Where Element_id =$get_aid and Type='Author'";
	
				$result = $mysqlibifo->query($queryp);
					$arrpau = $result->fetch_array(MYSQLI_ASSOC);
				
				if(!isset($arrpau[Element_id]))
			{
				$queryinsert="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`,`Created_time`,`LUpdated_time`) VALUES ('Author',$get_aid,1,'$get_date','$get_date')";
				$result = $mysqlibifo->query($queryinsert);
				
	
					}
				else{
					
					
					$i=$arrpau[Count]+1;
					$querry_ud_popsbj="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' WHERE Element_id=$get_aid and Type='Author'";
					
					$result_ud_popsbj = $mysqlibifo->query($querry_ud_popsbj);
		
					
					}	
			
				}
			
			
			}
			
	}
			echo '<br>';
			echo 'Publisher: ';
			echo $get_pub_name. '<br>';
			echo "Published date: ";
			echo $get_pubilc_date.'<br>';
			
	
	
	$querygetkw ="select * from KXT209_Keyword where id in  (SELECT keyword_id FROM `KXT209_Books_keyword` where book_id=$get_book_id)";
	$resultgetkw = $mysqlibifo->query($querygetkw);
	echo "Keyword: ";
	while($arrkw = $resultgetkw->fetch_array(MYSQLI_ASSOC))
		{
			
			 $get_print_kw=$arrkw[Keyword];
			
			echo "<a href='";
			echo $rootPath;
			echo "search/index.php?get_index=Keyword&get_search_info=";
			echo urlencode($get_print_kw);
			echo "&search_submit=Search";
			echo "'>";
			echo "$get_print_kw";
			echo "</a>";
			echo " &nbsp;";
			
			if(!$_SESSION['login_inf']){
			
				
			if(!isset($_SESSION['book'][$sestitle])){	
			
			$querry_get_id="SELECT id FROM `KXT209_Keyword` where keyword='$get_print_kw'";
			$result_get_id = $mysqlibifo->query($querry_get_id);
			$arr_get_kwid=$result_get_id->fetch_array(MYSQLI_ASSOC);
			$get_kwid=$arr_get_kwid[id];
			
			
			$querrypk="select element_id,count from KXT209_Popularity where type='Keyword' and  element_id=(SELECT id FROM `KXT209_Keyword` where keyword='$get_print_kw')";

			global $mysqlibifo;
							
			$resultpk = $mysqlibifo->query($querrypk);
			$arrpk = $resultpk->fetch_array(MYSQLI_ASSOC);
			
			
			if(!$arrpk[element_id])
			{
				
					$querry_insert="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`) VALUES ('Keyword',$get_kwid,1,'$get_date')";
					$result_inert=$mysqlibifo->query($querry_insert);
	
	
					}
			
			else
		{
		
		
		$i= $arrpk[count]+1;
		$queery_update="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' where Type='Keyword' and Element_id=$get_kwid";
		$result_update=$mysqlibifo->query($queery_update);
			
		}
			
	}
			
			
				}//  "}" for "if(!$_SESSION['login_inf'])" add else next mean user not login
			
		else{
			
				if(!isset($_SESSION['book'][$sestitle])){
				
				$querry_get_id="SELECT id FROM `KXT209_Keyword` where keyword='$get_print_kw'";
			$result_get_id = $mysqlibifo->query($querry_get_id);
			$arr_get_kwid=$result_get_id->fetch_array(MYSQLI_ASSOC);
			$get_kwid=$arr_get_kwid[id];
			
			$querrypk="select element_id,count from KXT209_Popularity where type='Keyword' and  element_id=(SELECT id FROM `KXT209_Keyword` where keyword='$get_print_kw')";

			global $mysqlibifo;
			
							
			$resultpk = $mysqlibifo->query($querrypk);
			$arrpk = $resultpk->fetch_array(MYSQLI_ASSOC);
			
			
			if(!$arrpk[element_id])
			{
				
					$querry_insert="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`) VALUES ('Keyword',$get_kwid,1,'$get_date')";
	
					$result_inert=$mysqlibifo->query($querry_insert);
	
	
					}
			
			else{
		
		
				$i= $arrpk[count]+1;
				$queery_update="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' where Type='Keyword' and Element_id=$get_kwid";
				$result_update=$mysqlibifo->query($queery_update);
			
				}
				
			}
			
	}	
			
}
			
			echo"<br> Subject: ";
	
	$querygetsbj ="Select * from KXT209_Subject where id in (SELECT subject_id  FROM `KXT209_Books_subject` where book_id=$get_book_id)";
	$resultgetsbj = $mysqlibifo->query($querygetsbj);
	while($arrsbj = $resultgetsbj->fetch_array(MYSQLI_ASSOC))
		{
			$get_sbj=$arrsbj[Subject];
			echo "<a href='";
			echo $rootPath;
			echo "search/index.php?get_index=Subject&get_search_info=";
			echo $get_sbj;
			echo "&search_submit=Search";
			echo "'>";
			echo $get_sbj;
			echo"</a>";
			echo " &nbsp;";
	
			if(!$_SESSION['login_inf'])	{
				
					if(!isset($_SESSION['book'][$sestitle])){
				
				$querry_get_sbjid="SELECT id FROM `KXT209_Subject` where subject='$get_sbj'";
				$result_get_sujid = $mysqlibifo->query($querry_get_sbjid);
				$arr_get_sbid=$result_get_sujid->fetch_array(MYSQLI_ASSOC);
				$get_sbid=$arr_get_sbid['id'];
				
				$querry_pop_info="SELECT * FROM `KXT209_Popularity` where element_id=$get_sbid and type='Subject'";
				$result_pop_info = $mysqlibifo->query($querry_pop_info);
				$arr_pop_info=$result_pop_info->fetch_array(MYSQLI_ASSOC);
			
				if(!$arr_pop_info['Element_id'])
	 				{
	 
			 		$querry_inser_popsbj="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`, `LUpdated_time`) VALUES ('Subject',$get_sbid,1,'$get_date','$get_date')";
	 				$result_inser_popsbj = $mysqlibifo->query($querry_inser_popsbj);
	 
				 }
				 
				 	else{
		$i=$arr_pop_info[Count]+1;
		$querry_ud_popsbj="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' WHERE Element_id=$get_sbid and Type='Subject'";
		$result_ud_popsbj = $mysqlibifo->query($querry_ud_popsbj);
		
							}
				 
					}
								
				
				}	//  "}" for "if(!$_SESSION['login_inf'])" add else next mean user not login
				else{
					
						if(!isset($_SESSION['book'][$sestitle])){
						
						$querry_get_sbjid="SELECT id FROM `KXT209_Subject` where subject='$get_sbj'";
				$result_get_sujid = $mysqlibifo->query($querry_get_sbjid);
				$arr_get_sbid=$result_get_sujid->fetch_array(MYSQLI_ASSOC);
				$get_sbid=$arr_get_sbid['id'];
				
				$querry_pop_info="SELECT * FROM `KXT209_Popularity` where element_id=$get_sbid and type='Subject'";
				$result_pop_info = $mysqlibifo->query($querry_pop_info);
				$arr_pop_info=$result_pop_info->fetch_array(MYSQLI_ASSOC);
			
				if(!$arr_pop_info['Element_id'])
	 				{
	 
			 		$querry_inser_popsbj="INSERT INTO `KXT209_Popularity`( `Type`, `Element_id`, `Count`, `Created_time`, `LUpdated_time`) VALUES ('Subject',$get_sbid,1,'$get_date','$get_date')";
	 				$result_inser_popsbj = $mysqlibifo->query($querry_inser_popsbj);
	 
				 }
				 
				 	else
			{
		$i=$arr_pop_info[Count]+1;
		$querry_ud_popsbj="UPDATE `KXT209_Popularity` SET `Count`=$i,`LUpdated_time`='$get_date' WHERE Element_id=$get_sbid and Type='Subject'";
		$result_ud_popsbj = $mysqlibifo->query($querry_ud_popsbj);
		
							}
						
				}
					
					
		}
				
	
	}
	
		echo"<br><br>";
		echo "[ ";
		echo "<a class='read' href='";
		echo $get_url;
		echo "'>";
		echo "<b>";
		echo "READ THIS PAPER";
		echo "</b>";
		echo "</a>";
		echo " ]";
	
	
			if(!$_SESSION['login_inf']){//public users are not allow to read the book
				
				$get_userid=$_SESSION['id'];
				echo "[ ";
				echo "<a class='read' href='";
				
				echo "addbook.php?user_id=".$get_userid."&book_id=".$get_book_id."&book_title=".$sestitle."";
				
				echo "'>";
				echo "<b>";
				echo "ADD THIS PAPER to My Library";
				echo "</b>";
				echo "</a>";
				echo " ]";
				
		
						  }
	
	bookinfocloseConnection();
	
	}

 $_SESSION['title']=$_GET['get_book_title'];//used to control the different update popularity data action between public uers and registered users, but it is useless now  

 if(!isset($_SESSION['book'][$sestitle]))
 {
	 $_SESSION['book'][$sestitle]=1;
	 
	 }



?>
</b>
