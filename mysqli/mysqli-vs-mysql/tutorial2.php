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

    // Transactions
    try {
        // switch autocommit status to FALSE
        // it starts transactions
        $conn->autocommit(FALSE);

        $result = $conn->query($sql1);
        if ($result === false) {
            throw new Exception('Wrong SQL: ' . $sql . ' Error: ' . $conn->error);
        }

        $result = $conn->query($sql2);
        if ($result === false) {
            throw new Exception('Wrong SQL: ' . $sql . ' Error: ' . $conn->error);
        }

        $result = $conn->query($sql3);
        if ($result === false) {
            throw new Exception('Wrong SQL: ' . $sql . ' Error: ' . $conn->error);
        }

        $conn->commit();
        echo "Transaction completed successfully";
    } catch (Exception $e) {
        echo "Transaction failed: " . $e->getMessage();
        $conn->rollback();
    }

    // switch back autocommit status
    $conn->autocommit(TRUE);

?>
