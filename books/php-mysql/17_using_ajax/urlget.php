<?php
    if (isset($_GET['url'])) {
        echo file_get_contents('http://' . SanitizeString($_GET['url']));
    }

    function SanitizeString($var)
    {
        $var = strip_tags($var);
        $var = htmlentities($var);

        return stripslashes($var);
    }
?>
