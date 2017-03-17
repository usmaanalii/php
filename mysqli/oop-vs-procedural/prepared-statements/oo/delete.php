<?php
    // Object Oriented
    $mysqli = new mysqli('localhost', 'username', 'password', 'studentsdb');

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Connect failed " . $mysqli->connect_error;

        exit();
    }

    $sql = 'DELETE FROM tbl_products WHERE id = ?';

    $id = 2;

    // Prepare a statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "SQL error: " . $conn->error;
    }

    // Bind params
    $stmt->bind_param('i', $id);

    // Execute
    $stmt->execute();

    $stmt->close();

?>
