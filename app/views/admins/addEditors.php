<?php require  'include/header.php'; ?>

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
  .errors {
    color: #FF0000;
  }
</style>

<body class="bg-gradient-primary">

  <div class="container">
    <input type="button" id="btn" value="back" class="btn btn-warning mt-2" onclick="myFunction()">
    <div class="card o-hidden border-0 shadow-lg my-4">

      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block text-center " style="background-image:url(<?php echo IMG . '/1.jpg' ?>);   background-color: #cccccc; /* Used if the image is unavailable */
  height: auto; 
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; ">
          </div>
          <div class="col-lg-7">
            <div class="p-3">
              <div class="box-body">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="POST">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Stream</label>
                      <select class="form-control" name="sid">
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
                      <input class="form-control" placeholder="Enter Full Name" name="name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <span class="errors"> * <?php echo $data['email_err']; ?></span>
                    <input class="form-control" placeholder="Enter Email" name="email">
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Password</label>
                      <span class="errors"> * <?php echo $data['password_err']; ?></span>
                      <input class="form-control" placeholder="Password" name="pwd1" type="Password">
                    </div>
                    <div class="col-sm-6">
                      <label>Confirm-Password</label>
                      <span class="errors"> * <?php echo $data['password_err']; ?></span>
                      <input class="form-control" placeholder="Confirm Password" name="pwd2" type="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Mobile No.</label>
                      <span class="errors"> * <?php echo $data['mobile_err']; ?></span>
                      <input class="form-control" placeholder="Enter number" name="mobile">
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Status</label>
                      <span class="errors"> * <?php echo $data['status_err']; ?></span>

                      <div class="custom-control custom-radio">
                        <input type="radio" id="1" value=1 checked name="status" class="custom-control-input">
                        <label class="custom-control-label" for="1">Active</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="0" name="status" value=0 class="custom-control-input">
                        <label class="custom-control-label" for="0">Non-Active</label>
                      </div>

                    </div>

                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Weblink to profile (if any)</label>
                      <span class="errors"> * <?php echo $data['web_err']; ?></span>
                      <input class="form-control" placeholder="Enter link" name="weblink">
                    </div>
                    <div class="form-group col-sm-6 mb-sm-6">
                      <label>Role</label>
                      <span class="errors">* <?php echo $data['role_err']; ?></span>
                      <select class="form-control" name="role">
                        <option value="Editor-in-chief">Editor-in-chief</option>
                        <option value="Associate Editor">Associate Editor</option>
                      </select>
                      </select>
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>college name</label>
                      <span class="errors"> * <?php echo $data['college_err']; ?></span>
                      <input class="form-control" placeholder="Enter college name" name="college_name">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label>Detail</label>
                      <span class="errors"> * <?php echo $data['detail_err']; ?></span>
                      <input class="form-control" placeholder="Enter Detail os associate editor" name="Detail">
                    </div>
                  </div>
                  <input type="submit" value="Register Account" class="btn btn-facebook btn-user btn-block">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script>
    function myFunction() {
      location.replace("<?php echo URLROOT . 'admins/home'; ?>")
    }
  </script>

  <?php require('include/footer.php'); ?>