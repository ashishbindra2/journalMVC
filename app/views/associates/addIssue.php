<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
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
                <div class="form-group">
                  <label>Journal Name </label>
                  <span class="error">
                    * <?php echo $data['jName_err'];  ?></span>
                  <select class="form-control" name="j_name">
                    <!-- <option disabled selected value>Please select a journal</option> -->
                    <?php
                    foreach ($data['journal'] as $journal) {
                    ?>
                      <option value="<?php echo $journal->JOURNAL_ID;  ?>"> <?php echo $journal->JOURNAL_NAME; ?> </option>
                    <?php  } ?>
                  </select>

                </div>

                <div class="form-group">
                  <label>Is Special Issue?</label>

                  <label class="radio-inline">
                    <input type="radio" onclick="javascript:yesnoCheck();" name="isspecialissue" id="yesCheck" value="1" />YES &nbsp; &nbsp; &nbsp;
                    <input type="radio" onclick="javascript:yesnoCheck();" name="isspecialissue" id="noCheck" value="0" checked />NO
                  </label>

                  <div id="ifYes" style="visibility:hidden" class="form-group">
                    <label>Issue Name </label><span class="error">
                      * <?php echo $data['issueName_err'];   ?></span>
                    <input class="form-control" placeholder="Enter text" name="issue_name">
                  </div>
                </div>

                <div class="form-group">
                  <label>Date </label> <span class="error"> * <?php echo $data['date_err'] ?></span>
                  <i class="fa fa-calendar"> </i>
                  <input class="form-control " id="date" value="<?php echo date('Y-m-d '); ?>" name="d_o_uploading" type="date" />
                </div>
                <div class="form-group">
                  <label>Issue Month</label>
                  <span class="error"> * <?php echo $data['month_err'];  ?></span>
                  <select class="form-control" name="issue_month">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="Septembe">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Volume No </label></label><span class="error">
                    * <?php echo $data['volume_err']; ?></span>
                  <input class="form-control" placeholder="Enter text" name="volume_no">
                </div>
                <div class="form-group">
                  <label>Issue Year </label>
                  <span class="error">
                    * <?php echo $data['year_err']; ?></span>
                  <input class="form-control" placeholder="Enter text" name="issue_year">
                </div>

                <div class="form-group">
                  <label>Journal Status </label>
                  <span class="error">
                    * <?php echo $data['jid_err']; ?>
                  </span>
                  <select class="form-control" name="journal_status_id">
                    <!-- <option disabled selected value>Please select a journal status</option> -->
                    <?php
                    foreach ($data['journalStatus'] as $sta) {
                    ?>
                      <option value="<?php echo $sta->JOURNAL_STATUS_ID; ?>"> <?php echo $sta->STATUS_NAME; ?> </option>
                    <?php  }
                    ?>
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