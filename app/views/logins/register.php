<?php require APPROOT . '/views/inc/bootstraph.php'; ?>

<script type="text/javascript">
    function checkForm(form) {


        if (form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
            if (form.pwd1.value.length < 6) {
                alert("Error: Password must contain at least six characters!");
                form.pwd1.focus();
                return false;
            }
            if (form.pwd1.value == form.username.value) {
                alert("Error: Password must be different from Username!");
                form.pwd1.focus();
                return false;
            }
            re = /[0-9]/;
            if (!re.test(form.pwd1.value)) {
                alert("Error: password must contain at least one number (0-9)!");
                form.pwd1.focus();
                return false;
            }
            re = /[a-z]/;
            if (!re.test(form.pwd1.value)) {
                alert("Error: password must contain at least one lowercase letter (a-z)!");
                form.pwd1.focus();
                return false;
            }
            re = /[A-Z]/;
            if (!re.test(form.pwd1.value)) {
                alert("Error: password must contain at least one uppercase letter (A-Z)!");
                form.pwd1.focus();
                return false;
            }
        } else {
            alert("Error: Please check that you've entered and confirmed your password!");
            form.pwd1.focus();
            return false;
        }

        alert("You entered a valid password: " + form.pwd1.value);
        return true;
    }
</script>

<style>
    .error {
        color: #FF0000;
    }
</style>

<body>
    <div class="container">
        <div id="page-wrapper" class="card card-body mt-4">
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Editor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row ">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Editor Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST"">
                                        <div class=" form-group">
                                        <label>Stream</label>
                                        <select class="form-control" name="sid">
                                            <?php
                                            foreach ($data['stream'] as $stream_set) :
                                            ?>
                                                <option value="<?php echo $stream_set->STREAM_ID; ?>"> <?php echo $stream_set->STREAM_NAME; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <span class="error"> * <?php echo $data['name']; ?></span>
                                    <input class="form-control" placeholder="Enter Full Name" name="name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <span class="error"> * <?php echo $data['email_err']; ?></span>
                                    <input class="form-control" placeholder="Enter Email" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <span class="error"> * <?php echo $data['password_err']; ?></span>
                                    <input class="form-control" placeholder="Enter Full Name" name="pwd1" type="Password">
                                </div>
                                <div class="form-group">
                                    <label>Conform-Password</label>
                                    <span class="error"> * <?php echo $data['password_err']; ?></span>
                                    <input class="form-control" placeholder="Enter Full Name" name="pwd2" type="Password">
                                </div>
                                <div class="form-group">
                                    <label>Mobile No.</label>
                                    <span class="error"> * <?php echo $data['mobile_err']; ?></span>
                                    <input class="form-control" placeholder="Enter number" name="mobile">
                                </div>

                                <div class="form-group">
                                    <label>Weblink to profile (if any)</label>
                                    <span class="error"> * <?php echo $data['web_err']; ?></span>
                                    <input class="form-control" placeholder="Enter link" name="weblink">
                                </div>

                                <!-- <div class="form-group">
                                            <label>Photograph</label><span class="error">

                                                <input type="file" name="photograph">* <?php // echo $mobileErr; 
                                                                                        ?></span>
                                        </div> -->

                                <div class="form-group">
                                    <label>Role</label>
                                    <span class="error">* <?php echo $data['role_err']; ?></span>
                                    <select class="form-control" name="role">
                                        <option value="Editor-in-chief">Editor-in-chief</option>
                                        <option value="Associate Editor">Associate Editor</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <span class="error">
                                        * <?php echo $data['status_err']; ?></span>

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
                                    <input class="form-control" placeholder="Enter college name" name="college_name">
                                </div>
                                <div class="form-group">
                                    <label>Detail</label>
                                    <span class="error"> * <?php echo $data['detail_err']; ?></span>
                                    <input class="form-control" placeholder="Enter Detail os associate editor" name="Detail">
                                </div>
                                <input type="submit" class="btn btn-default" name="submit" value="submit">
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
</body>

</html>