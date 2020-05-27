
<?php
	$S=require_once("includes/connect.php"); 
	$output='';
	$sql="SELECT * FROM journal_names WHERE JOURNAL_ID LIKE '%".$_POST["search"]."%'";
	$result=mysqli_query($S,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$output.='<h4 align="center">Seach Result</h4>';
		$output.='<div class="table-responsive">
					<table class ="table table bordered">
						<tr>
							<th>Jornal id</th>
							<th> journal Name</th>
							<th>journal abb</th>
							<th> journal_n_Abb</th>
							<th>J_issn_E</th>
							<th>Frequency</th>
							<th>Status</th>
						</tr>';
						while($row=mysql_fetch_array($result))
						{
							$output .='
								<tr>
									<td>'.$row["JOURNAL_ID"].'</TD>
									<TD>'.$row["JOURNAL_NAME"].'</TD>
									
									<td>'.$row["JOURNAL_N_ABB"].'</TD>
									<TD>'.$row["J_ISSN_E"].'</TD>
									<TD>'.$row["J_ISSN_P"].'</TD>
									<TD>'.$row["J_FREQUENCY"]'.</TD>
									<TD.'.$row["STATUS"].'</TD>
									
								</tr>
								';
								
							
						}
						echo $output;
							
			
	}	
	else 
		echo "not Done";
	



?>