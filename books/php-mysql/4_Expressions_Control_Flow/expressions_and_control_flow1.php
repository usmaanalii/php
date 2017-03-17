4.1 - Four simple Boolean expressions
<?php
    echo "a: [" . (20 > 9) . "]<br>";
    echo "b: [" . (5 == 6) . "]<br>";
    echo "c: [" . (1 == 0) . "]<br>";
    echo "d: [" . (1 == 1) . "]<br>";
?>

4.3 - Literals and variables
<?php
    $myname = "Brian";
    $myage = 37;

    echo "a: " . 73 .      "<br>"; // Numeric literal
    echo "b: " . "Hello" . "<br>"; // String literal
    echo "c: " . FALSE .   "<br>"; // Constant literal
    echo "d: " . $myname . "<br>"; // String variable
    echo "e: " . $myage .  "<br>"; // Numeric variable
?>

4.4 - An expression and a statement
<?php
    $days_to_new_year = 366 - $day_number; // Expression

    if ($days_to_new_year) {
        echo "Not long now till new year"; // Statement
    }
?>

4.11 - Multiple assignment statement
<?php
    // right assignment first ($time = 0)
    $level = $score = $time = 0;
    // using parenthesis is recommended
?>

4.12 - Assigning a value and testing for equality
<?php
    $month = "March";

    if ($month == "March") {
        echo "It's springtime";
    }
?>

4.13 - The equality and identity operators
<?php
    $a = "1000";
    $b = "+1000";

    if ($a == $b) {
        // evaluates to true, loose conversion
        echo "1";
    }
    if ($a === $b) {
        // identity operator evaluates to false
        // prevents type conversion
        echo "2";
    }
?>

4.14 - The inequality and non-identity operators
<?php
    $a = "1000";
    $b = "+1000";

    if ($a != $b) {
        // evaluates to false, loose conversion
        echo "1";
    }
    if ($a !== $b) {
        // non-identity operator evaluates to true
        echo "2";
    }
?>

4.15 - The four comparison operators
<?php
    $a = 2; $b = 3;

    if ($a > $b) {
        echo "$a is greater than $b\n";
    }
    if ($a < $b) {
        echo "$a is less than $b\n";
    }
    if ($a >= $b) {
        echo "$a is greater than or equal to $b\n";
    }
    if ($a <= $b) {
        echo "$a is less than or equal to $b\n";
    }
?>

4.16 - The logical operators in use
<?php
    $a = 1; $b = 0;

    echo ($a AND $b) . "\n";
    echo ($a or $b) . "\n";
    echo ($a XOR $b) . "\n";
    echo !$a . "\n";
?>

4.17 - A statement using the OR operator
<?php
    if ($finished == 1 OR getnext() == 1) {
        exit;
    }
?>

4.18 - Modified
<?php
    $gn = getnext();
    // $gn will be evaluates and the result stored before the if statement
    if ($finished == 1 OR $gn == 1) {
        exit;
    }
?>
