<?php
    // Define connection parameters
    $DBServer = 'localhost';
    $DBUser = 'username';
    $DBPass = 'password';
    $DBName = 'demo';

    // Connection using OO
    $conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);

    // check connection
    if ($conn->connect_error) {
    trigger_error('Database connection failed: ' . $conn->connect_error, E_USER_ERROR);
    }

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
