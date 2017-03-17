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
