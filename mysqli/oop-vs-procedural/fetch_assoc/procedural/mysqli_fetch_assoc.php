<?php
    include_once 'connection.php';
    // Procedural
    $dblink = mysqli_connect('localhost', 'username', 'password', 'dbstudents');

    // If connection fails throw an error
    if (mysqli_connect_errno()) {
        echo "Could not connect to database: Error: " . mysqli_connect_error();

        exit();
    }

    $sql_query = "SELECT id, name, class, roll_no FROM students ORDER BY id DESC LIMIT 50";

    if ($result = mysqli_query($dblink, $sql_query)) {

        // Fetch associative array
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['name'] . " " . $row['class'] . $row['roll_no'] . '<br>';
        }

        // Free result set
        mysqli_free_result($result);
    }

    // Close Connection
    mysqli_close($dblink);
?>
