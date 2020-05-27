<?php require_once("includes/connect.php"); ?>
<?php
	global $connection;
	
	$query="SELECT * FROM paper_submission where AUTH_ID=14";
    $result=mysqli_query($connection,$query);
    
									?><table><?php
											while($c=mysqli_fetch_assoc($result))
											{
											 ?>
											  <tr>												
												<td> <?php echo $c["AUTH_ID"];// echo $c["FNAME"]." ".$c["MNAME"]." ".$c["LNAME"]; ?> </td>
												<td> <?php echo $c["TITLE"]; ?> </td>
												<td> <?php echo $c["STREAM_ID"]; ?> </td>
												<td> <?php echo $c["PAPER_PATH"]; ?> </td>
												<td> <?php echo $c["KEYWORDS"]; ?> </td>
												<td> <?php echo $c["D_O_Submission"]; ?> </td>
                                               
                                                <td> <?php echo $c["D_O_Updation"]; ?> </td>
                                                <td> <?php echo $c["DETAIL"]; ?> </td>
                                                <td> <?php echo $c["ADDED_AUTHORS"]; ?> </td>
		
												</td>
											   </tr>
									<?php	}
	?></table> <?php
																						
										


?>