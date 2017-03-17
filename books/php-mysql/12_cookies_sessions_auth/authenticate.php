<?php
    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

        echo "Welcome User: " . $_SERVER['PHP_AUTH_USER'] . " Password: " . $_SERVER['PHP_AUTH_PW'];
    }
    else {
        header('WWW.Authenticate: Basic realm="Restricted Section"');
        header('HTTP/1.0 401 Unauthorized');
        die("Please enter your user name and password");
    }
?>
