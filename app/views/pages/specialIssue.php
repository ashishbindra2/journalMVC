<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">
  <div class="container">

    <h3 class="display-3 text-center">Special Issues</h3>
    <p class="lead"> To propose a special issue as guest editors, take a look at the
      <a href="<?php echo URLROOT . 'pages/specialIssuesGuid&id=' . $data['journalId']->JOURNAL_ID; ?>">Special Issue Guidelines</a>
    </p>
    <div class="box box-success">
      <h2 class="h2 mt-2">Special Issues Published</h2>

      <table class="table table-borderless table-hover ml-4">
        <?php foreach ($data['special'] as $key) : ?>
          <tr class="row">
            <td>
              <?php
              echo "<u><a href='1Dl7- Relational algebra.pdf'>" . $key->SPECIAL_ISSUE_NAME . " " . $key->ISSUE_YEAR . "</u></a>";
              ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <?php require APPROOT . '/views/inc/footer.php'; ?>