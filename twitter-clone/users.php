<?php
    session_start();
    include_once 'header.php';
    include_once 'functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Microbogging Aplications</title>
    </head>
    <body>
        <h1>List of Users</h1>
        <?php
            $users = show_users();

            $following = following($_SESSION['userid']);

            if (count($users)) {
        ?>

        <table border="1" cellspacing="0" cellpadding="5" width="500">
            <?php
                foreach ($users as $key => $value) {
                    echo "<tr align='top'>\n";
                    echo "<td>".$key ."</td>\n";
                    echo "<td>".$value;
                    if (in_array($key, $following)) {
                        echo "<small>
                            <a href='action.php?id=$key&do=unfollow'>unfollow
                            </a>
                              </small>";
                    } else {
                        echo "<small>
                            <a href='action.php?id=$key&do=follow'>follow
                            </a>
                              </small>";
                    }
                    echo "</td>\n";
                    echo "</tr>\n";
                }
            ?>
        </table>
        <?php
    } else {
        ?>
        <p><b>There are no users in the system!</b></p>
        <?php
    }
        ?>
    </body>
</html>
