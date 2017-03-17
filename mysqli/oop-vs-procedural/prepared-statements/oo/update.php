<?php
    // Object Oriented
    $mysqli = new mysqli('localhost', 'username', 'password', 'studentsdb');

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Connect failed " . $mysqli->connect_error;

        exit();
    }

    $product = 'Samsung Galaxy S7 Edge';

    $price = '$1000';

    $category = 'Mobile Phones';

    $id = 1;

    // Prepare statement
    $stmt = $conn->prepare("UPDATE tbl_products set product_name = ?, price = ?, category = ? WHERE id = ?");

    if (!$stmt) {
        trigger_error('Error: ' . $conn->error, E_USER_ERROR);
    }

    // Bind parameters
    $stmt->bind_params('sssi', $product, $price, $category, $id);

    // Execute statement
    $stmt->execute();

    echo $stmt->insert_id;

    $stmt->close();



?>
