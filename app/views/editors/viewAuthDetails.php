<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-14">
            <h1 class="page-header">Author's paper uploads</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-14">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Author Details
                </div>
                <div class="panel-body">
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="What you looking for?">
                    </div>

                    <table width="100%" class="table table-striped" id="userTbl">
                        <thead width="100%">
                            <tr>
                                <!-- <th>Author names</th> -->
                                <th>Title</th>
                                <th>STREAM_names</th>
                                <th>PAPER_PATH</th>
                                <th>KEYWORDS</th>
                                <th>ABSTRACT</th>
                                <th>D_O_Submission</th>
                                <th>D_O_Updation</th>
                                <th>ACTIVE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

                            <?php
                            if (isset($data['authorPaper'])) {
                                foreach ($data['authorPaper'] as $paper) {
                            ?>
                                    <tr>
                                        <td> <a href="<?php echo URLROOT . 'editors/paperStatus&aid=' . $data['aid']; ?>"><?php echo $paper->title; ?> </a></td>
                                        <td> <?php echo $paper->strea; ?> </td>
                                        <td> <?php echo $paper->paper; ?> </td>
                                        <td> <?php echo $paper->keywords; ?> </td>
                                        <td> <?php echo $paper->abstract; ?> </td>
                                        <td> <?php echo $paper->sub; ?> </td>
                                        <td> <?php echo $paper->up; ?> </td>
                                        <td> <?php echo $paper->active; ?> </td>
                                        </td>
                                    </tr>
                            <?php    }
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