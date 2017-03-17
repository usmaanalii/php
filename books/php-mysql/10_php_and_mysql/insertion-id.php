<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }

    echo "The insert ID was: " . $result->insert_id; // not working

?>
