<?php include("includes/nav.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Authors</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Author Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    * click author name to show author paper upload detail.
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="What you looking for?">
                    </div>
                    <table width="100%" class="table table-striped" id="userTbl">
                        <thead width="100%">
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
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                            <?php
                            if (isset($data['author'])) {
                                foreach ($data['author'] as $author) {
                            ?>
                                    <tr>
                                        <td> <a href="<?php echo URLROOT . 'editors/viewAuthDetails&aid=' . $author->AUTH_ID; ?>">
                                                <?php echo $author->FNAME . " " . $author->MNAME . " " . $author->LNAME; ?></a> </td>
                                        <td> <?php echo $author->GENDER; ?> </td>
                                        <td> <?php echo $author->EMAIL; ?> </td>
                                        <td> <?php echo $author->MOBILE; ?> </td>
                                        <td> <?php echo $author->DESIGNATION; ?> </td>
                                        <td> <?php echo $author->INSTITUTE_NAME; ?> </td>
                                        <td> <?php echo $author->CITY; ?> </td>
                                        <td> <?php echo $author->STATE; ?> </td>
                                        <td> <?php echo $author->COUNTRY; ?> </td>
                                        <td><a href="update_author.php?ID=<?php echo $c["AUTH_ID"]; ?>">Edit</a></td>
                                        <td><a href="delete_data.php?ID=<?php echo $c["AUTH_ID"]; ?>&func=<?php echo 4; ?>">
                                                <span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                            <?php    }
                            } else
                                echo "Query failed";
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /#page-wrapper -->
<script>
    $(document).ready(function() {
        $('.search').on('keyup', function() {
            var searchTerm = $(this).val().toLowerCase();
            $('#userTbl tbody tr').each(function() {
                var lineStr = $(this).text().toLowerCase();
                if (lineStr.indexOf(searchTerm) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
</script>
<!-- /#wrapper -->
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>