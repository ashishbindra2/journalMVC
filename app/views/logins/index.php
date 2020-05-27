<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main" style="background-image: url('../img/bg1.jpg')">
    <?php echo "<a class='btn btn-light m-3'  href=" . URLROOT . "logins/adminLogin&id=" . $data['journalId']->JOURNAL_ID . ">Admin Login</a>"; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card bg-light card-body  form-box mt-1 mb-4">
                    <div class="logo mb-1 text-center">
                        <img src="<?php echo IMG . '/logo_icon-min.png' ?>" width="150px">
                    </div>
                    <div class="heading text-primary mb-2">
                        <h4>Login into your account</h4>
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="email" class="text-primary"><strong>Email:</strong> <sup>*</sup></label>
                            <!-- <i class="fa fa-envelope"></i> -->
                            <input type="email" placeholder="Email Address" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>" name='email'>
                            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class=" form-group">
                            <label for="email" class="text-primary"><strong>Password:</strong> <sup>*</sup></label>
                            <!-- <span><i class="fa fa-lock"></i></span> -->
                            <input type="password" placeholder="Password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>" name="password">
                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1">
                                    <label class="custom-control-label " for="cb1">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="forget.html" class="forget-link">Forget password</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="text-left mb-3 ml-4">
                                <input type="submit" name="associate" class="btn btn-success" value="Associate login">
                            </div>
                            <div class="text-left mb-3 ml-4">
                                <input type="submit" name="reviwer" class="btn btn-success" value="Reviwer Login">
                            </div>
                        </div>
                        <div class="text-white mb-3">or login with</div>
                        <div class="row mb-3">
                            <div class="col-4">
                                <a href="" class="btn btn-block btn-social btn-facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" class="btn btn-block btn-social btn-google">
                                    <i class="fa fa-google"></i>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="" class="btn btn-block btn-social btn-twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                        <div class="text-white">Don't have an account?
                            <a href="register.html" class="register-link">Register here</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div> -->
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>