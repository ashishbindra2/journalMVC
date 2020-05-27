<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php include("includes/nav.php"); ?>
<script>
    $(document).ready(function() {
        $('.search').on('keyup', function() {
            var searchTerm = $(this).val().toLowerCase();
            $('#userTbl tbody tr').each(function() {
                var lineStr = $(this).text().toLowerCase(); //javascript code of seach field
                if (lineStr.indexOf(searchTerm) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Active Journals</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Of Journals <label for="2" class="text-right"> Search :</label>
                    <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group pull-right ">

                    </div>
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

                                        <td><a href="update_journal.php?ID=<?php echo $c["JOURNAL_ID"]; ?>">Edit</a></td>
                                        <td><a href="delete_data.php?ID=<?php echo $c["JOURNAL_ID"]; ?>&func=<?php echo 1; ?>">
                                                <span class="glyphicon glyphicon-trash">
                                                </span></a>
                                        </td>
                                    </tr>
                            <?php endforeach;
                            } else
                                echo "No REsult Found";
                            ?>

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- /#wrapper -->
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>