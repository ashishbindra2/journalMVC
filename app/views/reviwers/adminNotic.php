    <?php include("includes/nav.php"); ?>
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
                <h1 class="page-header">ADMIN REMINDER DETAIL</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="POST" action="Downloads.php">
                            <table width="100%" class="table    " id="dataTables-example">
                                <thead class="thead-dark text-center">
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                                    <tr>

                                        <th scope="col">Volume No</th>
                                        <th scope="col">Message From admin</th>
                                        <th>STREAM </th>
                                        <th>DATE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody> <?php
                                        if (isset($data['notic'])) {
                                            foreach ($data['notic'] as $notics) : ?>
                                            <tr>
                                                <td> <?php echo $notics->volume; ?> </td>
                                                <td> <?php echo $notics->notic; ?> </td>
                                                <td> <?php echo $notics->stream; ?> </td>
                                                <td><?php echo $notics->dates; ?></td>
                                                <td><?php $v = $notics->statu;
                                                    echo ($v == 1) ? "<span class='label label-success'>accept</span>" : " <span class = 'label label-warning'>pending</span>"; ?> </td>
                                            </tr>
                                    <?php endforeach;
                                        } else
                                            echo "Query failed";
                                    ?>
                                </tbody>
                            </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <?php require APPROOT . '/views/inc/panelFooter.php'; ?>