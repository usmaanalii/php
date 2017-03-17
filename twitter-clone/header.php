<?php
    $server = 'localhost';
    $user = 'username';
    $password = 'password';
    $database = 'twitter_clone';

    if (!($mylink = mysql_connect($server, $user, $password))) {
        echo "<h3>Sorry, could not connect to database</h3><br>
        Please contact your system's admin for more help/n";
        exit;
    }

    mysql_select_db($database);
?>
