<?php
    // Object Oriented
    $mysqli = new mysqli('localhost', 'username', 'password', 'studentsdb');

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Connect failed " . $mysqli->connect_error;

        exit();
    }

    $query = "SELECT name, author_name, price FROM books ORDER BY id LIMIT 10";

    $result = $mysqli->query($query);

    // Fetch result as numeric array
    $row = $result->fetch_array(MYSQLI_NUM);

    echo $row[0] . " " . $row[1] . " " . $row[2] . "<br>";

    // Fetch result as associative array
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo $row['name'] . " " . $row['author_name'] . " " . $row['price'] . "<br>";

    // Fetch result as both array
    $row = $result->fetch_array(MYSQLI_BOTH);

    echo $row[0] . " " . $row['author_name'] . " " . $row[2] . "<br>";

    //  Free result set
    $result->free();

    // Close connection
    $mysqli->close();

?>
