
<?php 

	//function
	
	
	function searchdbConnect() {
					global $mysqli3;
					$mysqli3 = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}



	function searchcloseConnection() {
					global $mysqli3;
					$mysqli3->close();
					
					
			}
			

		

?>



<?php
		
		
		
		
		if(isset($_GET['search_submit']))
		{
		$get_index=$_GET['get_index'];
		$get_search=$_GET['get_search_info'];
	
		}
		
		$get_book_id_arr= array() ;
		$get_book_title_arr= array() ;
		$i=0;
		
		searchdbConnect();
		
		
		
			
			

?>

<h2>Search Result</h2>

<?php 
$keywordarr=array();
$subjectarr=array();

if($get_index=='Title')
{
echo '<h3>';echo $get_index; echo'::'; echo $get_search; echo ' </h3>';

if($get_search!=''&&$get_search!=' ')
{
	global $mysqli3;
		//print_r($_GET);
		
		$titlearr=explode(" ",$get_search);
		//print_r($titlearr);
		
		$print_count=array();
		foreach ($titlearr as $value)
		{
			if($value=='')
			//break;
			continue;	
				
		  //echo "Value: " . $value . "<br />";
		$query="SELECT * FROM `KXT209_Books` where `Title` like '%".$value."%'";
		$result = $mysqli3->query($query);
		while($arr3 = $result->fetch_array(MYSQLI_ASSOC)){
			//print_r($arr3);
			//echo $arr3['ID'];
			$bookid=$arr3['ID'];
			if(!isset($print_count[$bookid]))
			{
			//	echo $bookid;
				
				//print_r($arr3);
				
					$get_title=$arr3[Title];
					echo"<br><br>Title: ";
					
					
					echo "<a name='book_title' href='";
					echo $rootPath;							
					echo"books/index.php?get_book_title=";
					echo $arr3[Title];
					echo "&search_submit=Search'>";												
					echo $arr3[Title];
					echo "</a>";
					echo '<br>';
					
					
					$query="SELECT * FROM `KXT209_Author` where `ID` in (SELECT `Author_id` FROM `KXT209_Books_author` where `Book_id`=".$bookid.")";
					$result2= $mysqli3->query($query);
					$printkey=true;
				while(	$arrauthor = $result2->fetch_array(MYSQLI_ASSOC))
				{
				//	print_r($arrauthor);
					if($printkey)
					echo"Author: ";
					
					
					$printkey=false;
					echo"<a name='author_name'";
					
					
					echo "href='";
					echo $rootPath;
					echo "/search/index.php?get_index=Author&get_search_info=";
					
					echo $arrauthor[FName].'+';
					echo $arrauthor[MName].'+';
					echo $arrauthor[LName];
														
					echo "&search_submit=Search'";
					
					echo ">";
					
					
					echo $arrauthor[FName].' ';
					echo $arrauthor[MName].' ';
					echo $arrauthor[LName].' ';
					echo "</a>";
					echo " &nbsp;";
					
					
					
				}
				
				
				
				$print_count[$bookid]=0;
				
			}
			
		}
		
		
		}
		
	}

}




?>
<?php
 if($get_index=='Author'){
		//print_r($_GET);
		global $mysqli3;
	echo '<h3>';echo $get_index; echo'::'; echo $get_search; echo ' </h3>';	
	$authorarr=explode(" ",$get_search);
	$countauthor=array();
	$countbookid=array();
	foreach($authorarr as $value)
	{
		if($value=='')
		continue;
		
		$query ="SELECT * FROM `KXT209_Author` where`FName` like '%".$value."%' or`MName` like '%".$value."%' or`LName` like '%".$value."%'";
	//	echo  $query;
		$result = $mysqli3->query($query);
		while( $arr3 = $result->fetch_array(MYSQLI_ASSOC)) {
			
		
		$getauthorid= $arr3['ID'];
		if(!isset($countauthor[$getauthorid]))
		{
			
			//echo $getauthorid;
				$query2="SELECT * FROM `KXT209_Books_author` where`Author_id`=".$getauthorid;
				$result2 = $mysqli3->query($query2);
			//	$countbookid=array();
				while( $arrbookid= $result2->fetch_array(MYSQLI_ASSOC)) {
						$getbookid=$arrbookid['Book_id'];
					if(!isset($countbookid[$getbookid]))
					{
						
					//echo "bookid:".$getbookid."<br>";
					
					$querybook="SELECT * FROM `KXT209_Books` where id=".$getbookid;
					//echo $querybook;
					$resultbook = $mysqli3->query($querybook);
					$arrbook= $resultbook->fetch_array(MYSQLI_ASSOC);
					//print_r($arrbook);

						echo"<br><br>Title: ";

						echo "<a name='book_title' href='";
						echo $rootPath;							
						echo"books/index.php?get_book_title=";
						echo $arrbook[Title];
						echo "&search_submit=Search'>";												
						echo $arrbook[Title];
						echo "</a><br>";
					
					
					
						$query="SELECT * FROM `KXT209_Author` where `ID` in (SELECT `Author_id` FROM `KXT209_Books_author` where `Book_id`=".$getbookid.")";
						//echo $query;
						$result2= $mysqli3->query($query);
						$printkey=true;



							while(	$arrauthor = $result2->fetch_array(MYSQLI_ASSOC))
							{
							//	print_r($arrauthor);
								if($printkey)
								echo"Author: ";


								$printkey=false;
								echo"<a name='author_name'";


								echo "href='";
								echo $rootPath;
								echo "/search/index.php?get_index=Author&get_search_info=";

								echo $arrauthor[FName].'+';
								echo $arrauthor[MName].'+';
								echo $arrauthor[LName];

								echo "&search_submit=Search'";

								echo ">";


								echo $arrauthor[FName].' ';
								echo $arrauthor[MName].' ';
								echo $arrauthor[LName].' ';
								echo "</a>";
								echo " &nbsp;";


							}
						
					
					
					
					
					
					
					
					
					$countbookid[$getbookid]=0;
					}
					
					}
		
			
			$countauthor[$getauthorid]=0;
			
		}
		
		//print_r($arr3);
			
		}
		//echo $value;
		
	}
	
	
	echo'<br><br>';
	
	
	}




?> 

<?php
if($get_index=='Keyword')
{
	
	//print_r($_GET);

	
	echo '<h3>';echo $get_index; echo'::'; echo $get_search; echo ' </h3>';

	global $mysqli3;


	$kwarr=explode(" ",$get_search);
	//print_r($kwarr);
	$count_kw=array();
	foreach ($kwarr as $value)
	{
		if($value=='')
		break;
	//	echo $value;
		$query="SELECT * FROM `KXT209_Keyword` where`Keyword` like '%".$value."%'";
	//	echo $query;
		$result = $mysqli3->query($query);

		while($arr = $result->fetch_array(MYSQLI_ASSOC) )
		{
		//	print_r($arr);

	$get_kwid= $arr['ID'];
		if(!isset($count_kw[$get_kwid]))
		{
			//print_r($count_kw);
		//	echo 'kwid='.$get_kwid;
			echo "<br>";
			$query2="SELECT `Book_id` FROM `KXT209_Books_keyword` where `Keyword_id`=".$get_kwid; //changer the variable to $get_kwid
			$resultbookid = $mysqli3->query($query2);
			while($arrbookid = $resultbookid->fetch_array(MYSQLI_ASSOC))
			{
				//print_r($arrbookid);

			//	$keywordarr=array();
				
				if (!isset($keywordarr[$arrbookid['Book_id']]))
				
			{	
				
				
				$keywordarr[$arrbookid['Book_id']]=0;
				
				$bookid=$arrbookid['Book_id'];
				$querybook="SELECT * FROM `KXT209_Books` where id=".$bookid;
				$resultbook = $mysqli3->query($querybook);
				$arrbook= $resultbook->fetch_array(MYSQLI_ASSOC);
				//print_r($arrbook);
					//$keywordarr=array();
					//if(!isset($keywordarr[$arrbook[Title]]))
				
					echo"<br><br>Title: ";

					echo "<a name='book_title' href='";
					echo $rootPath;							
					echo"books/index.php?get_book_title=";
					echo $arrbook[Title];
					echo "&search_submit=Search'>";												
					echo $arrbook[Title];
					echo "</a><br>";
				
					$query="SELECT * FROM `KXT209_Author` where `ID` in (SELECT `Author_id` FROM `KXT209_Books_author` where `Book_id`=".$bookid.")";
					//echo $query;
					$result2= $mysqli3->query($query);
					$printkey=true;
					

				
						while(	$arrauthor = $result2->fetch_array(MYSQLI_ASSOC))
						{
						//	print_r($arrauthor);
							if($printkey)
							echo"Author: ";


							$printkey=false;
							echo"<a name='author_name'";


							echo "href='";
							echo $rootPath;
							echo "/search/index.php?get_index=Author&get_search_info=";

							echo $arrauthor[FName].'+';
							echo $arrauthor[MName].'+';
							echo $arrauthor[LName];

							echo "&search_submit=Search'";

							echo ">";


							echo $arrauthor[FName].' ';
							echo $arrauthor[MName].' ';
							echo $arrauthor[LName].' ';
							echo "</a>";
							echo " &nbsp;";


						}


					}

			}


			$count_kw[$get_kwid]=0;






		}	

		}

	}
	
	
	
	
		
		



}


//select title from KXT209_Books where id in (select book_id from KXT209_Books_subject where subject_id =(SELECT id FROM `KXT209_Subject` where Subject='Computer Science'))
//select Fname,Mname,Lname from KXT209_Author where id in (select author_id from  KXT209_Books_author where book_id=(select id from KXT209_Books where id in (select book_id from KXT209_Books_subject where subject_id =(SELECT id FROM `KXT209_Subject` where Subject='Computer Science'))))


?>

<?php
if($get_index=='Subject')
{
	
	
	echo '<h3>';echo $get_index; echo'::'; echo $get_search; echo ' </h3>';
	
	global $mysqli3;
	$countsbj2=array();
	$countbook=array();
	
	//print_r($_GET);
	$sbjarr=explode(" ",$get_search);
	//print_r($sbjarr);
	foreach($sbjarr as $value){
		if($value=='')
		continue;
		$query="SELECT * FROM `KXT209_Subject` where `Subject` like '%".$value."%'";
		$result3 = $mysqli3->query($query);
			while($arr3_subj = $result3->fetch_array(MYSQLI_ASSOC)){
				
				//print_r($arr3_subj);
				 $sbjid= $arr3_subj['ID'];
					if(!isset($countsbj2[$sbjid])){
					//	echo $sbjid;
						$query2="SELECT * FROM `KXT209_Books_subject` where`Subject_id`=".$sbjid;//change sbjid!
						$resultbook = $mysqli3->query($query2);
						while($arrbook = $resultbook->fetch_array(MYSQLI_ASSOC)){
							
							$bookid=$arrbook['Book_id'];
							
							
							if(!isset($subjectarr[$bookid]))
							
						{	$subjectarr[$bookid]=0;
							//echo '<br>book ID:'.$bookid;
						//	echo "<br>";
							
							$querybook="SELECT * FROM `KXT209_Books` where id=".$bookid;
						//	echo $querybook;
							$result_get_title= $mysqli3->query($querybook);
							$arr_get_title= $result_get_title->fetch_array(MYSQLI_ASSOC);
							//print_r($arr_get_title);
							
							
							
							
							echo"<br><br>Title: ";

							echo "<a name='book_title' href='";
							echo $rootPath;							
							echo"books/index.php?get_book_title=";
							echo $arr_get_title[Title];
							echo "&search_submit=Search'>";												
							echo $arr_get_title[Title];
							echo "</a><br>";
						
							
							
							$query="SELECT * FROM `KXT209_Author` where `ID` in (SELECT `Author_id` FROM `KXT209_Books_author` where `Book_id`=".$bookid.")";
							//echo $query;
							$result2= $mysqli3->query($query);
							$printkey=true;



								while(	$arrauthor = $result2->fetch_array(MYSQLI_ASSOC))
								{
								//	print_r($arrauthor);
									if($printkey)
									echo"Author: ";


									$printkey=false;
									echo"<a name='author_name'";


									echo "href='";
									echo $rootPath;
									echo "/search/index.php?get_index=Author&get_search_info=";

									echo $arrauthor[FName].'+';
									echo $arrauthor[MName].'+';
									echo $arrauthor[LName];

									echo "&search_submit=Search'";

									echo ">";


									echo $arrauthor[FName].' ';
									echo $arrauthor[MName].' ';
									echo $arrauthor[LName].' ';
									echo "</a>";
									echo " &nbsp;";


								}
								}
							
							
						}
						
						$countsbj2[$sbjid]=0;
						
						
					}
				
			}
	}
	
	

	
	

	
	
	
	
	echo'<br><br>';
	
	
	
}



?>


<?php

searchcloseConnection()

?>


