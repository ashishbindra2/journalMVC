<?php include ("includes/url.php"); ?>
<?php include("../mail.php");?>
<?php include ("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
<script src="jquery.min.js"></script>
 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
 $s = send_mail($_POST['subject'],$_POST["Description"]);
 if($s)
   echo'<script>sweetAlert("Error","Not Send ","error")</script>';
else 
  echo'<script>sweetAlert("Done","Email Send","success")</script>';

}


function test_input($data)

 {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<style>
      .error {color: #FF0000;}
</style>
<body>
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">notic to reviewer </h1>
      </div>
     <!-- /.col-lg-12 -->
    </div>
      <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
               Assign paper
          </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
                <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                              
                  <div class="form-group">
                     <label>Sub:-</label>
                      <input type="text" name="subject" id="subject">                    
                  </div>
                  
                   <div class="form-group" >
                     <label>Body:</label><br>
                       <textarea cols="45" rows="5" id="notic" name="Description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default" name="submit" > <span class="glyphicon glyphicon-search"></span>Send</button>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->
</body>

</html>
