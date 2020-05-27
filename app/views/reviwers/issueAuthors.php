<?php include("includes/nav.php"); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">paper details</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Paper Details
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <?php
                                $RID = $_SESSION['u'];
                                $qr = "Select * from assignment where REVIEWER_ID ='$RID'  ";
                                $ess = mysqli_query($connection, $qr);

                                while ($exe = mysqli_fetch_assoc($ess)) {

                                    $jid = $exe["JOURNAL_ID"] . '<br/>';
                                    $IID = $exe["ISSUE_ID"] . '<br/>';

                                    $q = "Select * from paper_submission_detail where JOURNAL_ID = '$jid'";
                                    $e = mysqli_query($connection, $q);
                                    if ($e) {
                                        $c = mysqli_fetch_array($e);
                                ?>
                                        <div class="form-group">
                                            <label>TITLE</label><br>
                                            <td><a href="#"><?php echo $c["TITLE"]; ?></a></td>
                                        </div>

                                        <?php
                                        $aid = $c["AUTH_ID"];
                                        $iiq = "Select FNAME from author_details  where AUTH_ID={$aid}";
                                        $qry = mysqli_query($connection, $iiq); ?>
                                        <div class="form-group">
                                            <label>AUTHOR NAME</label><br>
                                            <td> <?php $exej1 = mysqli_fetch_array($qry);
                                                    echo $exej1["FNAME"]; ?> </td>
                                        </div>
                                <?php
                                    } else
                                        echo "Query failed";
                                } ?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <?php require APPROOT . '/views/inc/panelFooter.php'; ?>