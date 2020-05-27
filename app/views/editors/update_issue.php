<?php include ("includes/url.php"); ?>
<?php include ("includes/header.php"); ?>
<?php include ("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php global $connection;

      if(isset($_GET["ID"]))
      $JID=$_GET["ID"];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $confirm=update_issues($_POST["journal_id"], $_POST["issue_month"], $_POST["volume_no"],$_POST["is_special_issue"], $_POST["issue_year"], $_POST["special_issue_name"] );
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
                    <h1 class="page-header">UPDATE ISSUES</h1>
                </div>
                <!-- /.col-lg-12 -->
   <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ISSUE DETAILS
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                	<?php $query="SELECT * FROM j_issues ";
                                            		  $query.="WHERE J_ISSUES_ID={$JID}";
                                            		  $result=mysqli_query($connection,$query);
                                            		  $issue_data=mysqli_fetch_assoc($result);
                                     ?>
									 <?php
										$page = $_SERVER['PHP_SELF'];
										$sec = "10";
									?>
                                    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                      <input type="hidden" value="<?php echo $JID; ?>" name="journal_id">
                                        
                                        <div class="form-group">
                                            <label> Issue Month </label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $issue_data["ISSUE_MONTH"]; ?>" name="issue_month">
                                        </div>
                                         <div class="form-group">
                                            <label>Volume Number</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $issue_data["VOLUME_NO"]; ?>" name="volume_no">
                                        </div>
                                         <div class="form-group">
                                            <label>Special issue</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $issue_data["IS_SPECIAL_ISSUE"]; ?>" name="is_special_issue">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Issue Year</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $issue_data["ISSUE_YEAR"]; ?>" name="issue_year">
                                        </div>
										<div class="form-group">
                                            <label>Date of Uploding</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $issue_data["D_O_UPLOADING"]; ?>" name="D_O_U">
                                        </div>
										<div class="form-group">
                                            <label>	Special Issue Name</label>
                                            <input class="form-control" placeholder="Enter text" value="<?php echo $issue_data["SPECIAL_ISSUE_NAME"]; ?>" name="special_issue_name">
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
                <!-- /.col-lg-12 -->