<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Paper Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.html">view author</a></li>
            <li class="breadcrumb-item"><a href="index.html">Author Details</a></li>
            <li class="breadcrumb-item active">Paper Details</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> Author's paper Details</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table width="100%" class="table table-striped" id="userTbl">
                        <thead>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <tr>
                                <th>TITLE</th>
                                <th>VOLUME NO</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($data['authorsPaper'])) {
                                foreach ($data['authorsPaper'] as $paper) {
                            ?>
                                    <tr>
                                        <td> <?php echo $paper->pTitle;  ?> </td>
                                        <td> <?php echo $paper->iVolume;  ?> </td>
                                        <td> <?php
                                                $v = $paper->prs;

                                                if ($v == 1) {
                                                    echo "<span class='label label-success'>accept</span>";
                                                } elseif ($v == 2) {
                                                    echo "<span class='label label-danger'>Reject</span>";
                                                } elseif ($v == 3) {
                                                    echo '<span class="label label-success">Success Label</span>';
                                                } elseif ($v == 0) {
                                                    echo '<span class="label label-warning">Warning Label</span>';
                                                } else {
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
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>