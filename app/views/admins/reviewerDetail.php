<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Paper details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Paper details</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> Detail about author</div>
            <div class="card-body">
                <div class="table-responsive">

                    <form role="form" method="POST">
                        <table class="table table-striped" id="userTbl">
                            <thead script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
                                </script>
                                <tr>
                                    <th>JOURNALS</th>
                                    <th>VOLUME NO</th>
                                    <th>TITLE</th>
                                    <th>STATUS</th>
                                    <th>COMMENT to author</th>
                                    <th>COMMENT to as.editor</th>
                                    <th>DATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($data['view'])) {
                                    foreach ($data['view'] as $all) {  ?>

                                        <tr>
                                            <td><?php echo $all->jName; ?></td>
                                            <td><?php echo $all->vno; ?> </td>
                                            <td><?php echo $all->detail; ?> </td>
                                            <td> <?php
                                                    $v = $all->rstatus;
                                                    if ($v == 1) {
                                                        echo "<span class='label label-success'>accept</span>";
                                                    } elseif ($v == 2) {
                                                        echo "<span class='label label-danger'>Reject</span>";
                                                    } elseif ($v == 3) {
                                                        echo '<span class="label label-success">Accept with miner update</span>';
                                                    } elseif ($v == 0) {
                                                        echo '<span class="label label-warning">Reject with major update</span>';
                                                    } else {
                                                        echo " ";
                                                    }
                                                    ?>
                                            </td>
                                            <td> <?php echo $all->rAuthor; ?></td>
                                            <td> <?php echo $all->rAsEditor; ?> </td>
                                            <td> <?php echo $all->dates; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else
                                    echo "Query failed"; ?>
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>