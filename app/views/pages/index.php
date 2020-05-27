<?php require APPROOT . '/views/inc/top-header.php'; ?>
<div id="main" class="pb-3">
  <div class="jumbotron-flud text-center">
    <div class="container mb-2">
      <h1 class="display-4"><?php echo $data['title']; ?></h1>
      <hr>
      <p class="lead"><?php echo $data['description']; ?></p>
    </div>
  </div>
  <div id='home_content'>
    <div class='col-sm-10 mb-2'>
      <div class='navy'>
        <h3> Journals</h3>
      </div>
      <?php if (isset($data['page'])) {
        foreach ($data['page'] as $page) : ?>
          <div class='grey'>
            <a href="<?php echo URLROOT; ?>pages/home&id=<?php echo $page->JOURNAL_ID; ?>">
              <?php echo $page->JOURNAL_NAME; ?>
            </a>
          </div>
      <?php endforeach;
      } else {
        echo "No journal is avalable!!!";
      } ?>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>