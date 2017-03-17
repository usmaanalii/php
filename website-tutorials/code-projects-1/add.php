<?php
    session_start();

    if ($_SESSION['user']) {
    }
    else {
        header("location: index.php");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") { // keeps page secured
        $details = mysql_real_escape_string($_POST['details']);
        $time = strftime("%X"); // time
        $date = strftime("%B %d, %Y"); // date
        $decision = "no";

        mysql_connect("localhost", "username", "password") or die(mysql_error());
        mysql_select_db("tutorial1") or die("Cannot connect to database");

        foreach ($_POST['public'] as $each_check) {
            if ($each_check != null) { // checks if the checkbox is checked
                $decision = "yes";
            }
        }

        mysql_query("INSERT INTO list(details, date_posted, time_posted, public) VALUES ('$details', '$date', '$time', '$decision')");
        header("location: home.php");

    } else {
        header("location: home.php");
    }

?>
