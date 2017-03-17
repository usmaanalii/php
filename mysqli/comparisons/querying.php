<?php

    // Select
    $sql = <<<SQL
        SELECT *
        FROM `users`
        WHERE `live` = 1
SQL;

    if (!$result = $connection->query($sql)) {
        die('There was an error running the query [' . $connection->error . ']');
    }

    // Output query results
    while ($row = $result->fetch_assoc()) {
        echo $row['username'] . '<br>';
    }

    // Advisable to free result when finished playing with result set
    $result->free();

    // Number of returned rows
    echo "Total results: " . $results->num_rows;

    // Number of affected rows
    echo "Total rows updated: " . $connection->affected_rows;


    // Select #2
    $sql = 'SELECT col1, col2, col3 FROM table1 WHERE condition';

    $result = $connection->query($sql);

    if ($result === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
        $rows_returned = $result->num_rows;
    }
?>

<?php
    // Select
    $query = "SELECT name, class, roll_no FROM students ORDER BY id DESC LIMIT 50";

    if ($result = $connection->query($query)) {

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            echo $row['name'] . " " . $row['class'] . " " . $row['roll_no'] . '<br>';
        }

        // Free result set
        $result->free();
    }

    // Close connection
    $connection->close();

?>

<?php
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
?>

<?php
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

<?php
    // Sql
    mysql_connect("localhost", "username", "password") or die(mysql_error());
    mysql_select_db("tutorial1") or die("Cannot connect to database");

    $query = mysql_query("SELECT * FROM list WHERE public = 'yes'");

    while ($row = mysql_fetch_array($query)) {

        Print "<tr>";
            Print '<td align="center">' . $row['id'] . "</td>";
            Print '<td align="center">' . $row['details'] . "</td>";
            Print '<td align="center">' . $row['date_posted'] . " - " . $row['time_posted'] .  "</td>";
            Print '<td align="center">' . $row['date_edited'] . " - " . $row['time_edited'] .  "</td>";
        Print "</tr>";
    }
?>
