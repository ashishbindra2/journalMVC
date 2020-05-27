<?php include ("includes/url.php"); ?>
<?php include ("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php
                   $rid= $_GET['rid'];
                     $user = $_SESSION['u'];
                     $a1=   $_SESSION['user1'];
                     echo "Welcome $a1"; 
                     ?>
                </h1>
            </div>
                <!-- /.col-lg-12 -->
        </div>
            <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
             <fieldset id="tableContainer"><legend>New Submissions</legend>
				<?php echo '<a href="submit_manuscript.php?rid='.$rid.'">';?>Submit New Manuscript</a><br/>
					<!-- <span><?php //echo '<a href="paper_report.php?rid='.$rid.'">'?>Submissions Sent Back to Author</a></span>&nbsp;(0)
						<br/> -->
					<span><?php echo '<a href="paper_issue.php?rid='.$rid.'">'?>Incomplete Submissions</a></span>&nbsp;(0)<br/>
					<span><?php echo '<a href="paper_sub_detials.php?rid='.$rid.'">'?>Submissions Waiting for Author&#39;s Approval</a></span>&nbsp;(0)<br/>
			 </fieldset><br/>
            </div>
            
        <div class="col-lg-12">
			<fieldset id="tableContainer"><legend>Revisions</legend>
				<span><?php echo '<a href="paper_report.php?rid='.$rid.'">'?>Revisions Sent Back to Author</a></span>&nbsp;(0)<br/>
				<span><?php echo '<a href="admin_notic.php?rid='.$rid.'">'?>Incomplete Submissions Being Revised</a></span>&nbsp;(0)<br/>
				<span><?php echo '<a href="paper_sub_detials.php?rid='.$rid.'">'?>Revisions Waiting for Author&#39;s Approval</a></span>&nbsp;(0)<br/>
			</fieldset><br/>
        </div>
        <div class="col-lg-12">
			<fieldset id="tableContainer"><legend>Completed</legend>
				<span><?php echo '<a href="complete.php?rid='.$rid.'">'?>Submissions with Production Completed</a></span>&nbsp;(0)<br/>
			</fieldset>
          </div>     
                   
    </div>
    
</body>