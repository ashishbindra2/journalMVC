<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">ADD JOURNAL</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">ADD JOURNAL</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                JOURNAL DETAILS
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">Fill the Journal Details</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form role="form" method="POST">
                        <div class="form-group">
                            <label>Journal Name </label>
                            <span class="error"> * <?php echo $data['name_err']; ?> </span>
                            <input class="form-control" placeholder="Enter text" name="journal_name" value="<?php echo $data['journa']->jName; ?>">
                        </div>
                        <div class="form-group">
                            <label> Select Stream</label>
                            <span class="error"> * <?php echo $data['sid_err']; ?></span>
                            <select class="form-control" name="Stream_id">
                                <option value=<?php echo $data['journa']->jsid; ?>> <?php echo $data['journa']->sName; ?> </option>

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
                            <input class="form-control" placeholder="Enter text" value="<?php echo $data['journa']->jAbb; ?>" name="journal_n_abb">
                        </div>
                        <div class="form-group">
                            <label>J_ISSN (Print)</label>
                            <span class="error"> * <?php echo $data['jP_err']; ?></span>
                            <input class="form-control" placeholder="Enter text" value="<?php echo $data['journa']->jP; ?>" name="j_issn_p">
                        </div>
                        <div class="form-group">
                            <label>J_ISSN (Online)</label>
                            <span class="error"> * <?php echo $data['jE_err']; ?></span>
                            <input class="form-control" placeholder="Enter text" value="<?php echo $data['journa']->jO; ?>" name="j_issn_e">
                        </div>

                        <div class="form-group">
                            <label>Frequency</label>
                            <select class="form-control" name="frequency">
                                <option><?php echo $data['journa']->jF; ?></option>
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
                                <input type="radio" name="status" <?php echo ($data['journa']->sta == '1') ? 'checked' : ''; ?> id="1" value="1">Activated
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" <?php echo ($data['journa']->sta == '0') ? 'checked' : ''; ?> id="0" value="0">Deactivated
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