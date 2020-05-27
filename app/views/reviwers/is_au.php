<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link type='text/css' rel='stylesheet'href='sweetalert-master/dist/sweetalert.css'>
<script src='sweetalert-master/dist/sweetalert.min.js'></script>
</head>
<body>

</body>
</html>
<?php

	if($_SESSION['auth']==true)
	{
		
		$_SESSION['authenticated']=true;
		
		header('location:issue_authors.php');

	}
	else{
		
		echo'<script>sweetAlert("Wrong","Username and Password","error")</script>';
		header('location:paper_sub_detials.php');

	}
		
?>