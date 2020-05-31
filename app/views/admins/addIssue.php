<?php include("nav.php"); ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Add Issue</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
      <li class="breadcrumb-item active">Add Issue</li>
    </ol>


    <div class="card mb-4 col-md-6s">
      <div class="card-header">Add Issue detials</div>
      <div class="card-body">
        <div class="table-responsive ">
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
            <button type="submit" class="btn btn-outline-success" name="submit">Submit</button>
            <button type="reset" class="btn btn-outline-success" name="reset">Reset</button>
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