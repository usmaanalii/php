<?php

    // Define connection parameters
    $DBServer = 'localhost';
    $DBUser = 'username';
    $DBPass = 'password';
    $DBName = 'demo';

    // Connection using OO
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }
    // procedural
    $conn = mysqli_connect($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if (mysqli_connect_errno()) {
        trigger_error('Database connection failed: ' . mysqli_connect_error(), E_USER_ERROR);
    }

    // Select
    $sql = 'SELECT col1, col2, col3 FROM table1 WHERE condition';

    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $rows_returned = $result->num_rows;
    }

    // Iterate over recordset

    // using column names
    $result->date_seek(0);
    while ($row = $result->fetch_assoc()) {
        echo $row['col1'] . '<br>';
    }

    // using indexes
    $result->date_seek(0);
    while ($row = $result->fetch_row()) {
        echo $row['col1'] . '<br>';
    }

    // store all values to array
    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $arr = $result->fetch_all(MYSQLI_ASSOC);
    }
    foreach ($arr as $row) {
        echo $row['col1'];
    }

    // store row values to array
    $result = $conn->query($sql);

    if ($result === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $result->data_seek(0);
        $arr = $result->fetch_array(MYSQLI_ASSOC);
    }

    // Record Count
    $rows_returned = $result->num_rows;

    // Move inside recordset
    $result->data_seek(10);

    // Free Memory
    $result->free();


    // Insert

    $v1 = "'" . $conn->real_escape_string('col1_value') . "'";

    $sql = "INSERT INTO tbl (col1_varchar, col2_number) VALUES ($v1, 10)";

    if ($conn->query($sql) === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $last_inserted_id = $conn->insert_id;
        $affected_rows = $conn->affected_rows;
    }

    // Update

    $v1 = "'" . $conn->real_escape_string('col1_value') . "'";

    $sql = "UPDATE tbl SET col1_varchar=$v1, col2_number=1 WHERE id>  10";

    if ($conn->query($sql) === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $affected_rows = $conn->affected_rows;
    }

    // Delete
    $sql = "DELETE FROM tbl WHERE id > 10";

    if ($conn->query($sql) === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $affected_rows = $conn->affected_rows;
    }

?>
