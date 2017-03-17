<?php
    // Procedural
    $link = mysqli_connect('localhost', 'username', 'password', 'dubstudents');

    // If connection fails throw an error
    if (mysqli_connect_errno()) {
        echo "Could not connect to database: Error: " . mysqli_connect_error();

        exit();
    }


    $query = "SELECT name, author_name, price FROM students ORDER BY id LIMIT 5";

    $result = mysqli_query($link, $query);

    // Numeric array
    $row = mysqli_fetch_array($result, MYSQLI_NUM);

    echo $row[0] . " " . $row[1] . " " . $row[2];

    // Associative array
    $row = mysqli_fetch_assoc($result, MYSQLI_ASSOC);

    echo $row['name'] . " " . $row['author_name'] . " " . $row['price'];

    // Associative and numeric array
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);

    echo $row[0] . " " . $row['author_name'] . " " . $row[2];

    // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($link);

?>
