


<?php
session_start();

if(!isset($_SESSION['search_index']))
  $_SESSION['search_index']='';

if(!isset($_SESSION['search_info']))
  $_SESSION['search_info']='';


?>



<?php
	
	if(isset($_GET['search_submit'])){
		
		$_SESSION['search_index']=$_GET['get_index'];
		$_SESSION['search_info']=$_GET['get_search_info'];
		
		
		
		}




?>





<div class="inner">

<form action=<?php echo $rootPath. 'search/index.php';?> method="get" >

<select STYLE="TEXT-ALIGN:CENTER;" name="get_index" id="bm"  style= "width: 100px; ">


<option <?php if($_SESSION['search_index']=='Title') echo 'selected';?> >Title</option>
<option <?php if($_SESSION['search_index']=='Keyword') echo 'selected';?>>Keyword</option>
<option <?php if($_SESSION['search_index']=='Author') echo 'selected';?>>Author</option>
<option <?php if($_SESSION['search_index']=='Subject') echo 'selected';?>>Subject</option>

</select>

<input type="text"  name="get_search_info" size="80"
  <?php 
  
  if($_SESSION['search_info']!='') 
	{
		echo "value='";
		echo $_SESSION['search_info']."'";
		
		}
  	
  
  ?>


/><input type="submit" value="Search" name="search_submit">


</form>



</div>
