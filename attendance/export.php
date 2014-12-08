<?php

include('htconfig/dbConfig.php');
include('includes/dbaccess.php');
$output = "";

$table = "att_details";

//$sql = mysqli_query($dbSelected, "SELECT * FROM $table");
$sql = mysqli_query($dbSelected, "SELECT * FROM `att_details` order by `details_date`,`details_emp_id`,`details_time`");
$filename = "attendance_dump_" . date("Y-m-d H:i:s") . ".csv";

$indx = TRUE;

while ($row = mysqli_fetch_assoc($sql)) {
    if ($indx) {

        foreach ($row as $idx => $r) {
            $output .= '"' . strtoupper(str_replace("details_", "", $idx)) . '",';
        }
        $indx = FALSE;
        $output .= "\n";
    }
    foreach ($row as $idx => $r) {
        $output .='"' . $r . '",';
    }
    $output .= "\n";
}
header('Content-type: text/csv; charset=utf-8');
header("Cache-Control: no-cache");
header("Pragma: no-cache");
header('Content-Disposition: attachment; filename=' . $filename);
echo $output;
exit;
?> 