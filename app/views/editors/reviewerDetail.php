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
                    Detail about Author
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form role="form" method="POST">
                        <table width="100%" class="table table-striped" id="dataTables-example">
                            <thead>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                <tr>
                                    <th>JOURNALS</th>
                                    <th>VOLUME NO</th>
                                    <th>TITLE</th>
                                    <th>STATUS</th>
                                    <th>COMMENT to author</th>
                                    <th>COMMENT to as.editor</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['view'])) {
                                    foreach ($data['view'] as $all) {  ?>

                                        <tr>
                                            <td><?php echo $all->jName; ?></td>
                                            <td><?php echo $all->vno; ?> </td>
                                            <td><?php echo $all->detail; ?> </td>
                                            <td> <?php
                                                    $v = $all->rstatus;
                                                    if ($v == 1) {
                                                        echo "<span class='label label-success'>accept</span>";
                                                    } elseif ($v == 2) {
                                                        echo "<span class='label label-danger'>Reject</span>";
                                                    } elseif ($v == 3) {
                                                        echo '<span class="label label-success">accept with manor update</span>';
                                                    } elseif ($v == 0) {
                                                        echo '<span class="label label-warning">reject with major update</span>';
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
                                            </td>
                                            <td> <?php echo $all->rAuthor; ?></td>
                                            <td> <?php echo $all->rAsEditor; ?> </td>
                                            <td> <?php echo $all->dates; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else
                                    echo "Query failed"; ?>
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