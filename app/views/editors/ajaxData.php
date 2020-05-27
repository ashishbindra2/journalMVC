


<?php
if (isset($_POST["JOURNAL_ID"]) && !empty($_POST["JOURNAL_ID"])) {
    //Get all state data
    $query1 = $connection->query("SELECT * FROM j_issues WHERE JOURNAL_ID = " . $_POST['JOURNAL_ID']);
    //Count total number of rows
    $rowCount = $query1->num_rows;

    //Display states list
    if ($rowCount > 0) {
        echo '<option value="">Select issue</option>';
        while ($row = $query1->fetch_assoc()) {
            echo '<option value="' . $row['J_ISSUES_ID'] . '">' . $row['VOLUME_NO'] . '</option>';
        }
    } else {
        echo '<option value="">issue not available</option>';
    }
} else
    echo 'issue not available'


?>