<?php
    function queryMysql($query)
    {
    global $connection;
    $result = $connection->query($query);

    if (!$result) {
        die($connection->error);
    }
    return $result;
    }
?>

<!-- Usage -->
<?php
    $result = queryMySQL("SELECT user, pass FROM members
                          WHERE user='$user' AND pass='$pass'");
?>
