<?php
	//Standard page setup
	
	$KERNEL_LOCATION = './kernel/';    
	require($KERNEL_LOCATION.'includes.php');
    
	$pageTitle       = 'Page Title Here';
	$rootPath        = './';
	$pageContents    = 'home_content.php';

	//Include the master page
	require($rootPath.'master_page.php');

	
?>


