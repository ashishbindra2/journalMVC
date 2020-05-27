<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php include ("includes/url.php"); ?>
<?php include ("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<body>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">NOTIFICATION PAGE</h1>
                </div>
             </div>
                <!-- /.col-lg-12 -->
                  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!--div class="panel-heading"-->
                            
                        <!--/div-->
                        <!-- /.panel-heading -->
<?php 
global $connection;
 $id = $_GET['id'];
 $query1 = "UPDATE temp_data SET sn = 1 WHERE tid=$id";
 $up = mysqli_query($connection,$query1);
 confirm_query($up);
 //mysqli_execute($up);
?>
                        <div class="panel-body">
                            <div class="form-group pull-right">
                                    <input type="text" class="search form-control" placeholder="What you looking for?">
                        </div>
                            <table  class="table table-striped" id="userTbl">
                                <thead >
                                    <tr>
										
                                        <th>Journal Name</th>
                                        <th>Stream Name</th>
                                        <th>Author Name</th>
                                        <th>Paper Path</th>
                                        <th>Abstract</th>
                                        <th>Keywords</th>
                                        <th>Title</th>
                                        <th>Date Of Submission</th>
										<th>Date Of uploading</th>
										
										<!-- <th>Click button to mark as read</th> -->
                                        <!-- <th colspan=2>Operation</th> -->
                                    </tr>
                                </thead>
                                <tbody> <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                	
                                	<?php 
                                	global $connection;
                                	$query0 = "SELECT * FROM temp_data 
                                		JOIN
                                		journal_names ON temp_data.JOURNAL_ID = journal_names.JOURNAL_ID
                                		JOIN
                                		stream ON temp_data.STREAM_ID = stream.STREAM_ID
										JOIN 
										author_details ON temp_data.AUTH_ID =  author_details.AUTH_ID
										WHERE sn = 1 
                                	";
                                	$result = mysqli_query($connection,$query0);
                                	while($display = mysqli_fetch_assoc($result))
                                	{?>
                                	<tr>
                                	   <td><?php echo $display['JOURNAL_NAME'];?> </td>
                                	   <td><?php echo $display['STREAM_NAME'];?></td>
                                	   <td><?php echo $display['FNAME'].' '.$display['LNAME'];?></td>
                                	   <td><?php echo $display['PAPER_PATH'];?>	</td>
                                	   <td><?php echo $display['ABSTRACT'];?></td>
                                	   <td><?php echo $display['KEYWORDS'];?></td>
                                	   <td><?php echo $display['TITLE'];?></td>
                                	   <td><?php echo $display['D_O_Submission'];?></td>
                                	   <td><?php echo $display['D_O_Updation'];?></td>
                                	  <!--  <td><button type="button" id="notification" onclick="fn()" class="btn">Read</button></button></td> -->
                                  <?php /*here*/

                                  		
                                   }?>
                                </tr>
                                	 

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        
                            <script type="text/javascript">
                            	function fn(){
                            		document.getElementsByID('notification').value=="hide";
                            	}

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>