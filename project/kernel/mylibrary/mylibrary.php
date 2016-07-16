 <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
 $(document).ready(function(){
	 $("#fade_btn").show();
		$('#btn_delete').hide();
		
		
		$("input[type='radio']").change(function(){
	    $("#fade_btn").hide();
		$('#btn_delete').show();
		//var x=$(this).val();
		//var y="Are you sure you want to delete book ID:"+x+"from 'My Library'";
	//alert(y);
	  });
	  $("#fade_btn").click(function(){
	    alert("Please choose the book from the list.");
		
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
		
		
	$("tr").click(function(){
		//	alert("123");
						//$(this).find("input[type='radio']").get().checked=true; 
						$(this).find("input[type='radio']").get(0).checked=true;
						$("#fade_btn").hide();
						$('#btn_delete').show()
					});		
					
				
			
			
	
		
		
	
	});
	

	
function myFunction()
{
var x=$("input[name='delete_book_id']:checked").attr('value');
//alert(x);
var y="Are you sure you want to delete book ID: "+x+" from 'My Library'?";
//var r=confirm("Are you sure you want to delete book ID: from 'My Library'");
var r=confirm(y);
if (r==true)
  {
 // x="You pressed OK!";
  //$("form").submit();
  return true;
  }
else
  {
  //x="You pressed Cancel!";
 
return false;
   //$("form").submit(function(e){
   //e.preventDefault();
    //alert("Submit prevented");
 //});
  
  }
//document.getElementById("demo").innerHTML=x;
}







//using plugin for pagination here here, but will try to diy it if i have time!!!
/*
function TablePage(id,size){  
   var $table = $(id);  
    var currentPage = 0;  //当前页  
    var pageSize = size;  //每页行数（不包括表头）  
    $table.bind("repaginate", function()  
    {  
       //console.log($table.find("tbody tr").eq(0));  
      $table.find("tbody tr").hide().slice(currentPage * pageSize, (currentPage + 1) * pageSize).show();  
     // $table.find("tbody tr").eq(0).show();  
    });  
    var numRows = $table.find("tbody tr").length;  //记录宗条数  
    var numPages = Math.ceil(numRows/pageSize);    //总页数  
    //console.log(numPages);  
    var $pager = $("<div class='page'><a href='javascript:void(0)'><span id='Prev' style='margin-right:4px;'></span></a></div>");  //分页div  
    for( var page = 0; page < numPages; page++ )  
    {  
  
      //为分页标签加上链接  
      //if(page==0){$("<a href='javascript:void(0)'><span id='1' class="click_page"></span></a>")}  
      $("<a href='javascript:void(0)'><span id='"+(page+1)+"'>"+ (page+1) +"</span></a>")  
           .bind("click", { "newPage": page }, function(event){  
                currentPage = event.data["newPage"];  
                //console.log($(this).children("span"));  
                $(this).children("span").attr("class","click_page");  
                //$(this).children("span").css({"color":"#FFFFFF"});  
                $(".page a span").not($(this).children("span")).attr("class","");  
                //$(".page a span").not($(this).children("span")).css({"color":"#1155BB"});  
                $table.trigger("repaginate");  
            })  
            .appendTo($pager);  
  
        $pager.append("  ");  
    }  
    //$table.trigger("repaginate");  
    var next=$("<a href='javascript:void(0)'><span id='Next'></span></a>");  
    $pager.append(next);  
    $pager.insertAfter($table);//分页div插入table  
    $("#1").attr("class","click_page");  
    //$("#1").css({"color":"#FFFFFF"});  
    $table.trigger("repaginate");  
    //console.log($("#1"));  
    //$("#1").attr("class","click_page");  
    //$("#1").css({"background":"#FFFFFF"});  
    $("#Prev").bind("click",function(){  
       var prev=Number($(".click_page").text())-2;  
       currentPage=prev;  
       //$(this).css({"background":"#000000"});  
       if(currentPage<0) {  
         //$(this).css({"background":"#c0c0c0"});  
         return;  
 }  
       $("#"+(prev+1)).attr("class","click_page");  
       //$("#"+(prev+1)).css({"color":"#FFFFFF"});  
       $(".page a span").not($("#"+(prev+1))).attr("class","");  
       //$(".page a span").not($("#"+(prev+1))).css({"color":"#1155BB"});  
       //console.log(currentPage);  
       $table.trigger("repaginate");  
    });  
     $("#Next").bind("click",function(){  
       var next=$(".click_page").attr("id");  
       currentPage=Number(next);  
       //console.log($(".click_page").text());  
      // $(this).css({"background":"#FFFFFF"});  
       if((currentPage+1)>numPages) {  
         $(this).css({"background":"#c0c0c0"});  
         return;  
         }  
       $("#"+(currentPage+1)).attr("class","click_page");  
       //$("#"+(currentPage+1)).css({"color":"#FFFFFF"});  
       $(".page a span").not($("#"+(currentPage+1))).attr("class","");  
       //$(".page a span").not($("#"+(currentPage+1))).css({"color":"#1155BB"});  
       $table.trigger("repaginate");  
    });  
      
 }
 $(document).ready(function(){
	TablePage("#tab_num",6);
	});
*/


	
</script>

<h2>My library</h2>
<b style="color:#78a040;">My library</b>
<p id="demo"></p>

<?php
//print_r($_SESSION);
//limit the lenth of strings
	
	
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
	
	
	
	
	
	//print_r($_SESSION);
	if($_SESSION['ul']!=0){
		
		//print_r($_POST);
		
		$get_user_id=$_SESSION['id'];
		$get_per_page=5;
		
		mylbdbConnect();
		
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
			}
		
		//SELECT Count(`UserID`) FROM `KXT209_User_Library` where `UserID`=25
		
		
		global $mysqlimylb;
		$query="SELECT Count(`UserID`) FROM `KXT209_User_Library` where `UserID`=".$get_user_id."";
		//echo $query;
		
		$resultpage = $mysqlimylb->query($query);
		$arrpage = $resultpage->fetch_array(MYSQLI_ASSOC);
		//print_r($arrpage);
		$pages= ceil($arrpage["Count(`UserID`)"] / $get_per_page);
		
		$page=(isset($_GET['page'])) ? (int)$_GET['page']:1;
		
		$start=($page-1) * $get_per_page;
		//echo $page;
		
		
		
		
		
		
		
		
		
		//LIMIT".$start.",".$get_per_page."
		
		
		
		//$query=" SELECT bookid FROM `KXT209_User_Library` where `UserID`=".$get_user_id."";
		//SELECT bookid FROM `KXT209_User_Library` where `UserID`=25 LIMIT 0,2
		$query=" SELECT bookid FROM `KXT209_User_Library` where `UserID`=".$get_user_id." LIMIT ".$start.",".$get_per_page."";
		//echo $query;
		/*
		for($i;$i<=$pages;$i++)
		{
			echo "<a href='?page=".$i." '>".$i."</a> ";
			}
		*/
		$result = $mysqlimylb->query($query);
		
		
	
		
		
		
		echo "<table width='880' id='tab_num'>";
		echo "<tr bgcolor='#c2cbff'>";
		echo "<th></th><th>ID</th><th>Title</th><th>Author</th><th>Publisher</th><th>Published_Date</th><th>Keyword</th><th>Subject</th><th>URL</th>";
		echo "</tr>";
		
	
			
		
		
			
		
		echo"<form action='' method='post' onsubmit='return myFunction()'>";//I used 'get' at first,coz I want users to be able to see which booke they deleted. Howerver,I feel it is not save to allow users to manipulate database via URL 
		
		while($arr2 = $result->fetch_array(MYSQLI_ASSOC))
		{
			
			
			
		
			//print_r($arr2);
			$get_book_id=$arr2[bookid];
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
			echo "<td><input type='radio' name='delete_book_id' value='".$get_book_id."'></td>";
			echo "<td>".$get_book_id."</td>";
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
		echo "<table width='880'><tr  bgcolor='#eeeeff' ><td>";
		
		
		for($i;$i<=$pages;$i++)
		{
			echo "<a href='?page=".$i." '>".$i."</a> ";
			}
		echo"</td><td align='right'>";	
		//http://www.youtube.com/watch?v=wd4fE5fk-fk is based on :http://www.youtube.com/watch?v=wd4fE5fk-fk
		echo "<span>Click to delete the book<input type='button' value='Delete' id='fade_btn'><input type='submit' value='Delete' id='btn_delete' class='ajax'></span></td></tr>";
		//echo "<tr  bgcolor='#eeeeff' align='right'><td colspan=9><span>Click to delete the book<input type='button' value='Delete' id='btn_delete' onclick='myFunction()'></span></td></tr>";
		echo "</table>";
	}
	
		echo "</form>";
	
			if($result->num_rows==0)//go back and check this line afterfinishing!!!!!!!!!!!!!!!!!!!
				{

				echo "<table width='880'><tr bgcolor='#eeeeff'><td colspan=9><span style='color:red;'>  &nbsp;Thsere is no item available</span></td></tr>";
				echo "<tr  bgcolor='#eeeeff' align='right'><td colspan=9><span style='color:red;'><form action='".$rootPath."/index.php'><input type='submit' value='Go back to Home page'></form></span></td></tr></table>";
				}	
		//echo $_SESSION['ul'];
		//echo "working";
		
		
		mylbcloseConnection();
		}
	else{
		
		//echo $_SESSION['ul'];
		
		echo "<p style='color:red;'>You do not have access to this page.</p>";
		echo "<a href=".$rootPath."index.php>Go back home page</a>";
		
		}

?>
