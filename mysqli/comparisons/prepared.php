<?php

    // Insert

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

<?php

    // Update

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

<?php

    // Delete

    // Object Oriented
    $mysqli = new mysqli('localhost', 'username', 'password', 'studentsdb');

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Connect failed " . $mysqli->connect_error;

        exit();
    }

    $sql = 'DELETE FROM tbl_products WHERE id = ?';

    $id = 2;

    // Prepare a statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "SQL error: " . $conn->error;
    }

    // Bind params
    $stmt->bind_param('i', $id);

    // Execute
    $stmt->execute();

    $stmt->close();

?>

<?php
    // Prepared statements

    // Select queries
    $sql = 'SELECT lastname, email FROM customers WHERE id > ? AND firstname = ?';
    $id_greater_than = 5;
    $firstname = 'John';

    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

    // Bind parameters. Types: s = string, i = integer, d = double, b = blob
    $stmt = bind_params('is', $id_greater_than, $firstname);

    // Execute
    $stmt->execute();

    // Iterate over results
    $stmt->bind_result($lastname, $email);
    while ($stmt->fetch()) {
        echo $lastname . ', ' . $email . '<br>';
    }

    // Store all values to array
    $result = $stmt->get_result();
    $array = $result->fetch_all(MYSQLI_ASSOC);

    // Close statement
    $stmt->close();

    // Insert queries
    $sql = 'INSERT INTO customers (firstname, lastname) VALUES (?, ?)';
    $fistname = 'John';
    $lastname = 'Doe';

    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

    // Bind params
    $stmt->bind_params('ss', $firstname, $lastname);

    // Execute statement
    $stmt->execute();

    echo $stmt->insert_id;
    echo $stmt->affected_rows;

    $stmt->close();

    // Update queries
    $sql = 'UPDATE customers SET firstname = ?, lastname = ? WHERE id > ?';
    $fistname = 'John';
    $lastname = 'Doe';
    $id_greater_than = 5;

    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

    // Bind params
    $stmt->bind_params('ssi', $firstname, $lastname, $id_greater_than);

    // Execute statement
    $stmt->execute();

    echo $stmt->affected_rows;

    $stmt->close();

    // Delete queries
    $sql = 'DELETE FROM customers WHERE id > ?';
    $id_greater_than = 5;

    // Prepare statement
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    }

    // Bind params
    $stmt->bind_params('i', $id_greater_than);

    // Execute statement
    $stmt->execute();

    echo $stmt->affected_rows;

    $stmt->close();

    // Disconnect

    $conn->close();

?>
