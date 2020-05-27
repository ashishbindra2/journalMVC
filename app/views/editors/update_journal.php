
<?php include ("includes/url.php"); ?>
<?php include ("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php global $connection;

      if(isset($_GET["ID"]))
      $JID=$_GET["ID"];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $confirm=update_journal($_POST["journal_id"], $_POST["journal_name"], $_POST["journal_n_abb"], $_POST["j_issn_e"], $_POST["j_issn_p"], $_POST["frequency"], $_POST["status"],$_POST["Stream"]);
    if($confirm)
    {
      $JID=$_POST["journal_id"];
        echo "Record updated succesfully!";
    }
}

?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ADD JOURNAL</h1>
                </div>
                <!-- /.col-lg-12 -->
   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            JOURNAL DETAILS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                	<?php $query="SELECT * FROM  journal_names ";
                                            		  $query.="WHERE JOURNAL_ID={$JID}";
                                            		  $result=mysqli_query($connection,$query);
                                            		  $journal_data=mysqli_fetch_assoc($result);
                                     ?>
                                    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                       <input type="hidden" value="<?php echo $JID; ?>" name="journal_id">
                                        <div class="form-group">
                                            <label>Journal Name </label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $journal_data["JOURNAL_NAME"]; ?>" name="journal_name">
                                         </div>
                                        <div class="form-group">

                                            <label> Select Stream</label><span class="error">
                                                <select class="form-control" name="Stream">
                                                <option disabled selected value>Please Select a Stream</option> 
                                                <?php 
                                                   $result=all_streams();
                                                   while($stream_set=mysqli_fetch_assoc($result))
                                                   { ?>
                                                    <option value="<?php echo $stream_set["STREAM_ID"]; ?>"> <?php echo $stream_set["STREAM_NAME"]; ?> </option>
                                            <?php  }
                                                ?>  
                                            </select>
											
                                        </div>
                                        
										<div class="form-group">
                                            <label>Journal Abbrevation </label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $journal_data["JOURNAL_N_ABB"]; ?>" name="journal_n_abb">
                                        </div>
										
                                         <div class="form-group">
                                            <label>J_ISSN (Print)</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $journal_data["J_ISSN_P"]; ?>" name="j_issn_p">
                                        </div>
                                         <div class="form-group">
                                            <label>J_ISSN (Online)</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $journal_data["J_ISSN_E"]; ?>" name="j_issn_e">
                                        </div>
                                        
                                        <div class="form-group" >
                                            <label>Frequency</label><span class="error">
                                            <br>
                                            <?php echo "OLD VALUE: ".$journal_data["FREQUENCY"]; ?></span>
                                            <select class="form-control" name="frequency" value="<?php echo $journal_data["FREQUENCY"]; ?>">
                                                <option>Daily</option>
                                                <option>Weekly</option>
                                                <option>By-Weekly</option>
                                                <option>Monthly</option>
                                                <option>Quaterly</option>
                                                <option>By-Annual</option>
                                                <option>Annual</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label><span class="error">
                                            	<br>
                                            	</span>
                                            <label class="radio-inline">

                                                <input type="radio" name="status" id="1" value=1 <?php echo $journal_data["STATUS"]?"checked":""; ?> >Activated
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="0" value=0 <?php echo $journal_data["STATUS"]?"":"checked"; ?>>Deactivated
                                            </label>
                                            <span class="error">
                                                 
                                                                                    </div>
                                       
                                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                        <button type="reset" class="btn btn-default" name="reset">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                             </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->