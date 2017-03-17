7.1 - Precision setting
<?php
    echo "\n"; // Enables viewing of the spaces

    // Pad to 15 spaces
    printf("The result is $%15f\n", 123.42 / 12);

    // Pad to 15 spaces, fill with zeros
    printf("The result is $%015f\n", 123.42 / 12);

    // Pad to 15 spaces, 2 decimal places precision
    printf("The result is $%15.2f\n", 123.42 / 12);

    // Pad to 15 spaces, 2 decimal places precision, fill with zeros
    printf("The result is $%015.2f\n", 123.42 / 12);

    // Pad to 15 spaces, 2 decimal places precision, fill with #
    printf("The result is $%'#15.2f\n", 123.42 / 12);
?>

7.2 - String padding
<?php
    echo "\n";

    $h = 'Rasmus';

    printf("[%s]\n", $h); // Standard string output
    printf("[%12s]\n", $h); // Right justify with spaces to width 12
    printf("[%-12s]\n", $h); // Left justify with spaces to width 12
    printf("[%012s]\n", $h); // Zero padding
    printf("[%'#12s]\n", $h); // Use the custom padding character '#'

    $d = 'Rasmus Lerdorf';

    printf("[%12.8s]\n", $d); // Right justify, cutoff of 8 characters
    printf("[%-12.12s]\n", $d); // Left justify, cutoff of 12 characters
    printf("[%-'@12.10s]\n", $d); // Left justify, pad '@', cutoff 10 chars
?>

7.3 - Checking for the validity of a date
<?php
    $month = 9; // September (only 30 days)
    $day = 31; // 31st

    $year = 2018; // 2018

    if (checkdate($month, $day, $year)) {
        echo "Dats is valid";
    }

    else {
        echo "Date is invalid";
    }
?>

7.4 - Creating a simple text file
<?php // testfile.php
    $fh = fopen("testfile.txt", 'w') or die("Failed to create file");

    $text = <<<_END
Line 1
Line 2
Line 3
_END;

    fwrite($fh, $text) or die("Could not write to file");
    fclose($fh);

    echo "File 'testfile.txt' written successfully";

?>

7.5 - Reading a file with fgets
<?php
    $fh = fopen("testfile.txt", 'r') or die("File does not exist or you lack permission to open it");

    $line = fgets($fh);
    fclose($fh);

    echo $line;
?>

7.6 - Reading a file with fread
<?php
    $fh = fopen("testfile.txt", 'r') or die("File does not exist or you lack permission to open it");

    $text = fread($fh, 3);
    fclose($fh);

    echo $text;
?>

7.7 - Copying a file
<?php // copyfile.php
    copy('testfile.txt', 'testfile2.txt') or die("Could not copy file");

    echo "File successfully copied to 'testfile2.txt'";
?>

7.8 - Alternate syntax for copying a file
<?php // copyfile2.php
    if (!copy('testfile.txt', 'testfile2.txt')) {
         echo "Could not copy file";
    }
    else {
        echo "File successfully copied to 'testfile2.txt'";
    }
?>

7.9 - Moving a file
<?php // movefile.php
    if (!rename('testfile2.txt', 'testfile2.new')) {
        echo "Could not rename file";
    }
    else {
        echo "File successfully renamed to 'testfile2.new'";
    }
?>

7.10 - Deleting a file
<?php // movefile.php
    if (!unlink('testfile2.new')) {
        echo "Could not delete file";
    }
    else {
        echo "File successfully deleted";
    }
?>

7.11 - Updating a file
<?php // update.php
    $fh = fopen("testfile.txt", 'r+') or die("Failed to open file");
    $text = fgets($fh);

    fseek($fh, 0, SEEK_END);

    fwrite($fh, "$text") or die("Could not write to file");
    fclose($fh);

    echo "File 'testfile.txt' successfully updated";
?>

7.12 - Updating a file with file locking
<?php
    $fh = fopen("testfile.txt", 'r+') or die("Failed to open file");
    $text = fgetc($fh);

    if (flock($fh, LOCK_EX)) {
        fseek($fh, 0, SEEK_END);
        fwrite($fh, "$text") or die("Could not write to file");
        flock($fh, LOCK_UN);
    }

    fclose($fh);

    echo "File 'testfile.txt' successfully updated";
?>
