<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
<?php
 $RID = $_SESSION['user'];
	
		$_SESSION['authenticated']=true;

					a_assignment($RID,1);
		
		header('location:paper_sub_detials.php');

	

		a_assignment($RID,0);
		echo'<script>sweetAlert("Wrong","Username and Password","error")</script>';
		header('location:paper_sub_detials.php');

	
		
?>