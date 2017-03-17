<?php
    session_start();
    include_once 'header.php';
    include_once 'functions.php';

    $_SESSION['userid'] = 1;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Microbogging Aplications</title>
    </head>
    <body>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<b>" . $_SESSION['message'] . "</b>";
                unset($_SESSION['message']);
            }
        ?>

        <p><a href="users.php">See list of users</a></p>

        <form action="add.php" method="post">
            <p>Your status:</p>
            <textarea name="body" rows="5" cols="40" wrap="hard"></textarea>
            <p><input type="submit" value="submit"></p>
        </form>

        <?php
            $posts = show_posts($_SESSION['userid']);

            if (count($posts)) {
        ?>
        <table border="1" cellspacing="0" cellpadding="5" width="500">
            <?php
                foreach ($posts as $key => $list) {
                    echo "<tr valign='top'>\n";
                    echo "<td>".$list['userid'] ."</td>\n";
                    echo "<td>".$list['body'] ."<br/>\n";
                    echo "<small>".$list['stamp'] ."</small></td>\n";
                    echo "</tr>\n";
                }
            ?>
        </table>
        <?php
    } else {
        ?>
        <p><b>You haven't posted anything yet!</b></p>
        <?php
                }
        ?>

        <h2>User's you're following</h2>

        <?php
            $users = show_users($_SESSION['userid']);

            if (count($users)) {
        ?>

        <ul>
            <?php
                foreach ($users as $key => $value) {
                    echo "<li>" . $value . "</li>\n";
                }
            ?>
        </ul>
        <?php
    }
    else {

        ?>
        <p><b>You're not following anyone yet</b></p>
        <?php
    }
        ?>
    </body>
</html>
