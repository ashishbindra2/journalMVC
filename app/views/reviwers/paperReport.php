<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Paper report</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          Paper Report
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="POST">
                <div class="form-group">
                  <label>Please select file</label> <span class="error"> * <?php echo $data['file_err']; ?></span>
                  <select class="form-control" name="file">
                    <!-- <option disabled selected value="">Please select file</option> -->
                    <?php
                    if (isset($data['report'])) {
                      foreach ($data['report'] as $file) { ?>
                        <option value="<?php echo $file->PAPER_SUB_ID; ?>"> <?php echo $file->PAPER_PATH; ?> </option>
                    <?php  }
                    } else  echo "Query failed";
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label> Select Status</label> <span class="error"> * <?php echo $data['statu_err']; ?></span>
                  <select class="form-control" name="statu">
                    <!-- <option disabled selected value>Please Select a Status</option> -->
                    <?php
                    foreach ($data['status'] as $status_set) { ?>
                      <option value="<?php echo $status_set->STATUS_ID; ?>"> <?php echo $status_set->STATUS_NAME; ?> </option>
                    <?php  } ?>
                  </select>
                </div>
                <div class="form-group">
                  <lable> Give Feedback to author</lable> <span class="error"> * <?php echo $data['comment_err']; ?> </span>
                  <textarea name="comment" rows="4" class="form-control" placeholder="Please Enter Comment"></textarea>
                </div>
                <button type="submit" class="btn btn-default" name="submit">Submit</button>
                <button type="reset" class="btn btn-default" name="reset">Reset</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php require APPROOT . '/views/inc/panelFooter.php'; ?>