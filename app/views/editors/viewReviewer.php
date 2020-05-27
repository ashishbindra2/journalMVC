<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php include("includes/nav.php"); ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Active Reviewer</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View Rieviwers
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="What you looking for?">
                    </div>
                    <table width="100%" class="table table-striped" id="userTbl">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Designation</th>
                                <th>Institute Name</th>
                                <th>Email</th>
                                <th>Webpage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <?php
                            if (isset($data['view'])) {
                                foreach ($data['view'] as $reviwers) {
                            ?>
                                    <tr>

                                        <td><?php echo $reviwers->FNAME; ?> </td>
                                        <td> <?php echo $reviwers->TITLE; ?> </td>
                                        <td> <?php echo $reviwers->DESIGNATION; ?> </td>
                                        <td> <?php echo $reviwers->INST_NAME; ?> </td>
                                        <td> <?php echo $reviwers->EMAIL; ?> </td>

                                        <td> <?php echo $reviwers->WEBPAGE; ?> </td>
                                        <td><a href="update_editor.php?ID=<?php echo $c["EIC_ID"]; ?>">Edit</a></td>
                                        <td><a href="delete_data.php?ID=<?php echo $c["EIC_ID"]; ?>&func=<?php echo 3; ?>">
                                                <span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                            <?php    }
                            } else
                                echo "Query failed ";
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

</div>
<!-- /#wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>