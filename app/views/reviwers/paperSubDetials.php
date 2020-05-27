<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Paper Details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Paper Submition Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped" id="dataTables-example">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>Paper </th>
                                <th>Volume No</th>
                                <th>Journal Name</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th>notification</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            if (isset($data['details'])) {
                                $v = 1;
                            ?>
                                <tr>
                                    <?php
                                    foreach ($data['details'] as $exe) {
                                    ?>
                                        <td> <?php echo '<a href="' . URLROOT . 'reviwers/paperDownload&pid=' . $exe->pid . '">';
                                                echo $exe->title; ?></a></td>
                                        <td><?php echo $exe->volume; ?></td>
                                        <td><?php echo $exe->jname; ?></td>
                                        <td><?php echo $exe->dates; ?></td>
                                        <td><?php $n = $exe->active;
                                            switch ($n) {
                                                case 0:
                                                    echo '<span class="label label-warning">panding</span>';
                                                    break;
                                                case 1:
                                                    echo "<span class='label label-success'>accept</span>";
                                                    break;
                                                default:
                                                    echo "<span class='label label-danger'>Reject</span>";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php echo ($v == $exe->noti) ? " <span class='label label-success'>1</span>" : "";
                                            ?> </td>
                                </tr>
                        <?php  }
                                } else
                                    echo "Query failed";
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

<?php require APPROOT . '/views/inc/panelFooter.php'; ?>