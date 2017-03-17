<?php
    // Object Oriented
    $host = 'localhost';

    $user = 'username';

    $password = 'password';

    $database = 'dbusers';

    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
?>
