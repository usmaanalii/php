3.17 - Static variable
<?php
    function test() {
        static $count = 0;
        echo $countl;
        $count++;
    }
?>

3.18 - Allowed and disallowed static variable declarations
<?php
    static $int = 0; // allowed
    static $int = 1 + 2; // disallowed
?>
