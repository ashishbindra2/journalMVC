<?php include ("includes/url.php"); ?>
<?php include ("includes/header.php"); ?>
<?php include ("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php //require_once("Dbconnect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<script type="text/javascript">
  $(document).ready(function(){
      $("#journal").change(function(){
      var jid=  $("#journal").val();
      $.ajax({
        url : 'functions.php',
        method: 'post',
        data : 'jid='+jid
      }).done(function(j_issues){
          console.log(j_issues);
      })
      })
  })

</script>

<style>
      .error {color: #FF0000;}
   </style>
<body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Assign paper to reviewer </h1>
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
                                    <form role="form" method="POST" action="">
                                        <div class="form-group">
                                          <label>select a journal</label>
                                           <select class="form-control" name="journal"  id="journal" >
                                          <option disabled selected value>Please select a journal</option> 
                                    <?php
                                            $PaperDetails = all_journals();
                                            foreach ($PaperDetails as $PaperDetail) {
                                              # code...
                                              echo "<option id = '".$PaperDetail['JOURNAL_ID']."' value= '".$PaperDetail['JOURNAL_ID']."'>".$PaperDetail['JOURNAL_NAME']."</option>";
                                            }
                                    ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                              <label>Issue</label>
                                            <select class="form-control" name="j_issues" id="j_issues">
                                                <option disabled selected value>Please select a Issue</option> 
                                                <?php global $connection;
                                            if($ess)
                                            { 
                                              $qrj1 = "Select * from   j_issues where JOURNAL_ID='$jid'";
                                              $essj1  = mysqli_query($connection,$qrj1);?>
                                          ?>
                                                
                                                  <?php while($exej1=mysqli_fetch_assoc($essj1))
                                                    {  ?>
                                                      <?php echo '$exej["J_ISSUES_ID"]';?>
                                                      <option value=<?php echo $exej["J_ISSUES_ID"]; ?>><?php   echo $exej1["SPECIAL_ISSUE_NAME"];?></option>
                                                      <?php    
                                                    }?>
                                                      
                                            <?php  }
                                            else
                                                echo "Query failed; ".mysqli_connect_error();
                                    ?>  
                                                ?>  
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>select file</label><span class="error">
                                           
                                            <input type="file" name="file">* <?php echo $mobileErr;?></span>
                                        </div>

                                        <div class="form-group" >
                                            <label>Select Reviewer</label>
                                         <select class="form-control" name="rid">
                                                <option disabled selected value>Please select a Reviewer</option> 
                                                <?php 
                                                   $result=all_reviewer();
                                                   while($stream_set=mysqli_fetch_assoc($result))
                                                   { ?>
                                                    <option value=<?php echo $stream_set["REVIEWER_ID"]; ?>> <?php echo $stream_set["FNAME"]; ?> </option>
                                            <?php  }
                                                ?>  
                                            </select>
                                            <div class="form-group">
                                            <label>select file</label><span class="error">
                                           
                                            <input type="file" name="file">* <?php echo $mobileErr;?></span>
                                        </div>
                                        </div>
                                        <div class="form-group" >
                                            <label>date</label>
                                         <select class="form-control" name="date">
                                                </select>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->
</body>

</html>
