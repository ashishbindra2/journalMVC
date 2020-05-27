<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="main">

  <div class="row bg-light">
    <div class="col-sm-12 text-center">
      <h1 class="display-4">
        Past Issues Published
      </h1>
    </div>
  </div>
  <div class="container">
    <div class="searchh  mb-1 col-md-8">
      <div class="row">
        <div class=" col-md-8 mt-1">
          <input type="text" class="search form-control" placeholder="What you looking for?">
        </div>
        <div class=" col-md-4 mt-1">
          <input id="myButton" class="btn btn-primary" value="Advance Search">
        </div>
      </div>
    </div>

    <table id="userTbl" class="table">
      <thead>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <tr>
          <th scope="col">Volume Number & Date</th>
        </tr>
      </thead>
      <tbody>

        <?php if (!empty($data['posts'])) :
          foreach ($data['posts'] as $issues) : ?>
            <tr>
              <td>
                <a class='text-decoration-none' href="<?php echo URLROOT . 'pages/IssueDescription&IID=' . $issues->J_ISSUES_ID . '&id=' . $data['journalId']->JOURNAL_ID; ?>">
                  Volume - <?php echo $issues->VOLUME_NO; ?>
                </a>
                <a href=" <?php echo URLROOT . 'pages/IssueDescription&IID=' . $issues->J_ISSUES_ID . '&id=' .  $data['journalId']->JOURNAL_ID; ?>">
                  <?php echo $issues->ISSUE_MONTH . " " . $issues->ISSUE_YEAR; ?>
                </a>
              </td>
            </tr>
        <?php endforeach;
        else :
          echo "<td>NO Data avialable!!</td>";
        endif;
        ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  document.getElementById("myButton").onclick = function() {
    location.href = "<?php echo URLROOT . 'pages/adSerach&id=' . $data["journalId"]->JOURNAL_ID; ?>";
  };
</script>
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