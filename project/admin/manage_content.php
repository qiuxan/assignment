<script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
 $(document).ready(function(){
			
			$("#fade_edit_btn").show();
			$('#edit_btn').hide()
		
			$("tr").click(function(){
				//alert("123");
							$(this).find("input[type='radio']").get(0).checked=true; 
							$("#fade_edit_btn").hide();
							$('#edit_btn').show()
						});
	 	
						$("#fade_edit_btn").click(function(){
							alert("Please choose a user from the list.");
										
									});
	
	$("tr").mouseover(function(){
    			//$(this).find("td").hide();
			//	$(this).find("td").css("bgcolor","#c2cbff");
			//alert(y);
			$(this).find("td").attr("bgcolor","#d8dcff");
  				});


 		$("tr").mouseout(function(){
	    		//$(this).find("td").hide();
				$(this).find("td").attr("bgcolor","#eeeeff");

 	 	});
	
	});
	
	
	function myFunction()
	{
	var x=$("input[name='get_userid']:checked").attr('value');
	//alert(x);
	var y="Are you sure you want to Update the user level of user ID: "+x+" ?";
	//var r=confirm("Are you sure you want to Update the user level of user ID: from 'My Library'");
	var r=confirm(y);
	if (r==true)
	  {

	  return true;
	  }
	else
	  {

	return false;
	   

	  }
	
	}
	
</script>
<h2>Admin Page</h2>


<b style="color:#78a040;">Book Management</b>

<?php
//reference for function charlimit: http://codepad.org/OetkaMh6
	function charlimit($string, $limit) {
		
		$overflow = (strlen($string) > $limit ? true : false);
		
		return substr($string, 0, $limit) . ($overflow === true ? "..." : '');
	}


function mylbdbConnect() {
					global $mysqlimylb;
					$mysqlimylb = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
	function mylbcloseConnection() {
					global $mysqlimylb;
					$mysqlimylb->close();
			}
			
			
		
			
?>


<?php
	
	$_SESSION['addinfo']=0;
	
	if ($_SESSION['bookpage']!=$_GET['page'])
	{$_SESSION['access']=1;}
	
	if($_SESSION['userpage']!=$_GET['page_user'])
		{$_SESSION['access']=1;}
		
	if($_SESSION['update_uid']!=$_GET['get_userid'])
	{$_SESSION['access']=1; }
	
	if($_SESSION['back']!=$_GET['back'])
	{$_SESSION['access']=1; 
		
		}	
		
 	$_SESSION['bookpage']=$_GET['page'];
 	$_SESSION['userpage']=$_GET['page_user'];
	$_SESSION['update_uid']=$_GET['get_userid'];
	$_SESSION['back']=$_GET['back'];

//	print_r($_GET);

//	$_SESSION['access']=1;

	if($_SESSION['ul']==1&&$_SESSION['access']==1){
		
	
			//print_r($_POST);

			$get_user_id=$_SESSION['id'];
			$get_per_page=5;
			
			mylbdbConnect();
			
			/*

			if(isset($_POST['delete_book_id']))
			{
				$get_delbook_id=$_POST['delete_book_id'];
				global $mysqlimylb;
				//echo $get_delbook_id;
				//echo $get_user_id;
				//DELETE FROM `KXT209_User_Library` WHERE 1
				$query="DELETE FROM `KXT209_User_Library` WHERE UserID=".$get_user_id." and BookID=".$get_delbook_id."";
				//echo $query;
				$result = $mysqlimylb->query($query);
				}*/

			//SELECT Count(`UserID`) FROM `KXT209_User_Library` where `UserID`=25


			global $mysqlimylb;
		//	$query="SELECT Count(`UserID`) FROM `KXT209_User_Library` where `UserID`=".$get_user_id."";
			$query="SELECT Count(`ID`) FROM `KXT209_Books`";
			
		//	echo $query;

			$resultpage = $mysqlimylb->query($query);
			$arrpage = $resultpage->fetch_array(MYSQLI_ASSOC);
			//print_r($arrpage);
			
			$pages= ceil($arrpage["Count(`ID`)"] / $get_per_page);
			//echo $pages;
			$page=(isset($_GET['page'])) ? (int)$_GET['page']:1;
			//echo $page;
			//echo "hahahaahaha";

			$start=($page-1) * $get_per_page;
			//echo $page;

			
			
			
			
			
			
			
			
			
			
			
			


			//LIMIT".$start.",".$get_per_page."



			$query="SELECT id FROM `KXT209_Books` LIMIT ".$start.",".$get_per_page."";
			//SELECT bookid FROM `KXT209_User_Library` where `UserID`=25 LIMIT 0,2
		//SELECT id FROM `KXT209_Books`	
			//$query=" SELECT bookid FROM `KXT209_User_Library` where `UserID`=".$get_user_id." LIMIT ".$start.",".$get_per_page."";
			
		//	echo $query;
			/*
			for($i;$i<=$pages;$i++)
			{
				echo "<a href='?page=".$i." '>".$i."</a> ";
				}
			*/
			$result = $mysqlimylb->query($query);
			
			
			$get_per_page_user=4;

			global $mysqlimylb;
			$query="SELECT Count(`id`) FROM `KXT209_Users` ";
			//echo $query;
			$resultpage2 = $mysqlimylb->query($query);
			$arrpage2 = $resultpage2->fetch_array(MYSQLI_ASSOC);
			//print_r($arrpage);

			$pages2= ceil($arrpage2["Count(`id`)"] / $get_per_page_user);

			$page2=(isset($_GET['page_user'])) ? (int)$_GET['page_user']:1;

			$start2=($page2-1) * $get_per_page_user;





			echo "<table width='880' id='tab_num'>";
			echo "<tr bgcolor='#c2cbff'>";
			echo "<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>Published_Date</th><th>Keyword</th><th>Subject</th><th>URL</th>";
			echo "</tr>";







			echo"<form action='addbook.php' method='post'>";//I used 'get' at first,coz I want users to be able to see which booke they deleted. Howerver,I feel it is not save to allow users to manipulate database via URL 

			while($arr2 = $result->fetch_array(MYSQLI_ASSOC))
			{




				//print_r($arr2);
				$get_book_id=$arr2[id];
				global $mysqlimylb;
				$query="SELECT * FROM `KXT209_Books` where id=".$get_book_id."";
				//echo $query;
				$result2 = $mysqlimylb->query($query);
				$arr2 = $result2->fetch_array(MYSQLI_ASSOC);
				//print_r($arr2);
				$get_url=$arr2['URL'];
				$get_title=$arr2['Title'];
				$get_pd=$arr2['Published_date'];
				$get_pubid=$arr2['Pub_id'];
				$query="select * from KXT209_Author where id in (SELECT author_id FROM `KXT209_Books_author` where book_id=".$get_book_id.")";
				//echo $query;
				$result2 = $mysqlimylb->query($query);

				$query="SELECT * FROM `KXT209_Publisher` where id=".$get_pubid."";
				//echo $query;
				$result3 = $mysqlimylb->query($query);
				$arr3 = $result3->fetch_array(MYSQLI_ASSOC);
				//print_r($arr3);
				$get_pub=$arr3['Name'];


				$query="select * from KXT209_Keyword where id in (SELECT keyword_id FROM `KXT209_Books_keyword` where book_id=".$get_book_id.")";
				//echo $query;
				$result3 = $mysqlimylb->query($query);
				//$arr3 = $result3->fetch_array(MYSQLI_ASSOC);
				$query="Select * from KXT209_Subject where id in (SELECT subject_id FROM `KXT209_Books_subject` where book_id=".$get_book_id.")";
				//echo $query;
				$result4 = $mysqlimylb->query($query);

				/*echo "<a name='book_title' href='";
				echo $rootPath;							
				echo"books/index.php?get_book_title=";
				echo $arr3[title];
				echo "&search_submit=Search'>";												
				echo $arr3[title];
				echo "</a>";*/


				//echo $get_url;
				//echo"<tr>";
				
		
				
				echo"<tr bgcolor='#eeeeff'>";
			//echo "<td><input type='radio' name='delete_book_id' value='".$get_book_id."'></td>";
			echo "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$get_book_id."</td>";
			echo "<td>";
			
			echo "<a name='book_title' href='";
			echo $rootPath;							
			echo"books/index.php?get_book_title=";
			echo $get_title;
			echo "&search_submit=Search'>";	
			//$get_title=wordlimit($get_title,5);
			$get_title=charlimit($get_title,30);											
			echo $get_title;
			echo "</a>";
			
			
			echo "</td>";
			echo "<td>";
			$name_list='';
			/*
			while($arr2 = $result2->fetch_array(MYSQLI_ASSOC))
			{
				//print_r($arr2);
				echo $arr2['FName']." ";
				echo $arr2['MName']." ";
				echo $arr2['LName'].", ";
				
				
				}*/
			//	$i=0;
			while($arr2 = $result2->fetch_array(MYSQLI_ASSOC))
			{
				//print_r($arr2);
				
			/*	if($i==0){
					
					$name_list=$name_list.$arr2['FName']." ".$arr2['MName']." ".$arr2['LName']." ";
					
					}
				else
				*/
				$name_list=$name_list.", ".$arr2['FName']." ".$arr2['MName']." ".$arr2['LName'];
				
				//if($i!=0)
				//{
					//echo "haha";
				//	$name_list=$name_list.",";
					//}
					
				
				//$i++;
				
				//echo $arr2['FName']." ";
				//echo $arr2['MName']." ";
				//echo $arr2['LName'].", ";
				
				
			}
			$name_list=charlimit($name_list,30);
			//$name_list= substr("$name_list"); 
			
			echo  substr($name_list, 1);
			
			//echo $name_list;
			$get_pub=charlimit($get_pub,30);
			echo "</td>";
			echo "<td>".$get_pub."</td>";
			echo "<td>".$get_pd."</td>";
			echo "<td>";
			$kwlist='';
			while ($arr3 = $result3->fetch_array(MYSQLI_ASSOC))
			{
				$kwlist=$kwlist.", ".$arr3['Keyword'];
				
				//print_r($arr3);
				//echo $arr3['Keyword'];
				}
				$kwlist=charlimit($kwlist,30);
				echo substr($kwlist, 1);
				//echo $kwlist;
			echo "</td>";
			
			echo "<td>";
			
			$sbjlist='';
			while ($arr4 = $result4->fetch_array(MYSQLI_ASSOC))
			{
				//print_r($arr3);
				//echo $arr4['Subject'];
				$sbjlist=$sbjlist.", ".$arr4['Subject'];
				}
				
			$sbjlist=charlimit($sbjlist,30);
			echo substr($sbjlist, 1);
			//echo $sbjlist;
			echo "</td>";
			echo "<td><a href='".$get_url."'>Link</a></td>";
			
			echo"</tr>";
			}
			
			echo "</table>";
	
	
	
	
	
	
			if($result->num_rows>0)
			{
			//echo "<table width='880' bordercolor='#eeeeff'><tr  bgcolor='#eeeeff'><td>";
			echo "<table width='880'  bgcolor='#eeeeff' ><tr><td>";
			
//Pagination is based on :http://www.youtube.com/watch?v=wd4fE5fk-fk
		 	$pguser=$_GET['page_user'];
		
		//	echo $page;
		//	echo $page2;
		//	echo "hahahaahaha";
		
			for($i;$i<=$pages;$i++)
			{
				echo "<a href='?page=".$i."&page_user=".$page2."'>".$i."</a> ";
				}

				echo "</td><td align='right'>";
			echo "<input type='hidden' value=1 name='addinfo'>";
			echo "<span>Click to add a book<input type='submit' value='Add' id='btn_add' class='ajax'></span></td></tr>";
			//echo "<tr  bgcolor='#eeeeff' align='right'><td colspan=9><span>Click to delete the book<input type='button' value='Delete' id='btn_delete' onclick='myFunction()'></span></td></tr>";
			echo "</table>";
		}

			echo "</form>";

				if($result->num_rows==0)//go back and check this line afterfinishing!!!!!!!!!!!!!!!!!!!
					{

					echo "<table width='880'><tr bgcolor='#eeeeff'><td colspan=8><span style='color:red;'>  &nbsp;Thsere is no item available</span></td></tr>";
					echo "<tr  bgcolor='#eeeeff' align='right'><td colspan=8><span style='color:red;'><form action='".$rootPath."/index.php'><input type='submit' value='Go back to Home page'></form></span></td></tr></table>";
					}	
			//echo $_SESSION['ul'];


//USER MANAGEMENT START!!!








/*


	$get_per_page_user=4;
	
	global $mysqlimylb;
	$query="SELECT Count(`id`) FROM `KXT209_Users` ";
	//echo $query;
	$resultpage2 = $mysqlimylb->query($query);
	$arrpage2 = $resultpage2->fetch_array(MYSQLI_ASSOC);
	//print_r($arrpage);
	
	$pages2= ceil($arrpage2["Count(`id`)"] / $get_per_page_user);

	$page2=(isset($_GET['page_user'])) ? (int)$_GET['page_user']:1;

	$start2=($page2-1) * $get_per_page_user;
*/
	
	
	//echo $page_bm=$_GET['page'];






echo '<br><b style="color:#78a040;">Book Management</b><br>';

//print_r($_GET);
if (isset($_GET['get_userid']))
{
	 $update_uid=$_GET['get_userid'];
	 $upate_ulevel=$_GET[$update_uid];
	
}


 $query="UPDATE `KXT209_Users` SET `Ulevel`=".$upate_ulevel." WHERE ID=".$update_uid."";

$result = $mysqlimylb->query($query);



echo "<table width='880' id='user_manage'>";
echo "<tr bgcolor='#c2cbff'>";

echo "<th></th><th>ID</th><th>User_Name</th><th>Name</th><th>Birth_Date</th><th>Email</th><th>Affiliation</th><th>Level</th>";
echo "</tr>";





$query="SELECT * FROM `KXT209_Users` LIMIT ".$start2.",".$get_per_page_user."";

$result = $mysqlimylb->query($query);
echo "<form action='' type='post' onsubmit='return myFunction()'>";

while($arr = $result->fetch_array(MYSQLI_ASSOC))
{	
	echo "<tr bgcolor='#eeeeff'  align='middle'>";
	echo "<td><input type='radio' name='get_userid' value='".$arr['ID']."'></td>";
	echo "<td>".$arr['ID']."</td>";
	echo "<td>".$arr['Username']."</td>";
	echo "<td>";
	echo $arr['FName'];
	if($arr['MName']!=='')
	{
		echo " ".$arr['MName'];
	}
	echo " ".$arr['LName'];
	echo "</td>";
	echo "<td>".$arr['Birthdate']."</td>";
	echo "<td>".$arr['Email']."</td>";
	echo "<td>".$arr['Affli']."</td>";
	echo "<td><select name='".$arr['ID']."'>";
	echo "<option name='get_modified_ulevel' value=2 ";
	if($arr[Ulevel]==2)
	echo "selected";
	echo ">General</option>";
	echo "<option name='get_modified_ulevel' value=1 ";
	if($arr[Ulevel]==1)
	echo "selected";
	echo ">Admin</option>";
	echo "</select></td>";
	echo "</tr>";
	
	
//	print_r($arr);
	
}
echo "</table>";
echo "<table width='880'  bgcolor='#eeeeff' ><tr><td>";
for($i=1;$i<=$pages2;$i++)
{
	echo "<a href='?page_user=".$i."&page=".$page."'>".$i."</a> ";
	}//move down afterfinishing!!!
echo "</td>";	
echo "<td align='right'>";
echo "Click to edit the user ";

echo "<input type='button' value='Edit' id='fade_edit_btn'>";
echo "<input type='submit' value='Edit' id='edit_btn'>";
echo "</td><tr></table>";

echo"</form>";



$_SESSION['access']=0;



			mylbcloseConnection();
			}
		
		
		
		
	else{
		
		//echo $_SESSION['ul'];
		
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		//echo "<p style='color:red;'>You do not have access to this page.</p>";
		//echo "<a href=".$rootPath."index.php>Go back home page</a>";
		
		}
	
	
?>