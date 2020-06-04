<?php include("includes/nav.php"); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">ALL ISSUES</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" -->
                    List Of Issues
                </div>
                <!-- /.panel-heading -->

                <div class="panel-body">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="What you looking for?">
                    </div>
                    <table width="100%" class="table table-striped" id="userTbl">
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
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                            <?php

                            if (isset($data['issue'])) {
                                $i = 1;
                                foreach ($data['issue'] as $is) {
                            ?>
                                    <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $is->JOURNAL_NAME; ?> </td>
                                        <td> <?php echo $is->ISSUE_MONTH; ?> </td>
                                        <td> <?php echo $is->VOLUME_NO; ?> </td>
                                        <td> <?php $v = $is->IS_SPECIAL_ISSUE;
                                                if ($v == 1)
                                                    echo "<span class='label label-success'>Special issue</span>";
                                                ?>
                                        </td>
                                        <td> <?php echo $is->ISSUE_YEAR; ?> </td>
                                        <td> <?php echo date("d/m/Y", strtotime($is->D_O_UPLOADING)); ?> </td>

                                        <td> <?php echo $is->SPECIAL_ISSUE_NAME; ?> </td>
                                        <form method="post">
                                            <td><a href="<?php echo URLROOT; ?>editors/editIssue&ID=<?php echo $is->J_ISSUES_ID ?>" style=" text-decoration:none;">
                                                    <span class="glyphicon glyphicon-edit"></span></a>

                                                <input type="hidden" name="as" id='bid' value="<?php echo $is->J_ISSUES_ID; ?>">
                                                <button type="submit" value="delete" id="delete" style="border: none; text-decoration:none;background:transparent; color:red;"> <span class="glyphicon glyphicon-trash">
                                                    </span></button>
                                            </td>
                                        </form>
                                    </tr>
                            <?php $i++;
                                }
                            } else
                                echo "Query failed";;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>