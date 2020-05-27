<?php include("includes/nav.php"); ?>
<?php //include //'filesLogic.php';
?>
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
        <div class="panel-heading">Assign paper</div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Select a journal</label>
                  <select name="jidd" id="jid" class="form-control <?php echo (!empty($data['jid_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['jid']; ?>">
                    <option value="">Please select a journal</option>
                    <?php
                    if ($data['journal']) {
                      foreach ($data['journal'] as $journal) {
                        echo '<option value="' . $journal->JOURNAL_ID . '">' . $journal->JOURNAL_NAME . '</option>';
                      }
                    } else {
                      echo '<option value="">journal not available</option>';
                    }
                    ?>
                  </select>
                  <span class="invalid-feedback text-danger"><?php echo $data['jid_err']; ?></span>
                </div>
                <div class="form-group">
                  <label>volume No</label>
                  <select class="form-control" name="idd" id="id">
                    <option value="">Please select a volume no</option>
                  </select>
                </div>

                <!-- /.form-froup -->
                <div class="form-group">
                  <label>Select Reviewer</label>
                  <span class="error">* <?php echo $data['rid_err']; ?>
                    <select class="form-control" name="rid" id="rid">
                      <option value="">Please select a Reviewer 1</option>
                      <?php
                      foreach ($data['reviwer'] as $stream_set) { ?>
                        <option value=<?php echo $stream_set->REVIEWER_ID; ?>> <?php echo $stream_set->FNAME; ?> </option>
                      <?php  }
                      ?>
                    </select>
                </div>

                <div class="form-group">
                  <label>Select Reviewer</label>
                  <span class="error">* <?php echo $data['rid2_err']; ?>
                    <select class="form-control" name="rid2" id="rid2">
                      <option value="">Please select a Reviewer 2</option>
                      <?php
                      foreach ($data['reviwer'] as $stream_set) { ?>
                        <option value=<?php echo $stream_set->REVIEWER_ID; ?>> <?php echo $stream_set->FNAME; ?> </option>
                      <?php  }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                  <label>Select Reviewer</label>
                  <span class="error">* <?php echo $data['rid3_err']; ?>
                    <select class="form-control" name="rid3" id="rid3">
                      <option value="">Please select a Reviewer 3</option>
                      <?php
                      foreach ($data['reviwer'] as $stream_set) { ?>
                        <option value=<?php echo $stream_set->REVIEWER_ID; ?>> <?php echo $stream_set->FNAME; ?> </option>
                      <?php  }
                      ?>
                    </select>
                </div>
                <div class="form-group">
                  <label>Select paper</label>
                  <span class="error">* <?php echo $data['file_err']; ?>
                    <select class="form-control" name="myfile" id="myfile">
                      <option value="">Please select papers</option>
                      <?php

                      foreach ($data['paper'] as $paper_set) { ?>
                        <option value=<?php echo $paper_set->PAPER_SUB_ID; ?>> <?php echo $paper_set->TITLE; ?> </option>
                      <?php  }
                      ?>
                    </select>
                </div>

                <div class="form-group">
                  <label>date</label>
                  <select class="form-control" name="date">
                  </select>
                </div>

                <button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
                <button type="reset" class="btn btn-default" name="reset">Reset</button>
              </form>
            </div>
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
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#jid').on('change', function() {
      var JOURNALID = $(this).val();
      if (JOURNALID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo URLROOT . "associates/ajaxData"; ?>',
          data: 'JOURNAL_ID=' + JOURNALID,
          success: function(html) {
            $('#id').html(html);

          }
        });
      } else {
        $('#id').html('<option value="">Select journal first</option>');
      }
    });

  });
</script>

<?php require APPROOT . '/views/inc/panelFooter.php'; ?>