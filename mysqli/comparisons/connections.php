<?php
    $dbhost = 'localhost'; // Unlikely to change
    $dbname = 'robinsnest';
    $dbuser = 'username';
    $dbpass = 'password';

    $appname = "Robin's Nest";

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($connection->connect_error) {
        die($connection->connect_error);
    }

    if ($connection->connect_errno > 0) {
        die('Unable to connect to database [' . $connection->connect_error . ']');
    }

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

    // check connection
    if ($conn->connect_error) {
        trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }
?>
