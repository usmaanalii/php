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
