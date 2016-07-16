 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />



<script type="text/javascript">


		
		
			$(document).ready(function(){
				
				
					$("#datepicker").blur(function(){

					var that=$(this).val(),
					     check_msg=$(this).parents('.span_require').find('#msg').text();

					//alert(check_msg);
					if(check_msg==''&&that=='')
					{
					//alert(check_msg+'heheheeh');

					$(this).parents('.span_require').find('#dobmsg').html('<b>Require</b>');	


					}


					});
				
				
				
				
				
				
				$(".require").blur(function(){

				var that=$(this).val(),
				     check_msg=$(this).parents('.span_require').find('b').text();

				//alert(check_msg);
				if(check_msg!=''&&that!='')
				{
				//alert(check_msg+'heheheeh');

				$(this).parents('.span_require').find('b').hide();	


				}


				});
				
				
				
				
				
				
				$('#restbtn').click(function(){ 
				
				
					$('#fnmsg').html('');
					$('#lnmsg').html('');
					$('#emmsg').html('');
					$('#aflmsg').html('');
					$('#updatedbmsg').html('');
					$('#dobmsg').html('');
					
					
				});
				//$('#fade_button').hide();
				$("#update_un_show").prop('disabled', true);
				$("#update_lu").prop('disabled', true);
	

			});
			
			
			$(document).ready(function(){
			$.datepicker.setDefaults($.datepicker.regional['nl']); 
$.datepicker.setDefaults({ dateFormat: 'yy-mm-dd' });
  $(function() {
    $( "#datepicker" ).datepicker(
	
		{
		      changeMonth: true,
		      changeYear: true
		    }
	
	);
	
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
	

$(document).ready(function(){
	




$("#update_em").blur(function(){
	/*
var em=$("#update_em");


if(em.val()==""){
	
	$('#emmsg').html('Require');
	$('#button_submit').hide();
		$('#fade_button').show();
		
}
else {
	$('#emmsg').html('');
	$('#fade_button').hide();
	$('#button_submit').show();
	}
	*/
	

	
	
	//$('#emmsg').html(email);
	
	//$.get('validation_email.php?email='+email,show_emmsg);
	
	//alert("Text: " + $('#emmsg').text());


});







});





//ajax	 reference:http://www.youtube.com/watch?v=GrycH6F-ksY

$(document).ready(function(){
$('form.ajax').on('submit',function(){
	//console.log('Trigger');
	
	var that=$(this),
	url=that.attr('action'),
	type= that.attr('method'),
	data={};
	that.find("[name]").each(function(index, value) {
        //console.log(value);
		var that =$(this),
			name= that.attr('name'),
			value=that.val();
			
		data[name]=value;
    });
	
	//console.log(data);
	
	$.ajax({
		url:url,
		type:type,
		data:data,
		success: function(response){
			console.log(response);
			
		//	var updatemsg=response.find('#msgupdate');
			$('#updatedbmsg').html(response);
			$('#updatedbmsg').find('#fn_msg').hide();
			$('#updatedbmsg').find('#ln_msg').hide();
			$('#updatedbmsg').find('#dob_msg').hide();
			$('#updatedbmsg').find('#em_msg').hide();
			$('#updatedbmsg').find('#afl_msg').hide();
	
			$('#lnmsg').html(response);
			$('#lnmsg').find('#fn_msg').hide();
			$('#lnmsg').find('#dob_msg').hide();
			$('#lnmsg').find('#em_msg').hide();
			$('#lnmsg').find('#afl_msg').hide();
			$('#lnmsg').find('#msgupdate').hide();
			
			$('#fnmsg').html(response);
			$('#fnmsg').find('#ln_msg').hide();
			$('#fnmsg').find('#dob_msg').hide();
			$('#fnmsg').find('#em_msg').hide();
			$('#fnmsg').find('#afl_msg').hide();
			$('#fnmsg').find('#msgupdate').hide();
			
			$('#dobmsg').html(response);
			$('#dobmsg').find('#fn_msg').hide();
			$('#dobmsg').find('#ln_msg').hide();
			$('#dobmsg').find('#em_msg').hide();
			$('#dobmsg').find('#afl_msg').hide();
			$('#dobmsg').find('#msgupdate').hide();
			
			$('#emmsg').html(response);
			$('#emmsg').find('#fn_msg').hide();
			$('#emmsg').find('#ln_msg').hide();
			$('#emmsg').find('#dob_msg').hide();
			$('#emmsg').find('#afl_msg').hide();
			$('#emmsg').find('#msgupdate').hide();
			
			
			$('#aflmsg').html(response);
			$('#aflmsg').find('#fn_msg').hide();
			$('#aflmsg').find('#ln_msg').hide();
			$('#aflmsg').find('#dob_msg').hide();
			$('#aflmsg').find('#em_msg').hide();
			$('#aflmsg').find('#msgupdate').hide();
			
			}
		
		
		});
		//$("#updatedbmsg").load("validation.php");
	//	$('#updatedbmsg').html('hh');
	
	return false;
	//!!!!!!!!!!!!!!!!!uncomment this line after finishing coding this part!!!!!!!!!!!!!!
	
	});
});	


$(document).ready(function(){
			
	$("#updatebtn").click(function(){
		
		//$('#updatedbmsg').html('hh');
		
		//$("#updatedbmsg").load("validation.php #msgupdate");
		//$('#updated_msg').html('hehehe');
		//alert("hahah");
							
			});
	
	});
		
		
</script>
<?php

//print_r($_SESSION);

 include_once('db.php');
 
 
 
 
 
 vadbConnect();
			$msg='';
	global $mysqliva;
	$query = "select * from KXT209_Users where Username='".$_SESSION['un']."';";
	//echo $query;
	$result = $mysqliva->query($query);
	$arr2 = $result->fetch_array(MYSQLI_ASSOC);
	//print_r($arr2);
	//echo "$arr2[FName]";


 


?>

<h2>My Page</h2>
<?php
	if($_SESSION['ul']!=0&&$_SESSION['access']==1){
		
		//echo $_SESSION['ul'];
		echo "<form action='validation.php' method='POST' id='valiform' class='ajax'>";
		echo "<input type='hidden' name='update_un' id='update_un' value='".$_SESSION['un']."'><br>";
		//echo "<input type='hidden' name='update_un_show' id='validation_un' value='".$_SESSION['un']."'>";
		echo "<center><br>";
			echo "<span style='color:red;' id='updatedbmsg'></span>";
		
		echo "<table height='350' width='400'>";
		//echo "working";
	
		echo "<tr>";
		echo "<td  align='right'>";
		echo "Username:  &nbsp;";
		echo "</td>";
		echo "<td>";
		echo "<input type='text' name='update_un_show' id='update_un_show' value='".$_SESSION['un']."'><br>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'> *</font>First Name: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo" <span class='span_require'><input type='text' id='update_fn' class='require' name='update_fn' value='".$arr2[FName]."'> <span style='color:red;' id='fnmsg'></span></span>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'> </font>Middle Name: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo" <input type='text' id='update_mn' name='update_mn' value='".$arr2[MName]."'>";
		echo "</td>";
		echo "</tr>";
				
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'>*</font>Last Name: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo"<span class='span_require'> <input type='text' id='update_ln' class='require' name='update_ln' value='".$arr2[LName]."'> <span style='color:red;' id='lnmsg'></span></span>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'>*</font>Date of Birth: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo " <span class='span_require'><input type='text' id='datepicker' class='require' name='update_dob' value='".$arr2[Birthdate]."'/><span style='color:red;' id='dobmsg'></span></span>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'>*</font>Email: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo" <span class='span_require'><input type='text' id='update_em' class='require' name='update_em' size='30' value='".$arr2[Email]."'> <span style='color:red;' id='emmsg'> </span></span>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'> </font>Phone: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo" <input type='text' id='update_ph' name='update_ph' value='".$arr2[Phone]."'>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'></font>Website: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo" <input type='text' id='update_ws' name='update_ws' size='30'  value='".$arr2[Website]."'>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'>*</font>Affliation: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo"<span class='span_require'> <input type='text' id='update_afl' class='require'  name='update_afl' size='30' value='".$arr2[Affli]."'> <span style='color:red;' id='aflmsg'></span></span>";
		echo "</td>";
		echo "</tr>";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td align='right'>";
		echo "<font color='#CC0000'></font>Last Updated: &nbsp;";
		echo "</td>";
		echo "<td>";
		echo" <input type='text' id='update_lu' name='update_lu' value='".$arr2[Updated_date]."' size='30'>";
		echo "</td>";
		echo "</tr>";
	
		echo "</form>";
		echo "</table>";
	
	//	echo '<span id="fade_button"><input type="button" value="Modify"  id="fadeupdatebtn"></span>';
		 echo '<span id="button_submit"><input type="submit" value="Modify" id="updatebtn"> </span>';
		 echo '<input type="reset" value="Reset" id="restbtn">';
		//echo "<div id='msg'  style='color:red;'>".$msg."</div>";
		echo "</center>";
		$_SESSION['access']=0;
		
		}
	else{
		
		//echo $_SESSION['ul'];
		
        echo '<meta http-equiv="refresh" content="0; url=index.php" />';
		//echo "<p style='color:red;'>You do not have access to this page.</p>";
		//echo "<a href=".$rootPath."index.php>Go back home page</a>";
		
		}
	
	vacloseConnection() ;	
?>

<br><br><br>
<p1></p1>

