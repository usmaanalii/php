<?php

    $username = 'admin';
    $password = 'letmein';

    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

        if (isset($_SERVER['PHP_AUTH_USER']) == $username && isset($_SERVER['PHP_AUTH_PW']) == $password) {
            echo "Your are now logged in";
        }
        else {
            die("invalid username / password combination");
        }
    }
    else {
        header('WWW.Authenticate: Basic realm="Restricted Section"');
        header('HTTP/1.0 401 Unauthorized');
        die("Please enter your user name and password");
    }
?>
