10.2 - Connecting to a MySQL server with mysqli
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }
?>

10.3 - Querying a database with mysqli
<?php
    $query = "SELECT * FROM classics";
    $result = $conn->query($query);

    if (!$result) {
        die($conn->error);
    }
?>


10.7 - Creating a table called cats
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "CREATE TABLE cats (
        id SMALLINT NOT NULL AUTO_INCREMENT,
        family VARCHAR(32) NOT NULL,
        name VARCHAR(32) NOT NULL,
        age TINYINT NOT NULL,
        PRIMARY KEY (id)
    )";

    $result = $conn->query($query);

    if (!$result) {
        die("Database access failed: " . $conn->error);
    }
?>

10.8 - Describing the table cats
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "DESCRIBE cats";

    $result = $conn->query($query);

    if (!$result) {
        die("Database access failed: " . $conn->error);
    }

    echo "<table>
            <tr>
                <th>Column</th>
                <th>Type</th>
                <th>Null</th>
                <th>Key</th>
            </tr>";

    for ($j = 0; $j < $rows; ++$j) {

        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_NUM);

        echo "<tr>";

        for ($k = 0; $k < 4; ++$k) {
            echo "</tr>";
        }
    }

    echo "</table>";

?>

10.9 - Dropping the table cats
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "DROP TABLE cats";

    $result = $conn->query($query);

    if (!$result) {
        die("Database access failed: " . $conn->error);
    }
?>

10.10 - Adding data to table cats
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "INSERT INTO cats VALUES(NULL, 'Lion', 'Leo', 4)";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }
?>

10.11 - Retrieving rows from the cats table
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "SELECT * FROM cats";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }

    $rows = $result->num_rows;

    echo "<table>
            <tr>
                <th>Id</th>
                <th>Family</th>
                <th>Name</th>
                <th>Age</th>
            </tr>";

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);

        $row = $result->fetch_array(MYSQLI_NUM);

        echo "<tr>";

        for ($k = 0; $k < 4; ++$k) {
            echo "<td>$row[$k]</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
?>
