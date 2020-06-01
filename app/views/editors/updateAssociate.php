<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" Edit Associate Editors</h1> </div> <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Of Associate Editors
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label>Stream</label>
                                <select class="form-control" name="sid">
                                    <option value="<?php echo $data['associate']->jsid; ?>"><?php echo $data['associate']->sName ?></option>
                                    <?php
                                    foreach ($data['stream'] as $stream_set) { ?>
                                        <option value='<?php echo $stream_set->STREAM_ID; ?>'> <?php echo $stream_set->STREAM_NAME; ?> </option>
                                    <?php  }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <span class="error"> * <?php echo $data['name_err']; ?></span>
                                <input class="form-control" value="<?php echo $data['associate']->editorName; ?>" placeholder="Enter Full Name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <span class="error"> * <?php echo $data['email_err']; ?></span>
                                <input class="form-control" value="<?php echo $data['associate']->editorEmail; ?>" placeholder="Enter Email" name="email">
                            </div>
                            <!-- <div class="form-group">
                            <label>Password</label>
                            <span class="error"> * <?php //echo $data['password_err']; 
                                                    ?></span>
                            <input class="form-control"  placeholder="Enter password" name="password" type="Password">
                        </div> -->

                            <!-- <div class="form-group">
                            <label>Conform-Password</label>
                            <span class="error"> * <?php //echo $data['confirm_password_err']; 
                                                    ?></span>
                            <input class="form-control" placeholder="Enter confirm password" name="confirm_password" type="Password">
                        </div> -->
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <span class="error"> * <?php echo $data['mobile_err']; ?></span>
                                <input class="form-control" value="<?php echo $data['associate']->editorMobile; ?>" placeholder="Enter number" name="mobile">
                            </div>

                            <div class="form-group">
                                <label>Weblink to profile (if any)</label>
                                <input class="form-control" value="<?php echo $data['associate']->editorWeb; ?>" placeholder="Enter link" name="weblink">
                            </div>

                            <!-- <div class="form-group">
                            <label>Role</label>
                            <span class="error">* <?php echo $data['role_err']; ?></span>
                            <select class="form-control" name="role">
                                <option>Editor-in-chief</option>
                                <option>Associate Editor</option>
                            </select>
                        </div> -->

                            <div class="form-group">
                                <label>Status</label>
                                <span class="error">
                                    * <?php echo $data['status_err']; ?></span>
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="1" value=1 checked>Active
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" id="0" value=0>Non-Active
                                </label>
                            </div>
                            <div class="form-group">
                                <label>college name</label>
                                <span class="error"> * <?php echo $data['college_err']; ?></span>
                                <input class="form-control" value="<?php echo $data['associate']->editorCollege; ?>" placeholder="Enter college name" name="college_name">
                            </div>
                            <div class="form-group">
                                <label>Detail</label>
                                <span class="error"> * <?php echo $data['detail_err']; ?></span>
                                <input class="form-control" value="<?php echo $data['associate']->editorDetail ?>" placeholder="Enter Detail os associate editor" name="Detail">
                            </div>
                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                            <button type="reset" class="btn btn-success" name="reset">Reset</button>
                        </form>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<!-- /#wrapper -->
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>