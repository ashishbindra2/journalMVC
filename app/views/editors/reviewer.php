<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                    View Reviwer's Reviwer
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form role="form" method="POST">
                        <table class="table table-striped" id="dataTables-example">
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
                                    foreach ($data['view'] as $comment) {
                                ?>
                                        <tr>
                                            <td><a href="<?php echo URLROOT . 'editors/reviewerDetail&rid=' . $comment->rid; ?>">
                                                    <?php echo $comment->rName; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo URLROOT . 'editors/reviewerDetail&rid=' . $comment->rid; ?>"><?php echo $comment->jName; ?>
                                                </a>
                                            </td>

                                            <td> <?php echo $comment->vno; //  echo $jid;    
                                                    ?>
                                            </td>
                                            <td>
                                                <?php echo $comment->stream; ?> </td>
                                            <td> <?php
                                                    $v = $comment->rstatus;

                                                    if ($v == 1) {
                                                        echo "<span class='label label-success'>accept</span>";
                                                    } elseif ($v == 2) {
                                                        echo "<span class='label label-danger'>Reject</span>";
                                                    } elseif ($v == 3) {
                                                        echo '<span class="label label-success">Accept with minor update</span>';
                                                    } elseif ($v == 0) {
                                                        echo '<span class="label label-warning">Reject with major update</span>';
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

<?php require APPROOT . '/views/inc/panelFooter.php'; ?>