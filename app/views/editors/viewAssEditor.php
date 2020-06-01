<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Active Associate Editors</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List Of Associate Editors
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Stream</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Mobile No.</th>
                                <th>Profile Weblink</th>
                                <th>College</th>
                                <th>opration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data['associate'])) {
                                foreach ($data['associate'] as $ass) :
                            ?>
                                    <tr>
                                        <td> <?php echo $ass->sName; ?> </td>
                                        <td> <?php echo $ass->editorName; ?> </td>
                                        <td> <?php echo $ass->editorEmail; ?> </td>
                                        <td> <?php echo $ass->editorMobile; ?> </td>
                                        <td> <?php echo $ass->editorWeb; ?> </td>
                                        <td> <?php echo $ass->editorCollege; ?> </td>
                                        <form method="post">
                                            <td>
                                                <a href="<?php echo URLROOT; ?>editors/updateAssociate&ID=<?php echo $ass->eid ?>" style=" text-decoration:none;">
                                                    <span class="glyphicon glyphicon-edit"></span></a>
                                                <input type="hidden" name="as" id='bid' value="<?php echo $ass->eid; ?>">
                                                <button type="submit" value="delete" id="delete" style="border: none; text-decoration:none;background:transparent; color:red;">
                                                    <span class="glyphicon glyphicon-trash"> </span></button>
                                            </td>
                                        </form>
                                    </tr>
                            <?php endforeach;
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
</div>
</div>
<!-- /#wrapper -->
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>