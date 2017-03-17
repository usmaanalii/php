10.12 - Renaming Charlie the Cheetah to Charly
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "UPDATE cats SET name = 'Charly' WHERE name = 'Charlie'";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }
?>

10.13 - Removing Growler the cougar from the cats table
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "DELETE FROM cats WHERE name = 'Growler'";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }
?>

10.14 - Adding data to table and reporting the insertion id
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "INSERT INTO cats VALUES(NULL, 'Lynx', 'Stumpy', 5)";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }

    echo "The insert ID was: " . $result->insert_id;
?>

10.15 - Performing a secondary query
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $query = "SELECT * FROM customers";

    $result = $conn->query($query);
    if (!$result) {
        die("Database access failed: " . $conn->error);
    }

    $rows = $result->num_rows;

    for ($j = 0; $j < rows; ++$j) {
        $result->data_seek($j);

        $row = $result->fetch_array(MYSQLI_NUM);
        echo "$row[0] purchased ISBN $row[1]:<br>";

        $subquery = "SELECT * FROM classics WHERE isbn = '$row[1]'";

        $subresult = $conn->query($query);

        if (!$subresult) {
            die("Database access failed: " . $conn->error);
        }

        $subrow = $subresult->fetch_array(MYSQLI_NUM);
        echo "'$subrow[1]' by $subrow[0]<br>";
    }
?>

10.16 - How to properly sanitize user input for MySQL
<?php
    //function mysql_fix_string($conn, $string)
    {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }
        return $conn->real_escape_string($string);
    }
?>

10.17 - How to safely access MySQL with user input
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $user = mysql_fix_string($conn, $_POST['user']);
    $pass = mysql_fix_string($conn, $_POST['pass']);
    $query = "SELECT * FROM users WHERE user = $user AND pass = $pass";

    // Etc...

    // function mysql_fix_string($conn, $string)
    {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }
        return $conn->real_escape_string($string);
    }
?>

10.19 - Issuing prepared statements
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $stmt = $conn->prepare('INSERT INTO classics VALUES(?, ?, ?, ?, ?)');
    $stmt->bind_param('sssss', $author, $title, $category, $year, $isbn);

    $author = 'Emily Brontë';
    $title = 'Wuthering Heights';
    $category = 'Classic Fiction';
    $year = '1847';
    $isbn = '9780553212587';

    $stmt->execute();

    printf("$d Row inserted.\n", $stmt->affected_rows);

    $stmt->close();
    $conn->close();
?>

10.20 - Functions for preventing SQL and XSS attacks
<?php
    // function mysql_entities_fix_string($conn, $string)
    {
        return htmlentities(mysql_fix_string($conn, $string));
    }

    // function mysql_fix_string($conn, $string)
    {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }
        return $conn->real_escape_string($string);
    }
?>

10.21 - How to safely access MySQL and precent XSS attacks
<?php
    require_once 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);

    if ($conn->connect_error) {
        die($conn->connect_error);
    }

    $user = mysql_entities_fix_string($conn, $_POST['user']);
    $pass = mysql_entities_fix_string($conn, $_POST['pass']);

    $query = "SELECT * FROM users WHERE user = '$user' AND pass = '$user'";

    // Etc...

    function mysql_entities_fix_string($conn, $string)
    {
        return htmlentities(mysql_fix_string($conn, $string));
    }

    function mysql_fix_string($conn, $string)
    {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }
        return $conn->real_escape_string($string);
    }
?>
