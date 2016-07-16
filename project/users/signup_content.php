<html>
<style>
td{border:#FFFFFF 0px;}
.data_box{text-align:left;}
.date_tex{text-align:right;}
</style>


<p> Create your  account</p>
<?php  //<?php //echo $rootPath.'/kernel/check/index.php'  ?>

<form action="<?php echo $rootPath.'/kernel/check/index.php'  ?>" method="post" name="singnup_form"><?php //post information to the index.php of check folder in kernel?>
	<table align="center" border="0">
    <tr>
        <td align="right"><font color="#CC0000">*</font>Username </td>
        <td align="left"> <input type="text" name="sign_up_un" id="un" value="<?php if(isset($sign_up_un)){  echo $sign_up_un;} ?>"><?php if(isset($msg1)) echo"$msg1";?></td>
     </tr>
     
     <tr>
        <td align="right"><font color="#CC0000"> *</font>Password</td>
        <td align="left"><input type="password" name="sign_up_pw" id="pw" value=""> <?php if(isset($msg_pw1)) echo"$msg_pw1";?></td>
    </tr>
    
    <tr>
        <td align="right"><font color="#CC0000">*</font>Re-type Password</td>
        <td align="left"> <input type="password" name="sign_up_pw_re" id="pw_re"><?php if(isset($msg_pw2)) echo"$msg_pw2";?></td>
        
    </tr>
      
      <tr>
        <td align="right"><font color="#CC0000">*</font>First Name  </td>
        <td align="left"><input type="text" name="sign_up_fn"  id="fn" value="<?php if(isset($sign_up_fn)){  echo $sign_up_fn;} ?>"><?php if(isset($msg_fn)) echo"$msg_fn";?></td>
        <td></td>
      </tr>
      
      <tr>
         <td align="right">Middle Name </td>
         <td align="left"><input type="text" name="sign_up_mn" id="mn"></td>
         <td></td>
       </tr>
      
       <tr>
         <td align="right"><font color="#CC0000">*</font>Last Name</td> 
         <td align="left"><input type="text" name="sign_up_ln" id="ln" value="<?php if(isset($sign_up_ln)){  echo $sign_up_ln;} ?>"><?php if(isset($msg_ln)) echo"$msg_ln";?></td>
         <td></td>
        </tr>
      
      <tr>
        <td align="right"><font color="#CC0000">*</font>Day of Birth </td>
            
           <td><select name="sign_up_by" id="by" >	
            
            	<option label="----" value="
				<?php 
				
				if(isset($sign_up_by))							
				{  echo $sign_up_by;} 
				else {echo "----";}	?> ">
                
                <?php 	
				if(isset($sign_up_by))							
				{  echo $sign_up_by;} 
				else {echo "----";}	?></option>
                
                <?php
					
					for($y=2010 ; $y>1909;$y--)
					{
						echo "<option label='$y' value='$y' ";
						
						if (isset($sign_up_by)&&$y==$sign_up_by) echo 'selected';
						
						 echo ">$y</option>";
						
						}
				
				?>              
                   
            </select>
            <select name="sign_up_bm" id="bm">
                
                <option label="--" value="0" >--</option>
            	<option label="Jan" value="1" <?php if(isset($sign_up_bm)&&$sign_up_bm==1) echo 'selected';?> >Jan</option>
            	<option label="Feb" value="2" <?php if(isset($sign_up_bm)&&$sign_up_bm==2) echo 'selected';?>>Feb</option>
            	<option label="Mar" value="3" <?php if(isset($sign_up_bm)&&$sign_up_bm==3) echo 'selected';?>>Mar</option>
            	<option label="Apr" value="4" <?php if(isset($sign_up_bm)&&$sign_up_bm==4) echo 'selected';?>>Apr</option>
            	<option label="May" value="5" <?php if(isset($sign_up_bm)&&$sign_up_bm==5) echo 'selected';?>>May</option>
            	<option label="Jun" value="6" <?php if(isset($sign_up_bm)&&$sign_up_bm==6) echo 'selected';?>>Jun</option>
            	<option label="Jul" value="7" <?php if(isset($sign_up_bm)&&$sign_up_bm==7) echo 'selected';?>>Junl</option>
            	<option label="Aug" value="8" <?php if(isset($sign_up_bm)&&$sign_up_bm==8) echo 'selected';?>>Aug</option>
            	<option label="Sep" value="9" <?php if(isset($sign_up_bm)&&$sign_up_bm==9) echo 'selected';?>>Sep</option>
                <option label="Oct" value="10" <?php if(isset($sign_up_bm)&&$sign_up_bm==10) echo 'selected';?>>Oct</option>
                <option label="Nov" value="11" <?php if(isset($sign_up_bm)&&$sign_up_bm==11) echo 'selected';?>>Nov</option>
                <option label="Dec" value="12" <?php if(isset($sign_up_bm)&&$sign_up_bm==12) echo 'selected';?>>Dec</option>
        	</select>
            
        	<select name="sign_up_bd" id="bd" >
            
            	<option label="--" value="0" >--</option>
                
                <?php
                
				for($d=1;$d<32;$d++)
					{
						echo"<option label='$d' value='$d'";
						if(isset($sign_up_bd)&&$d==$sign_up_bd) echo "selected";
						echo ">$d</option>";
						}
				?>
            </select>
            
            <?php if(isset($msg_date)) echo"$msg_date";?>
            
            </td>
         </tr>
        <tr>
         <td align="right"><font color="#CC0000">*</font>Email</td> 
         <td align="left"><input type="text" name="sign_up_em" id="em" size="30px" value="<?php if(isset($sign_up_em)){  echo $sign_up_em;} ?>"><?php if(isset($msg_em)) echo"$msg_em";?></td>
         <td></td>
        </tr>   
        
        <tr>
         <td align="right">Phone</td> 
         <td align="left"><input type="text" name="sign_up_pn" id="pn"><br/></div></td>
         <td></td>
         </tr>
        
        <tr>
         <td align="right">Website</td> 
         <td align="left"><input type="text" name="sign_up_ws" id="ws" size="30px"></td>
         <td></td>
         </tr>
      
      	<tr>
         <td align="right"><font color="#CC0000">*</font>Affliation</td> 
         <td><input type="text" name="sign_up_afl" id="afl" size="30px" value="<?php if(isset($sign_up_afl)){  echo $sign_up_afl;} ?>"><?php if(isset($msg_afl)) echo"$msg_afl";?></td>
         <td></td>
         </tr>

	</table>
    
    <p align="center">
   	  <input type="submit" value="Sign up" name="Submit" > <input type="reset" value="Reset" >

</form>

</html>