<?php
    // Object Oriented
    $mysqli = new mysqli('localhost', 'username', 'password', 'studentsdb');

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Connect failed " . $mysqli->connect_error;

        exit();
    }

    $query = "SELECT name, class, roll_no FROM students ORDER BY id DESC LIMIT 50";

    if ($result = $mysqli->query($query)) {

        // Fetch associative array
        while ($row = $result->fetch_assoc()) {
            echo $row['name'] . " " . $row['class'] . " " . $row['roll_no'] . '<br>';
        }

        // Free result set
        $result->free();
    }

    // Close connection
    $mysqli->close();
?>
