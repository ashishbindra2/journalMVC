<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo STYLE; ?>/index.css">
<div id="main">
  <div class="container">
    <div class="row row-offcanvas row-offcanvas-right mt-3">
      <div class="col-12 col-md-9">

        <div class="jumbotron-flud">
          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <!-- <div class="container"> -->
              <div class="featurette-heading text-uppercase h3">
                Research Cell :-><?php echo $data['journalId']->JOURNAL_NAME; ?>
                <hr>
              </div>
              <dt class="text-muted text-left">ISSN:<?php echo $data['journalId']->J_ISSN_P; ?> Print</dt>
              <dt class="text-muted Print">ISSN:<?php echo $data['journalId']->J_ISSN_E; ?> Online</dt>
              <p class="lead">
                <a href="http://ugc.ac.in/journallist/subjectwisejurnallist.aspx?tid=UmVzZWFyY2ggQ2VsbDogSW50ZXJuYXRpb25hbCBKb3VybmFsIG9mIEVuZ2luZWVyaW5nIFNjaWVuY2Vz&&did=Q3VycmVudCBUaXRsZXM=">
                  UGC Approved Journal(S.No. 63019)
                </a></p>
              <dt> Editor-in-Chief</dt>
              <dd><?php echo $data['Editor']->editorName; ?></dd>
              <?php echo $data['Editor']->editorDetail; ?>.
              <p class="text-left"><?php echo "<b>Research Papers being published for - " . $data['streamsJournal']->Stream . ",
                </b>"; ?></p>
              <font color="green font-weight-bold">Global Impact Factor (GIF) : 2.010</font>
              <!-- </div> -->
            </div>
            <div class="col-md-5 order-md-1">
              <img class="featurette-image img-fluid mx-auto" src="<?php echo IMG; ?>/reseach_cell-min.jpg" alt="Generic placeholder image" width="300px">
            </div>
          </div>
        </div>
        <div style="clear:both;">
          <div class="blue_bar mb-1">AIM OF THE JOURNAL</div>
          <div class="card card-body ">
            <div class="container">
              <p class="lead"> <?php echo $data['aim']; ?></p>
            </div>
          </div>

        </div>

        <div id="blueback" style="clear:both;">
          <div class="green_bar mt-2">Editor-in-Chief </div>
          <div class="card card-body mb-3">
            <div class="container">
              <dt> <?php echo "<b>" . $data['Editor']->editorName . ",</b>"; ?></dt>
              <dd> <?php echo $data['Editor']->editorDetail; ?>.</dd>
              <b>EMAIL :</b> <?php echo $data['Editor']->editorEmail; ?>
            </div>
          </div>
          <div class="green_bar">Associate Editors</div>
          <div class="card card-body mb-3">

            <?php
            if (isset($data['abstract'])) {
              foreach ($data['assciate'] as $assocate) : ?>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <?php echo $assocate->aseditorName; ?>,
                    <?php echo $assocate->aseditorCollege; ?>
                    <p class="card-text">
                      <b>EMAIL :</b>
                      <?php echo $assocate->aseditorEmail; ?>
                    </p>
                  </li>
                </ul>
            <?php endforeach;
            } else {
              echo "No Assocaite added yet";
            } ?>
          </div>
        </div>
      </div>
      <!--/span-->
      <div class="col-sm-6 col-md-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group text-decoration-none">
          <bb href="#" class="list-group-item active">NEWS/UPDATES
          </bb>
          <bb href="#" class="list-group-item"><?php echo empty($data['news']->NEWS) ?  'no news' :  $data['news']->NEWS; ?></bb>
        </div>
        <div class="list-group text-decoration-none mt-3">
          <div class="list-group-item active">Abstracting </div>
          <!-- <marquee direction="up" class="text-center"> -->
          <ul style=" list-style-type: none;" class="list-group-item text-center">
            <?php
            if (isset($data['abstract'])) :
              foreach ($data['abstract'] as $img) : ?>

                <li><a href="#"> <img src="<?php echo $img->LOGOS; ?>" alt="images" /></a></li>
            <?php endforeach;
            else :
              echo "No Abstract is in database";
            endif;
            ?></ul> <!-- </marquee> -->
        </div>
      </div>
      <!--/span-->
    </div>
    <!--/row-->
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>