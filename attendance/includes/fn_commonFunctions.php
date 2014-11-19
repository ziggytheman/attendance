<?php

function createNameDropDown($dbSelected) {
//create condition value dropdown values
    $tSQLselect = "SELECT ";
    $tSQLselect .= "emp_name ";
    $tSQLselect .= "FROM ";
    $tSQLselect .= "att_employee ";
    $tSQLselect .= "order by emp_name ";


    $tSQLselect_Query = mysqli_query($dbSelected, $tSQLselect);

    $empDropDown = "";
    $empDropDown .= " <option value=\"\"> </option>\n";
    while ($row = mysqli_fetch_assoc($tSQLselect_Query)) {

        foreach ($row as $idx => $r) {
            $empDropDown .= "  <option value=\"$r\"></option>\n";
        }
    }
    mysqli_free_result($tSQLselect_Query);

    return $empDropDown;
}

function insertDetail($dbSelected, $name) {
    $tSQLselect = "SELECT ";
    $tSQLselect .= "emp_id ";
    $tSQLselect .= "FROM ";
    $tSQLselect .= "att_employee ";
    $tSQLselect .= "where emp_name  = '" .$name ."'";

    $tSQLselect_Query = mysqli_query($dbSelected, $tSQLselect);

    if ($row = mysqli_fetch_assoc($tSQLselect_Query)) {
        $empId = $row["emp_id"];
    } else {
        return false;
    }
    
    $sql_insert = "";
    $attendanceDate = date('Y-m-d');
    $attendanceTime = date("H:i:s");

    $sql_insert = "INSERT INTO att_details (";
    $sql_insert .= "details_emp_id, ";
    $sql_insert .= "details_date, ";
    $sql_insert .= "details_time, ";
    $sql_insert .= "details_name ";
    $sql_insert .= ") ";
    $sql_insert .= "VALUES (";
    $sql_insert .= "'" . $empId . "', ";
    $sql_insert .= "'" . $attendanceDate . "', ";
    $sql_insert .= "'" . $attendanceTime . "', ";
    $sql_insert .= "'" . $name . "' ";
    $sql_insert .= ") ";

    if (mysqli_query($dbSelected, $sql_insert)) {
        return true;
    } else {
        return false;
    }
}
