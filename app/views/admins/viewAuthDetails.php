<?php include("nav.php"); ?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Author Details</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/home">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>admins/viewAuthor">view author</a></li>
            <li class="breadcrumb-item active">Author Details</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <label for="2" class="text-right"> Search :</label>
                <input type="text" id="2" class="search form-control col-sm-6" placeholder="What you looking for?">
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i> Author's paper uploads</div>
            <div class="card-body">
                <div class="table-responsive">
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
                                        <td> <a href="<?php echo URLROOT . 'admins/paperStatus&aid=' . $data['aid']; ?>"><?php echo $paper->title; ?> </a></td>
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
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('footer.php'); ?>