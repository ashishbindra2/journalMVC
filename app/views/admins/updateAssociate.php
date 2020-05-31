<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Update Associates Editors info</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Associates Editors</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> Update Associate Editor Details</div>
            <div class="card-body">
                <div class="table-responsive">
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
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>