<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
 <link rel="stylesheet" href="/resources/demos/style.css" />

<?php 
$authorarrary=array();
$keywordarr=array();
$subjectarr=array();
$get_current_date=date("Y-m-d h:i:s");
function addbookConnect() {
					global $mysqliaddbook;
					$mysqliaddbook = new mysqli('localhost', 'xianq', '152192', 'xianq');
					if (mysqli_connect_errno()) {
					    printf("Connect failed: %s\n", mysqli_connect_error());
					    exit();
					}

				}
	function addbookcloseConnection() {
					global $mysqliaddbook;
					$mysqliaddbook->close();
			}
			

if(isset($_POST['get_title']))
{
	//Array ( [get_title] => [get_fn] => [get_mn] => [get_ln] => [get_afl] => [get_pn] => [get_city] => [get_country] => [get_date] => [get_keyword] => [get_subject] => [get_url] => ) 
	$get_title=$_POST['get_title'];
	$get_fn=$_POST['get_fn'];
	$get_mn=$_POST['get_mn'];
	$get_ln=$_POST['get_ln'];
	$get_afl=$_POST['get_afl'];
	$get_pn=$_POST['get_pn'];
	$get_city=$_POST['get_city'];
	$get_country=$_POST['get_country'];
	$get_date=$_POST['get_date'];
	$get_keyword=$_POST['get_keyword'];
	$get_subject=$_POST['get_subject'];
	$get_url=$_POST['get_url'];
	$addkey=true;
	$title_check=true;
	$msg='Require';
	if($get_title=='')
	{
		$addkey=false;
	
		
	}
	if($get_fn=='')
	{
		$addkey=false;
		
		
	}
	if($get_ln=='')
	{
		$addkey=false;
		
		
	}
	if($get_afl=='')
	{
		$addkey=false;
	
	}
	if($get_city=='')
	{
		$addkey=false;
	
		
	}
	if($get_country=='')
	{
		$addkey=false;
	
		
	}
	if($get_date=='')
	{
		$addkey=false;
		
		
	}
	if($get_keyword=='')
	{
		$addkey=false;

		
	}
	if($get_subject=='')
	{
		$addkey=false;
	
		
	}
	if($get_url=='')
	{
		$addkey=false;
		
		
	}
	//echo 'hahahaahahah';
	function  checkauther($fn,$mn,$ln,$afli)
	{
		$get_date=date("Y-m-d h:i:s");
		$auexistkey=true;
		$query="SELECT * FROM `KXT209_Author` where `FName`='".$fn."'";
		global $mysqliaddbook;
		$result = $mysqliaddbook->query($query);
		$arr = $result->fetch_array(MYSQLI_ASSOC);
		//print_r($arr);
		if(!isset($arr)){
			//echo 'not exist';
			$auexistkey=false;
		}
		if($fn==$arr['FName']&&$mn==$arr['MName']&&$ln==$arr['LName']&&$afli==$arr['Affiliation'])
		{
			$auexistkey=true;
		//	echo "author exist! "; 
		}
		else{
			$auexistkey=false;
			
			
			
			$query="INSERT INTO `KXT209_Author`( `FName`, `MName`, `LName`, `Affiliation`, `Updated_date`) VALUES ('".$fn."','".$mn."','".$ln."','".$afli."','".$get_date."')";
			//echo $query;
			$result = $mysqliaddbook->query($query);
		//	echo "author noexist! "; 
			
		}
		//echo $query;
		return $auexistkey;// true means exist,false means noexist 
		//echo "hahah";
	}
	function checkpublisher($pn,$city,$country)
	{
		$publisherkey=true;
		global $mysqliaddbook;
		$query="SELECT * FROM `KXT209_Publisher` where Name='".$pn."'";
		$result = $mysqliaddbook->query($query);
		$arr = $result->fetch_array(MYSQLI_ASSOC);
		//print_r($arr);
		if(isset($arr)){
			$publisherkey=false;
		//	echo "publisher exist ";
			
		}
		else 	
		{
		$get_date=date("Y-m-d h:i:s");
		$query="INSERT INTO `KXT209_Publisher`(`Name`, `City`, `Country`, `Updated_date`) VALUES ('".$pn."','".$city."','".$country."','".$get_date."')";
		//echo $query;
		$result = $mysqliaddbook->query($query);
		//echo "publisher noexist ";
		}
	return $publisherkey;// true no exist, false exsit
	
	}

function checkkeyword($kw)
{
	$get_date=date("Y-m-d h:i:s");
	$keywordkey=true;
	global $mysqliaddbook;
	$query="SELECT * FROM `KXT209_Keyword` where Keyword='".$kw."'";
	$result = $mysqliaddbook->query($query);
	$arr = $result->fetch_array(MYSQLI_ASSOC);
	//print_r($arr);
	
	if(isset($arr)){
		$keywordkey=false;
		//echo 'key word esist ';		
	}
  else 
{
	$query="INSERT INTO `KXT209_Keyword`(`Keyword`, `Updated_Time`) VALUES ('".$kw."','".$get_date."')";
	//echo $query;
	$result = $mysqliaddbook->query($query);
//echo 'key word noesist ';
}
return $keywordkey;// true no exist, false exsit
	
}


function checksubject($sbj)
{
	$get_date=date("Y-m-d h:i:s");
	$keysubject=true;
	global $mysqliaddbook;
	$query="SELECT * FROM `KXT209_Subject` where Subject='".$sbj."'";
	$result = $mysqliaddbook->query($query);
	$arr = $result->fetch_array(MYSQLI_ASSOC);
//	print_r($arr);
	
	if(isset($arr)){
		$keysubject=false;
				//echo 'subject esist ';
				
	}
	else {
		//echo 'subject noesist ';
		$query="INSERT INTO `KXT209_Subject`( `Subject`, `Updated_date`) VALUES ('".$sbj."','".$get_date."')";
		$result = $mysqliaddbook->query($query);
		//echo $query;
		}
return $keywordkey;// true no exist, false exsit
	
}

	


	addbookConnect();
	global $mysqliaddbook;
	$query="SELECT * FROM `KXT209_Books` where title='".$get_title."'";
	//	$query="SELECT * FROM `KXT209_Books` where title='sadfsasdfa'";
				//	echo $query;
					$result = $mysqliaddbook->query($query);
					$arr = $result->fetch_array(MYSQLI_ASSOC);
					//print_r($arr);
					if (isset($arr)&&$arr['Published_date']==$get_date)
					{
						//echo 'hahaahah';
						$addkey=false;
						$title_check=false;
					}
					
				/*	
				$authorkey=checkauther($get_fn,$get_mn,$get_ln,$get_afl);// true means exist,false means noexist 
				
				$fullname=$get_fn.$get_mn.$get_ln.$get_afl;

				$authorarrary[$fullname]=0;
				
				*/
				//nosure!!!!!!!!!
				//checkauther('sdafasdfa',$get_mn,$get_ln,$get_afl);
				//checkauther($get_fn,'safddsfas',$get_ln,$get_afl);
				
				if($addkey)
				{
			
						$authorkey=checkauther($get_fn,$get_mn,$get_ln,$get_afl);// true means exist,false means noexist 

						$fullname=$get_fn.$get_mn.$get_ln.$get_afl;

						$authorarrary[$fullname]=0;
			
			
				$publisherkey =checkpublisher($get_pn,$get_city,$get_country);// true no exist, false exsit
			//	checkpublisher('sdafsdaf');
			
				$keywordkey=checkkeyword($get_keyword);// true no exist, false exsit
				
				$keywordarr[$get_keyword]=0;
				
				
			//checkkeyword('dsafsadf');
			
				$subjectkey=checksubject($get_subject);// true no exist, false exsit
				
				$subjectarr[$get_subject]=0;
				
				
			//checksubject('sdafawkdbfdsaiuw');		
				$query="SELECT * FROM `KXT209_Publisher` where `Name`='".$get_pn."'";
				$result = $mysqliaddbook->query($query);
				$arr = $result->fetch_array(MYSQLI_ASSOC);
			//	print_r($arr);
				$get_pubid=$arr['ID'];
			
			//get user id
			
			
			/* don't forget to uncomment here!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		*/

		
			$query="INSERT INTO `KXT209_Books`( `Title`, `Pub_id`, `URL`, `Published_date`, `Updated_date`) VALUES ('".$get_title."','".$get_pubid."','".$get_url."','".$get_date."','".$get_current_date."')";
			//echo $query;
			$result = $mysqliaddbook->query($query);
			
			
			
			
			
			
			
			$query="SELECT * FROM `KXT209_Books` where `Title`='".$get_title."' and `Published_date`='".$get_date."'";
			$result = $mysqliaddbook->query($query);
			$arr = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($arr);
			$get_bookid=$arr['ID'];
			//get author id
			$query="SELECT * FROM `KXT209_Author` where `Affiliation`='".$get_afl."' and `LName`='".$get_ln."' and `MName`='".$get_mn."' and `FName`='".$get_fn."'";
			$result = $mysqliaddbook->query($query);
			$arr = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($arr);
			$get_authorid=$arr['ID'];
			//get keyword id
			$query="SELECT * FROM `KXT209_Keyword` where `Keyword`='".$get_keyword."'";
			$result = $mysqliaddbook->query($query);
			$arr = $result->fetch_array(MYSQLI_ASSOC);
			//print_r($arr);
			$get_keywordid=$arr['ID'];
			//echo $query;
			$query="SELECT * FROM `KXT209_Subject` where `Subject`='".$get_subject."'";
			$result = $mysqliaddbook->query($query);
			$arr = $result->fetch_array(MYSQLI_ASSOC);
		//	print_r($arr);
			$get_subjectid=$arr['ID'];
			/*
			echo $get_authorid;
			echo "<br>";
			echo $get_keywordid;
			echo "<br>";
			echo $get_subjectid;
			echo "<br>";
				*/
				//link books with author
				$query="INSERT INTO `KXT209_Books_author`( `Book_id`, `Author_id`, `Updated_date`) VALUES ('".$get_bookid."','".$get_authorid."','".$get_current_date."')";
				$result = $mysqliaddbook->query($query);
				
				//link book with keyword
				$query="INSERT INTO `KXT209_Books_keyword`( `Book_id`, `Keyword_id`, `Updated_Time`) VALUES ('".$get_bookid."','".$get_keywordid."','".$get_current_date."')";
				$result = $mysqliaddbook->query($query);
				
				$query="INSERT INTO `KXT209_Books_subject`( `Book_id`, `Subject_id`, `Updated_date`) VALUES ('".$get_bookid."','".$get_subjectid."','".$get_current_date."')";
				$result = $mysqliaddbook->query($query);
				
				if(isset($_POST['get_keyword_num']))
				{
					$keyword_number=$_POST['get_keyword_num'];
					for($i=1;$i<=$keyword_number;$i++)
					{
						$kw='get_keyword'.$i;
						
					if(isset($keywordarr[$_POST[$kw]]))
					{
						$_POST[$kw]='';
						
					}
						
						
						if($_POST[$kw]!='')
						{
							$keywordarr[$_POST[$kw]]=0;
							$key=checkkeyword($_POST[$kw]);
							$query="SELECT * FROM `KXT209_Keyword` where `Keyword`='".$_POST[$kw]."'";
							$result = $mysqliaddbook->query($query);
							$arr = $result->fetch_array(MYSQLI_ASSOC);
							//print_r($arr);
							$get_keywordid=$arr['ID'];
							$query="INSERT INTO `KXT209_Books_keyword`( `Book_id`, `Keyword_id`, `Updated_Time`) VALUES ('".$get_bookid."','".$get_keywordid."','".$get_current_date."')";
							$result = $mysqliaddbook->query($query);
							
							
							
						}
						
					}
					
				}
				
				
				if(isset($_POST['get_subject_num']))
				{
					
					$subject_num=$_POST['get_subject_num'];
					for($i=1;$i<=$subject_num;$i++)
					{
						$sbj='get_subject'.$i;
						//subjectarr
							if(isset($subjectarr[$_POST[$sbj]]))
							{
								$_POST[$sbj]='';

							}
						
					//	echo $_POST[$sbj];
					if($_POST[$sbj]!=''){
						
						$key=checksubject($_POST[$sbj]);
						$subjectarr[$_POST[$sbj]]=0;
						
							$query="SELECT * FROM `KXT209_Subject` where `Subject`='".$_POST[$sbj]."'";
							$result = $mysqliaddbook->query($query);
							$arr = $result->fetch_array(MYSQLI_ASSOC);
						//	print_r($arr);
							$get_subjectid=$arr['ID'];
							
							$query="INSERT INTO `KXT209_Books_subject`( `Book_id`, `Subject_id`, `Updated_date`) VALUES ('".$get_bookid."','".$get_subjectid."','".$get_current_date."')";
							$result = $mysqliaddbook->query($query);
						
					}
						
					}
					
				}
				
				if(isset($_POST['get_author_num']))
				{
					$author_num=$_POST['get_author_num'];
					//echo $author_num;
					//echo $_POST['get_fn1'];
					for($i=1;$i<=$author_num;$i++)
					{
					//	echo "hahahaha";
					//	echo $get_bookid;
					//	echo "<br>";
						//echo $i;
						$fn='get_fn'.$i;
					//	echo $fn."=";
					//	echo $_POST[$fn];
					//	echo "<br>";
						
						$mn='get_mn'.$i;
					//	echo $mn."=";
					//	echo $_POST[$mn];
					//	echo "<br>";
						
						$ln='get_ln'.$i;
					//	echo $ln."=";
					//	echo $_POST[$ln];
					//	echo "<br>";
						
						$afl='get_afl'.$i;
					//	echo $afl."=";
					//	echo $_POST[$afl];
					//	echo "<br>";
						
			
						
						
					//	$authorarrary=array();
						
						
						//&&!
						
							
						
				$fullname=$_POST[$fn].$_POST[$mn].$_POST[$ln].$_POST[$afl];
				//	print_r($authorarrary);
					
						if(isset($authorarrary[$fullname]))
						{
							$_POST[$fn]='';
							
						//	echo "hahhahaha"; 
						}
						
						
						
						if($_POST[$fn]!=''&&$_POST[$ln]!=''&&$_POST[$afl]!='')
						{
									
							$authorarrary[$fullname]=0;
							$key=checkauther($_POST[$fn],$_POST[$mn],$_POST[$ln],$_POST[$afl]);
							
								$query="SELECT * FROM `KXT209_Author` where `Affiliation`='".$_POST[$afl]."' and `LName`='".$_POST[$ln]."' and `MName`='".$_POST[$mn]."' and `FName`='".$_POST[$fn]."'";
								$result = $mysqliaddbook->query($query);
								$arr = $result->fetch_array(MYSQLI_ASSOC);
								//print_r($arr);
								$get_authorid=$arr['ID'];
								
								$query="INSERT INTO `KXT209_Books_author`( `Book_id`, `Author_id`, `Updated_date`) VALUES ('".$get_bookid."','".$get_authorid."','".$get_current_date."')";
								
							//	echo $query;
								$result = $mysqliaddbook->query($query);
							
						}
						
						
					}
					
				}
				
				
				
			}
					
	addbookcloseConnection();
	
}
?>
  <script>
/*
	function addauthor(i){  
		
	t=$("<tr bgcolor='#eeeeff'><td></td><td><input name='get_fn<?php echo $i;?>'></td><td><input name='get_mn<?php echo $i;?>'></td><td><input name='get_ln<?php echo $i;?>'></td><td><input name='get_afl<?php echo $i;?>'></td></tr>");  
	$("#authoer").append(t);
	i++;
	return i;
	
}
*/

 $(document).ready(function(){
	
	/*
	$("tr.added_author").on("mouseover",function(){
	   	$(this).find("td").attr("bgcolor","#c2cbff");
	//alert("Please choose a user from the list.");
	  });

	$("tr.added_author").on("mouseout",function(){
	   	$(this).find("td").attr("bgcolor","#eeeeff");
	  });
	
*/
	
	
	<?php
	if(isset($title_check)&&!$title_check)
	echo "alert('This book exsits in the database.');"
	
	?>		
			var i=1;
			var j=1;
			var k=1;
				
				
						
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

		$(".require").blur(function(){
	
		var that=$(this).val(),
		     check_msg=$(this).parents('.span_require').find('#msg').text();
		
		//alert(check_msg);
		if(check_msg!=''&&that!='')
		{
		//alert(check_msg+'heheheeh');
		
		$(this).parents('.span_require').find('#msg').hide();	
		
			
		}
	
	
		});
		
			$("#addauthor").click(function(){
			//var i=1;
			//if(!i){var i=0;}
			t=$("<tr bgcolor='#eeeeff' class='added_author'><td></td><td><input size='8' name='get_fn"+i+"'></td><td><input size='8' name='get_mn"+i+"'></td><td><input size='8' name='get_ln"+i+"'></td><td><input size='30' name='get_afl"+i+"'></td></tr>");  
			$("#author").append(t);
			$('#get_author_num').html('<input type="hidden" name="get_author_num" value='+i+'>');
			i++;
		//	alert(i);
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
		
		
		
				$("#add_keyword").click(function(){
				
				t=$('<tr bgcolor="#eeeeff"><td align="right" bgcolor="#eeeeff"></td><td bgcolor="#eeeeff"><input type="text" size="30" name="get_keyword'+j+'"></td></tr>');  
				$("#keyword").append(t);
				$('#get_keyword_num').html('<input type="hidden" name="get_keyword_num" value='+j+'>');
				j++;
			
			
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
		
		
					$("#add_subject").click(function(){

					t=$('<tr bgcolor="#eeeeff"><td align="right" bgcolor="#eeeeff"></td><td bgcolor="#eeeeff"><input type="text" size="30" name="get_subject'+k+'"></td></tr>');  
					$("#subject").append(t);
					$('#get_subject_num').html('<input type="hidden" name="get_subject_num" value='+k+'>');
					k++;

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
	
	
	$(document).ready(function(){
				$.datepicker.setDefaults($.datepicker.regional['nl']); 
	$.datepicker.setDefaults({ dateFormat: 'yy-mm-dd' });
	  $(function() {
	    $( "#datepicker" ).datepicker(

			{
			      changeMonth: true,
			      changeYear: true
			    });

	//	$( "#datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
	//this line is suposed to control the date rage but i can't use it fro somereason:(    reference: http://jqueryui.com/datepicker/#dropdown-month-year

	    $( "#format" ).change(function() {

		$('.datepicker').datepicker(	{
			      changeMonth: true,
			      changeYear: true
			    });

	    });

	  });
	});
	
	
	
</script>
<style>
a.back{text-decoration:none}


</style>
<h2>Adding book</h2>


<b style="color:#78a040;"><a class='back' href='managepage.php?back=1'><< back to Admin Page</a></b><br>

<?php
//reference for function charlimit: http://codepad.org/OetkaMh6
	function charlimit($string, $limit) {
		
		$overflow = (strlen($string) > $limit ? true : false);
		
		return substr($string, 0, $limit) . ($overflow === true ? "..." : '');
	}



		
			
?>
<?php

//print_r($_POST);



?>

<?php
//print_r($_POST);
//print_r($_SESSION);

if ($_SESSION['addinfo']!=$_POST['addinfo'])
{$_SESSION['access']=1;
	}


if(isset($_POST['get_title'])&&$_SESSION['addbook']!=$_POST)
{
	//echo'hahahaahaah';
	$_SESSION['access']=1;
}	
	

if(isset($_POST['get_title']))
{
	$_SESSION['addbook']=$_POST;
	
}

//$_SESSION['access']=1;
$_SESSION['addinfo']=$_POST['addinfo'];

	if($_SESSION['ul']==1&&$_SESSION['access']==1){
		
echo "<form action='' method='post'>";		
//	echo "hahaahah";
echo	"<table id='tab_num' width='880'>";
echo "<tr><th bgcolor='#c2cbff' width='220' align='left' ><b>Title</b></th><td bgcolor='#eeeeff'><span class='span_require'>&nbsp;<input type='text' name='get_title' class='require' size='65' ";
if (isset($get_title)&&!$addkey) echo "value='".$get_title."'";
echo ">";
if(isset($get_title)&&$get_title=='') echo "<span id='msg' style=' color:red;'>".$msg."</span>";
echo "</span></td></tr>";

echo "</table>";

echo	"<table id='author' width='880'>";
echo "<tr bgcolor='#c2cbff'  align='left'><th  width='220' align='left' ><b>Author</b></th><th>First_Name</th><th>Middle_Name</th><th>Last_Name</th><th>Afflication</th></tr>";
echo  "<tr  bgcolor='#eeeeff' ><td align='right'><b><a id='addauthor' >Add</a></b></td><td> <span class='span_require'> <input type='text' name='get_fn' class='require' size='8' ";
if (isset($get_fn)&&!$addkey) echo "value='".$get_fn."'";
echo ">";
if(isset($get_fn)&&$get_fn=='') echo "<p id='msg' style=' color:red;'>".$msg."</p>";
echo "</span></td><td> <input type='text' name='get_mn' size='8' ";
if (isset($get_mn)&&!$addkey) echo "value='".$get_mn."'";
echo "></td><td> <span class='span_require'><input type='text' name='get_ln' class='require' size='8' ";
if (isset($get_ln)&&!$addkey) echo "value='".$get_ln."'";
echo ">";
if(isset($get_ln)&&$get_ln=='') echo "<p id='msg' style=' color:red;'>".$msg."</p>";
echo "</span></td><td> <span class='span_require'><input type='text' name='get_afl' size='30' class='require' ";
if (isset($get_afl)&&!$addkey) echo "value='".$get_afl."'";
echo ">";
if(isset($get_afl)&&$get_afl=='') echo "<p id='msg' style=' color:red;'>".$msg."</p>";
echo" </span></td></tr>";
echo "</table>";

echo	"<table width='880'>";
echo "<tr bgcolor='#c2cbff'  align='left'><th  width='220' align='left' ><b>Publisher</b></th><th>Publisher_name</th><th>city</th><th>country</th></tr>";
echo  "<tr  bgcolor='#eeeeff' ><td align='right'></td><td><span class='span_require'><input type='text' name='get_pn' class='require' size='40' ";
if (isset($get_pn)&&!$addkey) echo "value='".$get_pn."'";
echo ">";
if(isset($get_pn)&&$get_pn=='') echo "<p id='msg' style=' color:red;'>".$msg."</p>";
echo "</span></td><td><span class='span_require'><input type='text' name='get_city' size='8' class='require' ";
if (isset($get_city)&&!$addkey) echo "value='".$get_city."'";
echo ">";
if(isset($get_city)&&$get_city=='') echo "<p id='msg' style=' color:red;'>".$msg."</p>";
echo "</span></td><td><span class='span_require'> <input type='text' name='get_country' class='require' size='8' ";
if (isset($get_country)&&!$addkey) echo "value='".$get_country."'";
echo ">";
if(isset($get_country)&&$get_country=='') echo "<p id='msg' style=' color:red;'>".$msg."</p>";
echo "</span></td></tr>";
echo "<tr bgcolor='#c2cbff'  align='left'><th><b>Publish_Date</b></th><td bgcolor='#eeeeff' colspan='3'><span class='span_require'><input type='text' name='get_date' class='require' size='20' id='datepicker' ";
if (isset($get_date)&&!$addkey) echo "value='".$get_date."'";
echo ">";
if(isset($get_date)&&$get_date=='') echo "<span id='msg' style=' color:red;'>".$msg."</span>";
echo "</span></td></tr>";
echo "</table>";

echo	"<table id='keyword' width='880'>";
echo "<tr bgcolor='#c2cbff'  align='left' ><th align='left' colspan='2'><b>Keyword</b></th></tr>";
//echo "<tr bgcolor='#eeeeff'  align='left' ><td align='left' colspan='2'><b>Keyword</b></td></tr>";
echo "<tr bgcolor='#eeeeff'  ><td align='right' width='220'><b><a id='add_keyword'>Add</a></b></td><td><span class='span_require'><input type='text' size='30' name='get_keyword' class='require' ";
if (isset($get_keyword)&&!$addkey) echo "value='".$get_keyword."'";
echo ">";
if(isset($get_keyword)&&$get_keyword=='') echo "<span id='msg' style=' color:red;'>".$msg."</span>";
echo "</span></td></tr>";

echo	"</table><table  width='880' id='subject'>";
echo "<tr bgcolor='#c2cbff'  align='left' ><th align='left' colspan='2'><b>Subject</b></th></tr>";
echo "<tr bgcolor='#eeeeff' ><td align='right' width='220'><b><a id='add_subject'>Add</a></b></td><td><span class='span_require'><input type='text' size='30' name='get_subject' class='require' ";
if (isset($get_subject)&&!$addkey) echo "value='".$get_subject."'";
echo ">";
if(isset($get_subject)&&$get_subject=='') echo "<span id='msg' style=' color:red;'>".$msg."</span>";

echo "</span></td></tr>";
echo "</table><table  width='880'>";

echo "<tr  align='left'><th bgcolor='#c2cbff' align='left'  width='220'><b>URL</b></th><td bgcolor='#eeeeff'><span class='span_require'><input type='text' size='40' name='get_url' class='require' ";
if (isset($get_url)&&!$addkey) echo "value='".$get_url."'";
echo ">";
if(isset($get_url)&&$get_url=='') echo "<span id='msg' style=' color:red;'>".$msg."</span>";
echo "</span></td></tr>";

echo	"</table><table width='880'>";
echo "<tr  align='right'><td bgcolor='#eeeeff' colspan='2'>Click to add the paper<input type='submit' value='Add'></td></tr>";
echo "</table>";
echo "<span id='get_author_num'></span><span id='get_keyword_num'></span><span id='get_subject_num'></span>";
	echo "<form>";
	
	$_SESSION['back']=0;
	$_SESSION['access']=0;
			}
		
		
		
		
	else{
		
		//echo $_SESSION['ul'];
		
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		//echo "<p style='color:red;'>You do not have access to this page.</p>";
		//echo "<a href=".$rootPath."index.php>Go back home page</a>";
		
		}
	
	
?>

