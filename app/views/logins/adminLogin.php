<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>css/admin.css">
<div id="main">
    <div class="container-fluid">
        <div role="main">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-sm-8 ">
                    <div class="card mb-4 mt-4">
                        <div class="card-block">
                            <h2 class="card-header text-center"><img src="<?php echo IMG . '/logo_icon-min.png' ?>" class="img-fluid" title="journals" alt="journals images" /></h2>
                            <div class="card-body">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-8">
                                        <form class="mt-3" method="post">
                                            <div class="form-group">
                                                <label for="email" class="sr-only"><strong>Email:</strong> <sup>*</sup></label>
                                                <input type="email" name="email" placeholder="Email Address" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                                                <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="sr-only"><strong>Password:</strong> <sup>*</sup></label>
                                                <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                                                <span class="invalid-feedback"><?php echo $data['password_err']; ?></span> </div>
                                            <div class="rememberpass mt-3">
                                                <input type="checkbox" name="rememberusername" id="rememberusername" value="1" />
                                                <label for="rememberusername">Remember username</label>
                                            </div>

                                            <input type="submit" name="submit" class="btn btn-success btn-block mt-3" id="loginbtn" value="Log in">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/inc/footer.php'; ?>