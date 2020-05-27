<?php include("includes/nav.php"); ?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">ADD ISSUE DATE</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-6">
              <form role="form" method="POST">
                <script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

                <!-- Special version of Bootstrap that is isolated to content wrapped in .bootstrap-iso -->
                <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

                <!--Font Awesome (added because you use icons in your prepend/append)-->
                <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

                <!-- Inline CSS based on choices in "Settings" tab -->
                <style>
                  .bootstrap-iso .formden_header h2,
                  .bootstrap-iso .formden_header p,
                  .bootstrap-iso form {
                    font-family: Arial, Helvetica, sans-serif;
                    color: black
                  }

                  .bootstrap-iso form button,
                  .bootstrap-iso form button:hover {
                    color: white !important;
                  }

                  .asteriskField {
                    color: red;
                  }
                </style>

                <!-- HTML Form (wrapped in a .bootstrap-iso div) -->
                <div class="bootstrap-iso">
                  <div class="container-fluid">

                    <div class="form-group ">
                      <label for="date">
                        Date Of Next Issue</label> <span class="error">* <?php echo $data['date_err']; ?></span>
                    </div>
                    <div class="form-group ">
                      <label>From</label>
                      <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="date" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label>To</label>
                      <div class="input-group">
                        <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                        <input class="form-control" id="date2" name="date2" placeholder="MM/DD/YYYY" type="date" required="" />
                      </div>
                    </div>
                  </div>
                </div>

                <div style="margin-left: 18px;"><button type="submit" class="btn btn-default" name="submit">Submit</button></div>
              </form>
            </div>


            <!-- Extra JavaScript/CSS added manually in "Settings" tab -->
            <!-- Include jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!-- Include Date Range Picker -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

            <script>
              $(document).ready(function() {
                var date_input = $('input[name="date"]'); //our date input has the name "date"
                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                  format: 'mm/dd/yyyy',
                  container: container,
                  todayHighlight: true,
                  autoclose: true,
                })
              })
            </script>
            <script>
              $(document).ready(function() {
                var date_input = $('input[name="date2"]'); //our date input has the name "date"
                var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                date_input.datepicker({
                  format: 'mm/dd/yyyy',
                  container: container,
                  todayHighlight: true,
                  autoclose: true,
                })
              })
            </script>

          </div>
          <!-- /.col-lg-6 (nested) -->

          <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
      </div>
      <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>