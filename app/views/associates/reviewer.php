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
                    Reviwer Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form role="form" method="POST">
                        <table width="100%" class="table table-striped" id="dataTables-example">
                            <thead script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
                                </script>
                                <tr>
                                    <th>REVIWERS</th>
                                    <th>JOURNALS</th>
                                    <th>VOLUME NO</th>
                                    <th>STREAM</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (isset($data['view'])) {
                                    foreach ($data['view'] as $view) {   ?>
                                        <tr>
                                            <td><a href="<?php echo URLROOT; ?>associates/reviewerDetail&rid=<?php echo $view->rid; ?>"><?php echo $view->rName; ?></a></td>
                                            <td><?php echo $view->jName; ?></a></td>

                                            <td> <?php echo $view->vno; //  echo $jid;
                                                    ?>
                                            </td>
                                            <td>
                                                <?php echo $view->stream; ?> </td>
                                            <td> <?php

                                                    $v = $view->rstatus;
                                                    if ($v == 1) {
                                                        echo "<span class='label label-success'>accept</span>";
                                                    } elseif ($v == 2) {
                                                        echo "<span class='label label-danger'>Reject</span>";
                                                    } elseif ($v == 3) {
                                                        echo '<span class="label label-success">Success Label</span>';
                                                    } elseif ($v == 0) {
                                                        echo '<span class="label label-warning">Warning Label</span>';
                                                    } else {
                                                        echo " ";
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