<?php include("nav.php"); ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Update Journal</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
      <li class="breadcrumb-item active">ADD JOURNAL</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body">
        UPDATE JOURNAL DETAILS
      </div>
    </div>
    <div class="card mb-4">
      <div class="card-header">Fill the Journal Details</div>
      <div class="card-body">
        <div class="table-responsive">
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
      </div>
    </div>
  </div>
</main>
<?php require('footer.php'); ?>