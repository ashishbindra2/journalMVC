<?php require_once("../includes/connect.php"); ?>
<?php
	global $connection;
	$qr	="Select * from assignment  where ASSIGNMENT_ID=1";
	$ess= mysqli_query($connection,$qr);
	
	while($exe=mysqli_fetch_assoc($ess))

	{
		$jid = $exe["JOURNAL_ID"].'<br/>';
		$rid = $exe["REVIEWER_ID"].'<br/>';
		$IID = $exe["ISSUE_ID" ].'<br/>';
	}
	echo $jid;
	echo $rid;
	echo $IID;

	$qrj = "Select * from  journal_names where JOURNAL_ID='$jid'";
	$essj = mysqli_query($connection,$qrj);
	
	if($essj)
	{
		while($exej=mysqli_fetch_assoc($essj))
			echo $exej["JOURNAL_NAME"];
	}
	else
		echo"ooooo".mysqli_error($connection);
?>