<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php global $connection; ?>
<?php 
switch($_GET["func"])
{
	case 1:
	{
		$result=update_journal($_GET["ID"]);
  		if($result)
  		{
  		echo "Record deleted succesfully!";
  		}
	}
	case 2:
	{

	}
}
  
 ?>