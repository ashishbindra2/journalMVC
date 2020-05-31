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

                    <style>
                        .errors {
                            color: #FF0000;
                        }
                    </style>

                    <form class="user" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Stream</label>
                                <select class="form-control" name="sid">
                                    <option selected style="background-color:turquoise;" value="<?php echo $data['editor']->jsid; ?>"><?php echo $data['editor']->sName; ?></option>
                                    <?php
                                    foreach ($data['stream'] as $stream_set) :
                                    ?>
                                        <option value="<?php echo $stream_set->STREAM_ID; ?>"> <?php echo $stream_set->STREAM_NAME; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Name</label>
                                <span class="errors"> * <?php echo $data['name_err']; ?></span>
                                <input type="text" class="form-control" value="<?php echo $data['editor']->editorName; ?>" placeholder="Enter Full Name" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <span class="errors"> * <?php echo $data['email_err']; ?></span>
                            <input type="email" class="form-control" value="<?php echo $data['editor']->editorEmail; ?>" placeholder="Enter Email" name="email">
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Mobile No.</label>
                                <span class="errors"> * <?php echo $data['mobile_err']; ?></span>
                                <input class="form-control" type="text" value=" <?php echo $data['editor']->editorMobile; ?>" placeholder="Enter number" name="mobile">
                            </div>

                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Status</label>
                                <span class="errors"> * <?php echo $data['status_err']; ?></span>

                                <div class="custom-control custom-radio">
                                    <input type="radio" id="1" value='1' <?php echo ($data['editor']->editorStatus == '1') ? 'checked' : ''; ?> name="status" class="custom-control-input">
                                    <label class="custom-control-label" for="1">Active</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="0" name="status" <?php echo ($data['editor']->editorStatus != '1') ? 'checked' : ''; ?> value='2' class="custom-control-input">
                                    <label class="custom-control-label" for="0">Non-Active</label>
                                </div>

                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Weblink to profile (if any)</label>
                                <span class="errors"> * <?php echo $data['web_err']; ?></span>
                                <input type="text" class="form-control" value="<?php echo $data['editor']->editorWeb; ?>" placeholder="Enter link" name="weblink">
                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>collage name</label>
                                <span class="errors"> * <?php echo $data['college_err']; ?></span>
                                <input type="text" class="form-control" value="<?php echo $data['editor']->editorCollege; ?>" placeholder="Enter college name" name="college_name">
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label>Detail</label>
                                <span class="errors"> * <?php echo $data['detail_err']; ?></span>
                                <input type="text" class="form-control" value="<?php echo $data['editor']->editorDetail; ?>" placeholder="Enter Detail os associate editor" name="Detail">
                            </div>
                        </div>
                        <input type="submit" value="Register Account" class="btn btn-dark btn-user btn-block">
                    </form>


                </div>
            </div>
        </div>
    </div>
</main>
<script>
    function myFunction() {
        location.replace("<?php echo URLROOT . 'admins/home'; ?>")
    }
</script>

<?php require('footer.php'); ?>