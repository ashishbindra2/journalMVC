<?php
if (isset($_POST["REVIEWER_ID"]) && !empty($_POST["REVIEWER_ID"])) {

    //Display states list
    if (isset($data['issue'])) {
        echo '<option value="">Select Issue</option>';
        foreach ($data['issue'] as $row) {
            echo '<option value="' . $row->PID . '">' . $row->TITLES . '</option>';
        }
    } else {
        echo '<option value="">issue not available</option>';
    }
} else
    echo 'issue not available';
