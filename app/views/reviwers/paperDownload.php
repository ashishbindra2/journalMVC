    <?php include("includes/nav.php");
    $PID = $_GET['pid'];
    // 
    // $RID = $_GET['rid'];
    // $qry = pa_assignment($RID);
    // $exe = mysqli_fetch_assoc($qry);
    // if ($exe['notification'] == 0) {
    //     notification_update($RID);
    // } else
    //     echo "done";
    ?>

    <style type="text/css">
        a.btn:hover {
            -webkit-transform: scale(1.1);
            -moz-transform: scale(1.1);
            -o-transform: scale(1.1);
        }

        a.btn {
            -webkit-transform: scale(0.8);
            -moz-transform: scale(0.8);
            -o-transform: scale(0.8);
            -webkit-transition-duration: 0.5s;
            -moz-transition-duration: 0.5s;
            -o-transition-duration: 0.5s;
        }
    </style>
    <style type="text/css">
        .btn1 {
            background-color: DodgerBlue;
            border: none;
            color: white;
            padding: 12px 30px;
            cursor: pointer;
            font-size: 20px;
        }

        /* Darker background on mouse-over */
        .btn1:hover {
            background-color: RoyalBlue;
        }
    </style>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Paper Details</h1>
                <?php echo '<a href="' . URLROOT . 'reviwers/paperReport&pid=' . $PID . '" class="btn btn-primary a-btn-slide-text">'; ?>
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <span><strong>Edit</strong></span>
                </a>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Downloads
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo URLROOT . 'reviwers/Downloads'; ?>">
                            <?php
                            $v = 0;
                            if (isset($data['download'])) {
                                foreach ($data['download']  as $exe) : ?>
                                    <table width="100%" class="table table-striped" id="dataTables-example">
                                        <tr>
                                            <th>Paper :</th>
                                            <td> <?php echo $exe->title; ?></td>
                                        </tr>
                                        <!-- <tr>
                                            <th>AUTHOR NAME</th>
                                            <td> <?php echo $exe->FNAME; ?></td>
                                        </tr> -->

                                        <tr>
                                            <th>Volume No</th>
                                            <td> <?php echo $exe->volume; ?> </td>
                                        </tr>

                                        <tr>
                                            <th>Journal Name</th>
                                            <td> <?php echo $exe->journal; ?> </td>
                                        </tr>

                                        <tr>
                                            <th> KEYWORDS</th>
                                            <td> <?php echo $exe->keywords; ?>
                                        </tr>
                                        <tr>
                                            <th>ABSTRACT</th></label>
                                            <td> <?php echo $exe->abstract; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>STREAM </th>
                                            <td> <?php echo $exe->stramName; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>DATE</th>
                                            <td><?php echo $exe->dob; ?></td>
                                        </tr>
                                        <tr>
                                            <th>STATUS</th></label>
                                            <td><?php echo ($v == 1) ? "<span class='label label-success'>accept</span>" : " <span class = 'label label-warning'>pending</span>"; ?> </td>
                                        </tr>
                                        <tr>
                                            <th>Download file </th>
                                            <td>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                                <!-- Auto width -->
                                                <button class="btn1">
                                                    <i class="fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </tr>
                                <?php endforeach;
                            } else
                                echo "Query failed";
                                ?>
                                    </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <?php require APPROOT . '/views/inc/panelFooter.php'; ?>

    </center>