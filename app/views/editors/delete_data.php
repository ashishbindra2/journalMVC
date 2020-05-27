
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php global $connection; ?>

<html> 
<link type='text/css' rel='stylesheet' href='sweetalert-master/dist/sweetalert.css'>
<script src='sweetalert-master/dist/sweetalert.min.js'></script>
</html>
<?php
switch($_GET["func"])
{
	case 1:
	case 1:
	{
		$result=delete_journal($_GET["ID"]);
  		if($result)
  		{
  		  echo'<script>sweetAlert("item deleted")</script>';
  		}
		
	}
	break;

	
	case 2:
	{
		$result=delete_issues($_GET["ID"]);
		if($result)
  		{
  		 echo'<script>sweetAlert("item deleted")</script>'; 
  		}
		
	}
	break;
	case 3:
	{
		$result=delete_editor($_GET["ID"]);
  		if($result)
  		{
  		 echo'<script>sweetAlert("item deleted")</script>';
  		}
	}
	break;
	case 4:
	{
		$result=delete_author($_GET["ID"]);
  		if($result)
  		{
  		 echo'<script>sweetAlert("item deleted")</script>';
  		}
	}
	break;
	default :
		echo "Not Appropriate function defined";
}
  
 ?>