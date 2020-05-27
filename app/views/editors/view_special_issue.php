<?php include("includes/url.php"); ?>
<?php include("includes/nav.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php global $connection; ?>
<script src="../includes/sweet_Alert.js"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Special Issue</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!--div class="panel-heading"-->

                <!--/div-->
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
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

                            <?php

                            $ms = special_issue();
                            if ($ms) {

                                while ($c = mysqli_fetch_assoc($ms)) {
                            ?>
                                    <tr>
                                        <td> <?php echo $c["J_ISSUES_ID"]; ?> </td>
                                        <td> <?php echo $c["JOURNAL_NAME"]; ?> </td>
                                        <td> <?php echo $c["ISSUE_MONTH"]; ?> </td>
                                        <td> <?php echo $c["VOLUME_NO"]; ?> </td>
                                        <td> <?php echo $c["IS_SPECIAL_ISSUE"]; ?> </td>
                                        <td> <?php echo $c["ISSUE_YEAR"]; ?> </td>
                                        <td> <?php echo $c["D_O_UPLOADING"]; ?> </td>

                                        <td> <?php echo $c["SPECIAL_ISSUE_NAME"]; ?> </td>
                                        <td><a href="update_journal.php?ID=<?php echo $c["J_ISSUES_ID"]; ?>">Edit</a></td>
                                        <td><a href="delete_data.php?ID=<?php echo $c["J_ISSUES_ID"]; ?>&func=<?php echo 2; ?>" onclick=" swal()">
                                                <span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                            <?php    }
                            } else
                                echo "Query failed; " . mysqli_connect_error();
                            ?>

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <?php mysqli_free_result($ms);
                    mysqli_close($connection); ?>

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

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this Record!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
</script>

</body>

</html>