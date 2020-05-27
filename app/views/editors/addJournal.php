<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">ADD JOURNAL</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          JOURNAL DETAILS
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="POST">
                <div class="form-group">
                  <label>Journal Name </label><span class="error">
                    * <?php echo $data['name_err']; ?></span>
                  <input class="form-control" placeholder="Enter text" name="journal_name">
                </div>
                <div class="form-group">
                  <label> Select Stream</label><span class="error"> * <?php echo $data['sid_err']; ?></span>
                  <select class="form-control" name="Stream_id">
                    <?php
                    foreach ($data['stream'] as $str) { ?>
                      <option value=<?php echo $str->STREAM_ID; ?>> <?php echo $str->STREAM_NAME; ?> </option>
                    <?php  }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Journal Abbrevation </label>
                  <span class="error"> * <?php echo $data['jAbb_err']; ?></span>
                  <input class="form-control" placeholder="Enter text" name="journal_n_abb">
                </div>
                <div class="form-group">
                  <label>J_ISSN (Print)</label>
                  <span class="error"> * <?php echo $data['jP_err']; ?></span>
                  <input class="form-control" placeholder="Enter text" name="j_issn_p">
                </div>
                <div class="form-group">
                  <label>J_ISSN (Online)</label>
                  <span class="error"> * <?php echo $data['jE_err']; ?></span>
                  <input class="form-control" placeholder="Enter text" name="j_issn_e">
                </div>

                <div class="form-group">
                  <label>Frequency</label>
                  <select class="form-control" name="frequency">
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
                  <label>Status</label>
                  <span class="error">
                    * <?php echo $data['status_err']; ?></span>
                  <br>
                  <label class="radio-inline">
                    <input type="radio" name="status" id="1" value="1">Activated
                  </label>
                  <label class="radio-inline">
                    <input type="radio" name="status" id="0" value="0" checked>Deactivated
                  </label>

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

</div>
<!-- /#wrapper -->
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>