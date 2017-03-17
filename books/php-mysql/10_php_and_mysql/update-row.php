<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "UPDATE cats SET name = 'Charly' WHERE name = 'Charlie'";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }
