<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">

    <div class="col-md-12 wow animated fadeInLeft pt-1 text-center bg-light" data-wow-delay=".2s">
        <h1 class="section-title">International Journal Of Education</h1>
        <strong class="h4 ml-4 pb-1"> October 2013, Volume 1
        </strong>
    </div>
    <div class="container">
        <div class="searchh mt-1 col-md-12">
            <span><input type="text" class="search form-control mr-0" placeholder="What you looking for?"></span>
        </div>
        <table id="userTbl" class="table table-hover">
            <thead>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <div class="row">
                    <span class="col-md-12"> <a href="uploads/Vol1/PDF/TitlePage.pdf">Title Page</a></span>
                    <span class="col-md-12"> <a href="./Vol1/PDF/TOC.pdf">Table of Contents</a></span>
                </div>
            </thead>
            <tbody>
                <?php
                if (($data['iss'])) {

                    foreach ($data['iss'] as $d) {
                        $q = 1; ?>
                        <tr>

                            <td>
                                <div class="shadow p-3 mb-1 bg-white rounded">
                                    <?php echo $q . "."; ?>
                                    <a href="<?php echo $d->PAPER_PATH; ?>">
                                        <?php echo $d->TITLE; ?>
                                    </a>

                                </div>

                            </td>

                        </tr>
                <?php $q++;
                    }
                } else {
                    echo '<tr>
                            <td> No data avialable</td></tr>';
                }
                ?></tbody>
        </table>
    </div>
</div>

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
<?php require APPROOT . '/views/inc/footer.php'; ?>