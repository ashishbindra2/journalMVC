<?php include("includes/nav.php"); ?>
<style type="text/css">
  textarea {
    width: 99%;
    height: 0%;
  }
</style>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Incomplete Submissions</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          .
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <form role="form" method="POST">
            <table width="100%" class="table table-striped text-center" id="dataTables-example">
              <thead class="thead-dark text-center">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <tr>
                  <!-- <th>AUTHOE NAME</th> -->
                  <th scope="col" class="text-center">TITLE</th>
                  <th scope="col" class="text-center">STATUS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($data['paper'])) {
                  foreach ($data['paper'] as $papers) {
                    $v  = $papers->sids;
                    $n = $papers->active;
                    if (empty($paper->active)) { ?>
                      <tr>
                        <!-- <td> <?php echo $papers->name; ?> </td> -->
                        <td><?php echo '<a href="' . URLROOT . 'reviwers/paperDownload&pid=' . $papers->pid . '">';
                            echo $papers->title;
                            '</a>' ?></td>

                        <td>
                          <?php
                          switch ($n) {
                            case 0:
                              echo '<span class="label label-warning">panding</span>';
                              break;
                            case 1:
                              echo "<span class='label label-success'>accept</span>";
                              break;
                            default:
                              echo "<span class='label label-danger'>Reject</span>";
                          }
                          ?>
                        </td>
                      </tr>
                <?php   } else
                      echo 'errror' . '<br>';
                  }
                } else {
                  echo 'query fails';
                } ?>
              </tbody>
            </table>
          </form>
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->

  <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->

<?php require APPROOT . '/views/inc/panelFooter.php'; ?>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->