<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo STYLE; ?>/admin.css">
<div id="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 form-container">
                <div class="col-lg-8 col-md-12 col-sm-9 col-xs-12 form-box text-center">
                    <div class="logo mt-5 mb-3">
                        <img src="<?php echo IMG . '/logo_icon-min.png' ?>" width="150px">
                    </div>
                    <div class="heading mb-3">
                        <h4>Login into your account</h4>
                    </div>
                    <form>
                        <div class="form-input">
                            <span><i class="fa fa-envelope"></i></span>
                            <input type="email" placeholder="Email Address" required>
                        </div>
                        <div class="form-input">
                            <span><i class="fa fa-lock"></i></span>
                            <input type="password" placeholder="Password" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6 d-flex">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="cb1">
                                    <label class="custom-control-label text-white" for="cb1">Remember me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="forget.html" class="forget-link">Forget password</a>
                            </div>
                        </div>
                        <div class="text-left mb-3">
                            <button type="submit" class="btn">Login</button>
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
            <div class="col-lg-6 col-md-6 d-none d-md-block image-container"></div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>