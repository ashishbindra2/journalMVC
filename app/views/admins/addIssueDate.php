<?php include("nav.php"); ?>
<script type="text/javascript" src="https://formden.com/static/cdn/formden.js"></script>

<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
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
<main>
  <div class="container-fluid">
    <h1 class="mt-4">Add Issue Date</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
      <li class="breadcrumb-item active">Add Issue Date</li>
    </ol>
    <div class="card mb-4 col-md-6s">
      <div class="card-header">Add Issue Date</div>
      <div class="card-body">
        <div class="table-responsive ">
          <form role="form" method="POST">
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
      </div>
    </div>
  </div>
</main>
<?php require('footer.php'); ?>