<?php include("includes/nav.php"); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ADD ISSUE</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ISSUE DETAILS
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">

                            <form role="form" method="POST">
                                <input type="hidden" value="<?php echo $JID; ?>" name="journal_id">
                                <div class="form-group">
                                    <label> Issue Month </label>
                                    <input class="form-control" placeholder="Enter text" value="<?php echo $data['issue']->ISSUE_MONTH; ?>" name="issue_month">
                                </div>
                                <div class="form-group">
                                    <label>Volume Number</label>
                                    <input class="form-control" placeholder="Enter text" value="<?php echo $data['issue']->VOLUME_NO; ?>" name="volume_no">
                                </div>
                                <div class="form-group">
                                    <label>Special issue</label>
                                    <input class="form-control" placeholder="Enter text" value="<?php echo $data['issue']->IS_SPECIAL_ISSUE; ?>" name="is_special_issue">
                                </div>
                                <div class="form-group">
                                    <label>Issue Year</label>
                                    <input class="form-control" placeholder="Enter text" value="<?php echo $data['issue']->ISSUE_YEAR; ?>" name="issue_year">
                                </div>
                                <div class="form-group">
                                    <label>Date of Uploding</label>
                                    <input class="form-control" placeholder="Enter text" value="<?php echo $data['issue']->D_O_UPLOADING; ?>" name="D_O_U">
                                </div>
                                <div class="form-group">
                                    <label> Special Issue Name</label>
                                    <input class="form-control" placeholder="Enter text" value="<?php echo $data['issue']->SPECIAL_ISSUE_NAME; ?>" name="special_issue_name">
                                </div>
                                <button type="submit" class="btn btn-info" name="submit">Update</button>
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

<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<!-- /#wrapper -->
<script type="text/javascript">
    function yesnoCheck() {
        if (document.getElementById('yesCheck').checked) {
            document.getElementById('ifYes').style.visibility = 'visible';
        } else {
            document.getElementById('ifYes').style.visibility = 'hidden';
        }
        if (document.getElementById('noCheck').checked) {
            document.getElementById('ifNo').style.visibility = 'visible';
        } else {
            document.getElementById('ifNo').style.visibility = 'hidden';
        }
    }
</script>
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>