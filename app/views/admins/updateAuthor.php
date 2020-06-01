<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Udate Authors</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Authors</li>
        </ol>

        <div class="card mb-4">
            <div class="card-text"> * </div>
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> Edit Author Authors</div>
            <div class="card-body">
                <form action="<?php echo URLROOT . 'users/register&id=' . $data['journalId']->JOURNAL_ID; ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mname"> Middle Name</label>
                            <input type="text" name="mname" class="form-control form-control-lg <?php echo (!empty($data['mname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['mname']; ?>" id=" mname">
                            <span class="invalid-feedback"><?php echo $data['mname_err']; ?></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lname">Last Name <sup>*</sup></label>
                            <input type="text" class="form-control form-control-lg <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lname']; ?>" name="lname" id="lname">
                            <span class="invalid-feedback"><?php echo $data['lname_err']; ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="email">Email: <sup>*</sup></label>
                            <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                        </div>
                        <div class="form-group col-md-6 mb-2">
                            <label for="title">Title <sup>*</sup></label>
                            <input type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>" id="title" name="title">
                            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                        </div>
                        <div class="form-group  col-md-6">
                            <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                            <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 mb-2">
                            <label for="city">City <sup>*</sup></label>
                            <input type="text" class="form-control form-control-lg <?php echo (!empty($data['city_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['city']; ?>" id="city" name="city">
                            <span class="invalid-feedback"><?php echo $data['city_err']; ?></span>
                        </div>
                        <div class="form-group col-md-4 mb-2">
                            <label for="state">State <sup>*</sup></label>
                            <input type="text" class="form-control form-control-lg <?php echo (!empty($data['state_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['state']; ?>" id="state" name="state">
                            <span class="invalid-feedback"><?php echo $data['state_err']; ?></span>
                        </div>
                        <div class="form-group col-md-4 mb-2">
                            <label for="country">Country <sup>*</sup></label>
                            <input type="text" class="form-control form-control-lg <?php echo (!empty($data['country_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['country']; ?>" id="country" name="country">
                            <span class="invalid-feedback"><?php echo $data['country_err']; ?></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <legend class="col-form-label col-md-2 mb-2">Gender <sup>*</sup></legend>
                        <div class="form-group col-md-2 ml-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="MALE" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="FEMALE">
                                <label class="form-check-label" for="gridRadios2">Female
                                </label>
                            </div>
                            <!-- <div class="form-check disabled">
                  <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="others" disabled>
                  <label class="form-check-label" for="gridRadios3">
                    Others
                  </label>
                </div> -->
                        </div>
                        <div class="col-md-4 mb-2 ">
                            <label for="designation">Designation <sup>*</sup> </label>
                            <select class="form-control form-control-lg  <?php echo (!empty($data['designation_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['designation']; ?>"" name=" designation" id="designation" onchange='CheckColors(this.value);'>
                                <option value="Mr">Mr</option>
                                <option value="Miss">Miss</option>
                                <option value="Dr">Dr</option>
                                <option value="Prof">Prof</option>
                                <option value="others">others</option>
                            </select><span class=" invalid-feedback"><?php echo $data['designation_err']; ?></span>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 mb-2">
                            <label for="phone">Mobile Number <sup>*</sup> </label>
                            <input type="text" name="phone" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['phone']; ?>" id="phone">
                            <span class="invalid-feedback"><?php echo $data['phone_err']; ?></span>
                        </div>



                        <div class="col-md-6 mb-2">
                            <label for="institute">Institute Name: <sup>*</sup></label>
                            <input type="text" name="institute" class="form-control form-control-lg <?php echo (!empty($data['institute_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['institute']; ?>" id="institute">
                            <span class="invalid-feedback"><?php echo $data['institute_err']; ?></span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT . 'users/login?id=' . $data['journalId']->JOURNAL_ID; ?>" class="btn btn-light btn-block">Have an account? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</main>
<?php require('footer.php'); ?>