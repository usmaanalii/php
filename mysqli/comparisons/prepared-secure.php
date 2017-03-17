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
    $stmt = $con->prepare("SELECT id, name, age FROM myTable WHERE name = ?");
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

<?php
    // Insert, Update and Delete

    // Insert
    $stmt = $con->prepare("INSERT INTO myTable (name, age) VALUES (?, ?)");
    $stmt->bind_param("si",  $_POST['name'], $_POST['age']);
    $stmt->execute();
    $stmt->close();

    // Update
    $stmt = $con->prepare("UPDATE myTable SET name = ? WHERE id = ?");
    $stmt->bind_param("si",  $_POST['name'], $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

    // Delete
    $stmt = $con->prepare("DELETE FROM myTable WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['id']);
    $stmt->execute();
    $stmt->close();

?>

<?php
    // normal MySQL call
    $name = $_POST['name'];
    $conn->query("SELECT * FROM myTbale WHERE name = '$name'");

    // example
    $stmt = $mysqli->prepare("SELECT * FROM myTable WHERE name = ? AND age = ?");

    $stmt->bind_param("si", $_POST['name'], $_POST['age']);

    $stmt->execute();

    // fetch results
    $stmt->close();

    // Like
    $search = "%{$_POST['search']}%";
    $stmt = $db->prepare("SELECT id, name, age FROM myTable WHERE Name LIKE ?");
    $stmt->bind_param("s", $search);

    // Error Handling
    if (!($stmt = $mysqli->prepare("SELECT * FROM myTable WHERE name = ?"))) {
        echo "Prepare Error: (" . $mysqli->errno . ')' . $mysqli->error;
    }

    if (!($stmt->bind_param("s", $_POST['name']))) {
        echo "Binding Parameter Error: (" . $mysqli->errno . ')' . $mysqli->error;
    }

    if (!($stmt->execute())) {
        echo "Execute Error: (" . $mysqli->errno . ')' . $mysqli->error;
    }

    if (!($result = $stmt->get_result())) {
        echo "Getting Result Error: (" . $mysqli->errno . ')' . $mysqli->error;
    }

    // Status of updated row
    $stmt = $conn->prepare("UPDATE myTABLE SET name = ?");
    $stmt->bind_param("si", $_POST['name'], $_POST['age']);
    $stmt->execute();

    if ($stmt->affected_rows == 0) {
        echo "No rows updated";
    }

    $stmt->close();
?>
