<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Active Journals</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item active">View Journals</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> List of Journals</div>
            <?php flash('delete_success'); ?>

            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="userTbl">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>Journal Name</th>
                                <th>Stream</th>
                                <th>Abbreviation</th>
                                <th>ISSN (Print)</th>
                                <th>ISSN(Online)</th>
                                <th>Frequency</th>
                                <th colspan=2>Operation</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (isset($data['journal'])) {
                                foreach ($data['journal'] as $journal) :   ?>
                                    <tr>
                                        <td> <?php echo $journal->jName; ?> </td>
                                        <td> <?php echo $journal->sName; ?> </td>
                                        <td> <?php echo $journal->jAbb; ?> </td>
                                        <td> <?php echo $journal->jP; ?> </td>
                                        <td> <?php echo $journal->jO; ?> </td>
                                        <td> <?php echo $journal->jF; ?> </td>
                                        <td><a href="<?php echo URLROOT; ?>admins/updateJournal&ID=<?php echo $journal->jid; ?>">Edit</a></td>
                                        <form method="post">
                                            <input type="hidden" name="bid" id='bid' value="<?php echo $journal->jid; ?>">
                                            <td><button type="submit" value="delete" id="delete" class="btn btn-danger"> Delete </button> <span class="glyphicon glyphicon-trash">
                                                </span>
                                            </td>
                                        </form>
                                    </tr>
                            <?php endforeach;
                            } else
                                echo "No Result Found";
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>