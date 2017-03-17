5.1 - Three string functions
<?php
    echo strrev(" .dlrow olleH"); // Reverse string
    echo "\n";
    echo str_repeat("Hip", 2); // Repeat string
    echo "\n";
    echo strtoupper("hooray"); // String to uppercase
?>

5.2 - Cleaning up a full name
<?php
    echo fix_names("WILLIAM", "henry", "gaTES");

    function fix_names($n1, $n2, $n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));

        return $n1 . " " . $n2 . " " . $n3;
    }
?>

5.3 - Returning multiple values in an array
<?php
    $names = fix_names_2("WILLIAM", "henry", "gatES");
    echo $names[0] . " " . $names[1] . " " . $names[2];

    function fix_names_2($n1, $n2, $n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));

        return array($n1, $n2, $n3);
    }
?>

5.4 - Returning values from a function by reference
<?php
    $a1 = "WILLIAM";
    $a2 = "henry";
    $a3 = "gatEs";

    echo $a1 . " " . $a2 . " " . $a3; // before
    echo "\n";
    fix_names_ref($a1, $a2, $a3);
    echo $a1 . " " . $a2 . " " . $a3; // after reference

    function fix_names_ref(&$n1, &$n2, &$n3)
    {
        $n1 = ucfirst(strtolower($n1));
        $n2 = ucfirst(strtolower($n2));
        $n3 = ucfirst(strtolower($n3));
    }
?>

5.5 - Returning values in global variables
<?php
    $a1 = "WILLIAM";
    $a2 = "henry";
    $a3 = "gatEs";

    echo $a1 . " " . $a2 . " " . $a3; // before
    echo "\n";
    fix_names_glob();
    echo $a1 . " " . $a2 . " " . $a3; // after reference

    function fix_names_glob()
    {
        global $a1; $a1 = ucfirst(strtolower($a1));
        global $a2; $a2 = ucfirst(strtolower($a2));
        global $a3; $a3 = ucfirst(strtolower($a3));
    }
?>

5.6 - Including a PHP file
<?php
    include "library.php";

    // code goes here
?>

5.7 - Including a PHP file once
<?php
    include_once "library.php";

    // code goes here
?>

5.8 - Requiring a PHP file
<?php
    require_once "library.php";

    // code goes here
?>

5.9 - Checking for a function's existence
<?php
    if (function_exists("array_combine")) {
        echo "Function exists";
    }
    else {
        echo "Function does not exist - better write our own";
    }
?>
