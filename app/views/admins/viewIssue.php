<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Active Issue</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">View Issue</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> List of Issue</div>
            <?php flash('post_message'); ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="userTbl">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>S.NO</th>
                                <th>Journal Name</th>
                                <th>Issue Month</th>
                                <th>Volume Number</th>
                                <th>Special Issue</th>
                                <th>Issue Year</th>
                                <th>Date Of uploading</th>
                                <th>Issue Name</th>
                                <th colspan=2>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                            <?php

                            if (isset($data['issue'])) {
                                $i = 1;
                                foreach ($data['issue'] as $is) {
                            ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $is->JOURNAL_NAME; ?> </td>
                                        <td> <?php echo $is->ISSUE_MONTH; ?> </td>
                                        <td> <?php echo $is->VOLUME_NO; ?> </td>
                                        <td> <?php $v = $is->IS_SPECIAL_ISSUE;
                                                if ($v == 1)
                                                    echo "<span class='label label-success'>Special issue</span>";
                                                ?>
                                        </td>
                                        <td> <?php echo $is->ISSUE_YEAR; ?> </td>
                                        <td> <?php echo $is->D_O_UPLOADING; ?> </td>

                                        <td> <?php echo $is->SPECIAL_ISSUE_NAME; ?> </td>
                                        <td><a href="<?php echo URLROOT; ?>admins/editIssue&ID=<?php echo $is->J_ISSUES_ID; ?>"><span class="glyphicon glyphicon-edit"></span>Edit</a></td>
                                        <form method="post">
                                            <input type="hidden" name="as" id="as" value="<?php echo $is->J_ISSUES_ID; ?>">
                                            <td><button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Delete</button> </td>
                                        </form>
                                    </tr>
                            <?php $i++;
                                }
                            } else
                                echo "Query failed";;
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>