<?php
    session_start();
    include_once 'header.php';
    include_once 'functions.php';

    $userid = $_SESSION['userid'];
    $body = substr($_POST['body'], 0, 140);

    add_post($userid, $body);
    $_SESSION['message'] = "Your post has been added!";

    header("Location: index.php");
?>
