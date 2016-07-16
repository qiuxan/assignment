<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>CIS Libaray</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="<?php echo $rootPath;?>styles/default.css" rel="stylesheet" type="text/css"/>
</head>

<body>
  <div class="main">
    <div class="main_resize">
      <!--header-->
      <div class="header">
        <div class="logo">	
	  <h1><span>CIS</span><a href="<?php echo $rootPath?>index.php"> Library Portal</a><span STYLE="font-size:15px; color: rgb(99, 99, 99); font-family:'Calibri';"> &nbsp;School &nbsp;&nbsp;of &nbsp;&nbsp;Computing &nbsp;&nbsp;and &nbsp;&nbsp;Information&nbsp;&nbsp; System &nbsp;&nbsp;Library</span></h1>
        </div>
      </div>
     	
      <!--content-->
      <div class="content">
	<div class="loginbar">
	  <?php require($rootPath.'loginbar.php'); ?>
	</div>
        <div class="content_bg">
          <div class="searchbar">        	
	    <?php require($rootPath.'searchbar.php'); ?>
	  </div>
          <div class="content">
	  <?php require($pageContents); ?>  	  </div>
	
      	  <!--secondcontent-->
      	  <div class="extra">
        
            <div class="extra_resize">
              <div class="col c1">
		<?php require($rootPath.'extra/pauthor.php'); ?>
              </div>
              <div class="col c2">
		<?php require($rootPath.'extra/pkeyword.php'); ?>
              </div>
              <div class="col c3">
		<?php require($rootPath.'extra/psubject.php'); ?>
              </div>
              <div class="clr">
	      </div>
            </div>
      	  </div>
        </div>
        <!--footer-->
        <div class="footer">
          <div class="footer_resize">
	    <p>Developed by Xian Qiu<br/>
	       Student ID : 152192
	    </p>
            <div class="clr"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
