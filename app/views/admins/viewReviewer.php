<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Active Reviewer</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">View Reviewer</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> List of Reviewer</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="userTbl">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Designation</th>
                                <th>Institute Name</th>
                                <th>Email</th>
                                <th>Webpage</th>
                                <th colspan="2">edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <?php
                            if (isset($data['view'])) {
                                foreach ($data['view'] as $reviwers) { ?>
                                    <tr>
                                        <td> <?php echo $reviwers->FNAME; ?> </td>
                                        <td> <?php echo $reviwers->TITLE; ?> </td>
                                        <td> <?php echo $reviwers->DESIGNATION; ?> </td>
                                        <td> <?php echo $reviwers->INST_NAME; ?> </td>
                                        <td> <?php echo $reviwers->EMAIL; ?> </td>
                                        <td> <?php echo $reviwers->WEBPAGE; ?> </td>
                                        <form method="post">
                                            <td><a href="<?php echo URLROOT; ?>admins/updateReviewere&ID=<?php echo $reviwers->REVIEWER_ID ?>" style=" text-decoration:none;">Edit</a>
                                                <input type="hidden" name="eid" id="eid" value="<?php echo $ass->eid; ?>">
                                                <input type="hidden" name="bid" id='bid' value="<?php echo $reviwers->REVIEWER_ID; ?>">
                                                <button type="submit" value="delete" id="delete" style="border: none; text-decoration:none;background:transparent; color:red;"> Delete </button> <span class="glyphicon glyphicon-trash">
                                                </span>
                                            </td>
                                        </form>
                                    </tr>
                            <?php    }
                            } else
                                echo "Query failed ";
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>