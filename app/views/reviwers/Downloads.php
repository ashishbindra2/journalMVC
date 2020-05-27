<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Downloads</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body"> <?php if (empty($data['download']->paper)) {
                                                echo "<h1>Note that only pdf will be display doc and txt will download and not load on the site</h1>";
                                            }               ?>
                    <embed src="<?php echo  $data['download']->paper; ?>" type="application/pdf" width="100%" height="600px" />
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>