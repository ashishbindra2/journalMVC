<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Active Associates Editors</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">View Associates Editors</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>List Of Associate Editors</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-bordered" width="100%" cellspacing="0" id="userTbl">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>Stream</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Profile Weblink</th>
                                <th>College</th>
                                <th>opration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data['associate'])) {
                                foreach ($data['associate'] as $ass) :
                            ?>
                                    <tr>
                                        <td> <?php echo $ass->sName; ?> </td>
                                        <td> <?php echo $ass->editorName; ?> </td>
                                        <td> <?php echo $ass->editorEmail; ?> </td>
                                        <td> <?php echo $ass->editorMobile; ?> </td>
                                        <td> <?php echo $ass->editorWeb; ?> </td>
                                        <td> <?php echo $ass->editorCollege; ?> </td>
                                        <form method="post">
                                            <td><a href="<?php echo URLROOT; ?>admins/updateAssociate&ID=<?php echo $ass->eid; ?>" style=" text-decoration:none;">Edit</a>
                                                <input type="hidden" name="eid" id="eid" value="<?php echo $ass->eid; ?>">
                                                <input type="hidden" name="bid" id='bid' value="<?php echo $ass->eid; ?>">
                                                <button type="submit" value="delete" id="delete" style="border: none; text-decoration:none;background:transparent; color:red;"> Delete </button> <span class="glyphicon glyphicon-trash">
                                                </span>
                                            </td>
                                        </form>
                                    </tr>
                            <?php endforeach;
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