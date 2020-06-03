<?php include("includes/nav.php"); ?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Notic for reviewer </h1>
    </div>
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
              <form role="form" method="POST">
                <div class="form-group">
                  <label>Select Reviewer</label> <span class="error">* <?php echo $data['rid_err']; ?> </span>
                  <select class="form-control" name="rid" id="rid">
                    <option value="">Please select a Reviewer</option>
                    <?php
                    if (isset($data['reviwer'])) {
                      foreach ($data['reviwer'] as $stream_set) { ?>
                        <option value="<?php echo $stream_set->REVIEWER_ID; ?>"> <?php echo $stream_set->FNAME; ?> </option>
                    <?php  }
                    } else {
                      echo '<option value="">Reviwers not available</option>';
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Select the paper</label><span class="error">* <?php echo $data['pid_err']; ?> </span>
                  <select class="form-control" name="pid" id="pid">
                    <option value="">Please select a volume no</option>
                  </select>

                </div>

                <div class="form-group">
                  <label>write notice</label><span class="error">* <?php echo $data['notic_err']; ?> </span><br>
                  <textarea class="form-control" rows="3" id="notic" name="notic"></textarea>
                </div>
                <div class="form-group">
                  <label>select last date to submit the report:-</label><span class="error">* <?php echo $data['date_err']; ?> </span>
                  <input type="date" class="form-control" id="date" name="date" />
                </div>

                <button type="submit" class="btn btn-default" name="submit">Submit</button>
                <button type="reset" class="btn btn-default" name="reset">Reset</button>
              </form>
            </div>

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

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#rid').on('change', function() {
      var RID = $(this).val();
      if (RID) {
        $.ajax({
          type: 'POST',
          url: '<?php echo URLROOT . "associates/ajaxPaper" ?>',
          data: 'REVIEWER_ID=' + RID,
          success: function(html) {
            $('#pid').html(html);
          }
        });
      } else {
        $('#pid').html('<option value="">Select journal first</option>');
      }
    });
  });
</script>
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>