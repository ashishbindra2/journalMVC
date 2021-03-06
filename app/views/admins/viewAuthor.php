<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Active Authors</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">View Authors</li>
        </ol>

        <div class="card mb-4">
            <div class="card-text"> * click author name to show author paper upload detail.</div>
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> List of Authors</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="userTbl">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Designation</th>
                                <th>Institute Name</th>
                                <th>Institute City</th>
                                <th>Institute State</th>
                                <th>Institute Country</th>
                                <th colspan="2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                            <?php
                            if (isset($data['author'])) {
                                foreach ($data['author'] as $author) {
                            ?>
                                    <tr>
                                        <td> <a href="<?php echo URLROOT . 'admins/viewAuthDetails&aid=' . $author->AUTH_ID; ?>">
                                                <?php echo $author->FNAME . " " . $author->MNAME . " " . $author->LNAME; ?></a> </td>
                                        <td> <?php echo $author->GENDER; ?> </td>
                                        <td> <?php echo $author->EMAIL; ?> </td>
                                        <td> <?php echo $author->MOBILE; ?> </td>
                                        <td> <?php echo $author->DESIGNATION; ?> </td>
                                        <td> <?php echo $author->INSTITUTE_NAME; ?> </td>
                                        <td> <?php echo $author->CITY; ?> </td>
                                        <td> <?php echo $author->STATE; ?> </td>
                                        <td> <?php echo $author->COUNTRY; ?> </td>
                                        <form method="post">
                                            <td><a href="<?php echo URLROOT; ?>admins/updateAuthor&ID=<?php echo $author->AUTH_ID ?>" style=" text-decoration:none;">Edit</a>
                                            </td> <input type="hidden" name="bid" id='bid' value="<?php echo $author->AUTH_ID; ?>">
                                            <td> <button type="submit" value="delete" id="delete" style="border: none; text-decoration:none;background:transparent; color:red;"> Delete </button> <span class="glyphicon glyphicon-trash">
                                                </span>
                                            </td>
                                        </form>
                                    </tr>
                            <?php    }
                            } else
                                echo "Query failed";
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>