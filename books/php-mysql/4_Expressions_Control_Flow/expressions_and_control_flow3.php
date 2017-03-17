4.28 - While loop
<?php
    $fuel = 10;

    while ($fuel > 1) {
        // Keep driving...
        echo "There's enough fuel";
        break; // prevent infinite loop
    }
?>

4.29 - 12 times table
<?php
    $count = 1;

    while ($count <= 12) {
        echo "$count times 12 is " . $count * 12 . "\n";
        ++$count;
    }
?>

4.30 - Shorter version
<?php
    $count = 0; // incremented in the first loop

    while (++$count <= 12) {
        echo "$count times 12 is " . $count * 12 . "\n";
    }
?>

4.31 - do..while loop
<?php
    $count = 1;

    do {
        echo "$count times 12 is " . $count * 12 . "\n";
    } while (++$count <= 12);
?>

4.33 - for loop
<?php
    for ($count = 1; $count <= 12; $count++) {
        echo "$count times 12 is " . $count * 12 . "\n";
    }
?>

4.34 - Writing a file using a for loop with error trapping
<?php
    $fp = fopen("text.txt", 'wb');

    for ($j = 0; $j < 100; $j++) {
        $written = fwrite($fp, "data");

        if (!$written) {
            break;
        }
    }
    fclose($fp);
?>

4.36 - Trapping division by zero errors using continue
<?php
    $j = 10;

    while ($j > -10) {
        if ($j == 0) {
            continue;
        }
        echo (10 / $j) . "\n";
    }
?> 
