<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SimpleCMS</title>
    </head>
    <body>
        <?php
            include_once 'simpleCMS.php';
            $obj = new simpleCMS();
            $obj->host = 'localhost';
            $obj->username = 'username';
            $obj->password = 'password';
            $obj->table = 'testDB';

            $obj->connect();

            if ($_POST) {
                $obj->write($_POST);
            }

            echo ( $_GET['admin'] == 1 ) ? $obj->display_admin() : $obj->display_public();
        ?>
    </body>
</html>
