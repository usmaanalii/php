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

    $rows = $result->num_rows;

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
            echo "<td>$row[$k]</td>";
        }

        echo "</tr>";
    }

    echo "</table>";

?>
