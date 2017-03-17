<?php
    //  all classes located in inc/class folder
    //  load in the required classes via __autoload

    function __autoload($class_name)
    {
        include_once 'inc/class' . $class_name . '.inc.php';
    }
?>
