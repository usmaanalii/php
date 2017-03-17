<?php
    // Connecting
    $db = new mysqli('localhost', 'username', 'password', 'demo');

    if ($db->connect_errno > 0) {
        die('Unable to connect to database [' . $db->connect_error . ']');
    }

    // Querying
    $sql = <<<SQL
        SELECT *
        FROM `users`
        WHERE `live` = 1
SQL;

    if (!$result = $db->query($sql)) {
        die('There was an error running the query [' . $db->error . ']');
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
    echo "Total rows updated: " . $db->affected_rows;

    // Escaping characters
    $db->escape_string('This is an unescaped "string"');

    // Close
    $db->close();

    // Define a statement
    $statement = $db->prepare("SELECT name FROM users WHERE username = ?");

    // Bind parameters
    $name = 'Bob';
    $statement->bind_param('s', $name);

    // multiple
    $statement->bind_param('sdi', $name, $height, $age);

    // Execute
    $statment->execute();
?>
