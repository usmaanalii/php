<?php
    // Procedural
    $host = 'localhost';

    $user = 'username';

    $password = 'password';

    $database = 'dbusers';

    $mysqli = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno($mysqli)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

<?php
    // Object Oriented
    $host = 'localhost';

    $user = 'username';

    $password = 'password';

    $database = 'dbusers';

    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }

?>
