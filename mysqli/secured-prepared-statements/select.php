<?php
    // Select

    // get_result()
    $stmt = $con->prepare("SELECT * FROM myTable WHERE name = ?");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();

    $result = $stmt->get_result();

    $numRows = $result->num_rows;

    if ($numRows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id[] = $row['id'];
            $name[] = $row['name'];
            $age[] = $row['age'];
        }
    }

    $stmt->close();

    // bind_result()
    $stmt = $con->prepare("SELECT id, name FROM myTable WHERE name = ?");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();

    $stmt->store_result();

    $numRows = $stmt->num_rows;

    $stmt->bind_result($idRow, $nameRow, $ageRow);

    if ($numRows > 0) {
        while ($stmt->fetch()) {
            $id[] = $idRow;
            $name[] = $nameRow;
            $age[] = $ageRow;
        }
    }

    $stmt->close();

    // Selecting Single Row

    // bind_result()
    $stmt = $con->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();

    $stmt->bind_result($id, $name, $age);
    $stmt->fetch();
    $stmt->close();

    // get_result()
    $stmt = $con->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
    $stmt->bind_param("s", $_POST['name']);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // $row['id']...
    $stmt->close();

?>
