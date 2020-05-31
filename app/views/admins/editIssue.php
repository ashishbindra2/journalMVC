<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Issue</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Issue</li>
        </ol>


        <div class="card mb-4 col-md-6s">
            <div class="card-header">Edit Issue detials</div>
            <div class="card-body">
                <div class="table-responsive ">
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
            </div>
        </div>
    </div>
</main>
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
<?php require('footer.php'); ?>