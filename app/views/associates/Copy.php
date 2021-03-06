<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "punjabiuni1";
$datatable = "paperstatus&pos";

function highlight_word($content, $word)
{
    $replace = '<span style="background-color: #FF0;">' . $word . '</span>'; // create replacement
    $content = str_replace($word, $replace, $content); // replace content
    return $content; // return highlighted data
}
?>
<form action="Copy.php" method="get">
    Search: <input type="text" name="findme" value="<?php echo $_GET["findme"]; ?>" /><input type="submit" value="Search" />
    <input name="show" type="radio" value="1" <?php if ($_GET["show"] == '1' or !isset($_GET["show"])) echo ' checked="checked"'; ?> />Show all news
    <input name="show" type="radio" value="2" <?php if ($_GET["show"] == '2') echo ' checked="checked"'; ?> />Show news that match search criteria
</form>
<?php
// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_GET["show"] == '2') {
    $sql = "SELECT * FROM " . $datatable . " WHERE content LIKE '%" . $conn->real_escape_string($_GET["findme"]) . "%'";
} else {
    $sql = "SELECT * FROM " . $datatable;
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if ($_GET["findme"] <> '') {
            echo highlight_word($row["content"], $_GET["findme"]);
        } else {
            echo $row["content"];
        }
        echo "<hr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<?php include("includes/nav.php"); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Notic for reviewer </h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Assign paper
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST">
                                <div class="form-group">
                                    <label>select a journal</label>
                                    <select class="form-control" name="jid" id="jid">
                                        <option value="">Please select a journal</option>
                                        <?php
                                        if (isset($data['journal'])) {
                                            foreach ($data['journal'] as $key) {
                                                echo '<option value="' . $key->JOURNAL_ID . '">' . $key->JOURNAL_NAME . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">journal not available</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>volume No</label>
                                    <select class="form-control" name="idd" id="id">
                                        <option value="1">Please select a volume no</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label>Select Reviewer</label>
                                    <select class="form-control" name="rid" id="rid">
                                        <option value="">Please select a Reviewer</option>
                                        <?php
                                        foreach ($data['reviwer'] as $stream_set) { ?>
                                            <option value="<?php echo $stream_set->REVIEWER_ID; ?>"> <?php echo $stream_set->FNAME; ?> </option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>select file</label>
                                    <span class="error">* <?php echo $data['file']; ?> </span>
                                    <input type="file" id="file" name="file">
                                </div>
                                <div class="form-group">
                                    <label>write notice</label><br>
                                    <textarea class="form-control" rows="3" id="notic" name="notic"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>select last date to submit the report:-</label>
                                    <input type="date" class="form-control" id="date" name="date" />
                                </div>

                                <button type="submit" class="btn btn-default" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default" name="reset">Reset</button>
                            </form>
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

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#jid').on('change', function() {
            var JOURNALID = $(this).val();
            if (JOURNALID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo URLROOT . "associates/ajaxData" ?>',
                    data: 'JOURNAL_ID=' + JOURNALID,
                    success: function(html) {
                        $('#id').html(html);
                    }
                });
            } else {
                $('#id').html('<option value="">Select journal first</option>');
            }
        });
    });
</script>
<?php require APPROOT . '/views/inc/panelFooter.php'; ?>