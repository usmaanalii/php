<?php
    // Object Oriented
    $mysqli = new mysqli('localhost', 'username', 'password', 'studentsdb');

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Connect failed " . $mysqli->connect_error;

        exit();
    }

    $product = 'EOS 7D Mark II Canon';

    $price = '$800';

    $category = 'Cameras';

    $sql = "INSERT INTO tbl_products (product_name, price, category) VALUES (?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error: " . $conn->error;
    }

    // Bind parameters
    $stmt->bind_params('sss', $product, $price, $category);

    // Execute statement
    $stmt->execute();

    echo $stmt->insert_id;

    $stmt->close();



?>
