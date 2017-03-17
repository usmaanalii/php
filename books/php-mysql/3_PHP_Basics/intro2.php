3.10 - Automatic conversion from a number to a string
<?php
    $number = 12345 * 67890;
    // asking for one character at index 3
    echo substr($number, 3, 1);
?>

3.11 - Automatically converting a string into a number
<?php
    $pi = "3.1415927";
    $radius = 5;
    echo $pi * ($radius * $radius);
?>

<?php
    $b ? print "TRUE" : print "FALSE";
    // echo would produce a Parse error
?>

3.12 - A simple function declaration
<?php
    function longDate($timestamp) {
        return date("l F jS Y",  $timestamp);
    }

    echo longDate(time());
    // 17 days ago (days * hours * min * sec)
    echo longDate(time() - 17 * 24 * 60 * 60);
?>

3.13 - Expanded longdate function
<?php
    function longdate2($timestamp) {
        $temp = date("l F jS Y", $timestamp);
        return "The date is $temp";
    }
?>

3.14 - Variable scope
<?php
    $temp = "The date is ";
    echo longdate2(time());

    function longdate3($timestamp) {
        return $temp . date("l F jS Y", $timestamp);
    }
?>

3.15 - Local scope
<?php
    $temp = "The date is ";
    echo $temp . longdate4(time());

    function longdate4($timestamp) {
        return date('l F jS Y', $timestamp);
    }
?>

3.16 - Passing temp as an argument
<?php
    $temp = "The date is ";
    echo longdate5($temp, time());

    function longdate5($text, $timestamp) {
        return $text . date("l F jS Y", $timestamp);
    }
?>
