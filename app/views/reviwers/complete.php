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
      <h1 class="page-header">List Of Paper Completed</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          List of complete submision
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <form role="form" method="POST">
            <table width="100%" class="table table-striped" id="dataTables-example">
              <thead>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                <tr>
                  <th>AUTHOE NAME</th>
                  <th>TITLE</th>
                  <th>STATUS</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $RID = $_SESSION['u'];
                $qr = "SELECT * FROM assignment
                                        JOIN paper_submission_detail ON paper_submission_detail.PAPER_SUB_ID=assignment.PAPER_SUB_ID
                                        JOIN author_details ON author_details.AUTH_ID=assignment.AUTH_ID
                                        JOIN paper_status_after_review ON paper_status_after_review.PAPER_SUB_ID =assignment.PAPER_SUB_ID
                                   WHERE REVIEWER_ID ='{$RID}'";
                $ess = mysqli_query($connection, $qr);

                while ($exe = mysqli_fetch_assoc($ess)) {
                  $v  = $exe["STATUS_ID"] . '<br/>';
                  $n = $exe['A_ACTIVE'];

                  if (($exe) && ($n != 0)) { ?>
                    <tr>
                      <td> <?php echo $exe["FNAME"]; ?> </td>
                      <td><?php //echo '<a href="paper_report.php?rid='.$rid.'&pid='.$exe['PAPER_SUB_ID'].'">';
                          echo $exe["TITLE"];
                          '</a>' ?></td>

                      <td>
                        <?php
                        switch ($n) {
                          case 0:
                            echo '<span class="label label-warning">panding</span>';
                            # code...
                            break;
                          case 1:
                            echo "<span class='label label-success'>accept</span>";
                            # code...
                            break;

                          default:
                            echo "<span class='label label-danger'>Reject</span>";

                            break;
                        }


                        ?>
                      </td>


                    </tr>
                <?php   } else
                    echo "Query failed; " . mysqli_connect_error();
                } ?>
              </tbody>
            </table>
            <!-- /.table-responsive -->
            <?php
            mysqli_close($connection); ?>

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


<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

</body>

</html>