<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Paper details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Author Papers Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <table width="100%" class="table table-striped" id="dataTables-example">
                            <thead>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                <tr>
                                    <th>TITLE</th>
                                    <th>VOLUME NO</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['authorsPaper'])) {
                                    foreach ($data['authorsPaper'] as $paper) {
                                ?>
                                        <tr>
                                            <td> <?php echo $paper->pTitle;  ?> </td>
                                            <td> <?php echo $paper->iVolume;  ?> </td>

                                            <td> <?php
                                                    $v = $paper->prs;

                                                    if ($v == 1) {
                                                        echo "<span class='label label-success'>accept</span>";
                                                    } elseif ($v == 2) {
                                                        echo "<span class='label label-danger'>Reject</span>";
                                                    } elseif ($v == 3) {
                                                        echo '<span class="label label-success">Success Label</span>';
                                                    } elseif ($v == 0) {
                                                        echo '<span class="label label-warning">Warning Label</span>';
                                                    } else {
                                                        echo "";
                                                    }

                                                    ?>
                                            </td>
                                        </tr>
                                <?php  }
                                } else
                                    echo "Query failed";
                                ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </form>
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
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>