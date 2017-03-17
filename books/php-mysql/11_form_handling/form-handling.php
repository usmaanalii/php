11.1 - formtest.php - a simple PHP form handler
<?php // formtest.php

    echo <<<_END

    <html>
        <head>
            <title>Form Test</title>
        </head>
        <body>
            <form method="post" action="formtest.php">
                What is your name?
                    <input type="text" name="name">
                    <input type="submit">
            </form>
        </body>
    </html>
_END;
?>

11.2 - Updated version of formtest.php
<?php // formtest.php

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    else {
        $name = "(Not entered)";
    }

    echo <<<_END

    <html>
        <head>
            <title>Form Test</title>
        </head>
        <body>
            Your name is: $name <br>
            <form method="post" action="formtest2.php">
                What is your name?
                    <input type="text" name="name">
                    <input type="submit">
            </form>
        </body>
    </html>
_END;
?>

11.3 - Setting default values
<?php
    echo <<<_END
    <form method="post" action="calc.php">
        <pre>
            Loan Amount <input type="text" name="principle">
            Monthly Repayment <input type="text" name="monthly">
            Number of Years <input type="text" name="years" value="25">
            Interest Rate <input type="text" name="rate" value="6">
            <input type="submit">
        </pre>
    </form>

_END;
?>

11.4 - Offering multiple checbox choices <br><br>

Vanilla <input type="checkbox" name="ice" value="Vanilla">
Chocolate <input type="checkbox" name="ice" value="Chocolate">
Strawberry <input type="checkbox" name="ice" value="Strawberry">

<br><br> 11.5 - Submitting multiple values with an array <br><br>

Vanilla <input type="checkbox" name="ice[]" value="Vanilla">
Chocolate <input type="checkbox" name="ice[]" value="Chocolate">
Strawberry <input type="checkbox" name="ice[]" value="Strawberry">

<br><br> 11.6 - Using radio buttons <br><br>

8am-Noon <input type="radio" name="time" value="1">
Noon-4am <input type="radio" name="time" value="2" checked="checked">
<label>4pm-8pm <input type="radio" name="time" value="3"></label>

<br><br> 11.7 - Using select <br><br>
<select name="veg" size="1">
    <option value="Peas">Peas</option>
    <option value="Beans">Beans</option>
    <option value="Carrots">Carrots</option>
    <option value="Cabbage">Cabbage</option>
    <option value="Broccoli">Broccoli</option>
</select>

<br><br> 11.8 - Using select with multiple attribute <br><br>
<select name="veg" size="5" multiple="multiple">
    <option value="Peas">Peas</option>
    <option value="Beans">Beans</option>
    <option value="Carrots">Carrots</option>
    <option value="Cabbage">Cabbage</option>
    <option value="Broccoli">Broccoli</option>
</select>

11.9 - The sanitizeString and sanitizeMySQL functions
<?php
    // function sanitizeString($var)
    {
        $var = stripcslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);

        return $var;
    }

    function sanitizeMySQL($connection, $var)
    {
        $var = $connection->real_escape_string($var);
        $var = sanitizeString($var);

        return $var;
    }

    // $var = sanitizeString($_POST['user_input']);
    // $var = sanitizeMySQL($connection, $_POST['user_input']);
?>

11.10 - A program to convert values between Fahrenheit and Celsius
<?php
    $f = $c = '';

    if (isset($_POST['f'])) {
        $f = sanitizeString($_POST['f']);
    }
    if (isset($_POST['c'])) {
        $c = sanitizeString($_POST['c']);
    }

    if ($f != '') {
        $c = intval((5 / 9) * ($f - 32));
        $out = "$f farenheit equals $c celsius";
    }
    elseif ($c != '') {
        $f = intval((9 / 5) * ($c + 32));
        $out = "$c celsius equals $f farenheit";
    }
    else {
        $out = "";
    }

    echo <<<_END

    <html>
        <head>
            <title>Temperature Converter</title>
        </head>
        <body>
            <pre>
                Enter either Fahrenheit or Celsius and click on Convert

                <b>$out</b>
                <form action="convert.php" method="post">
                    Fahrenheit <input type="text" name="f" size="7">
                    Celsius <input type="text" name="c" size="7">
                            <input type="submit" value="Convert">
                </form>
            </pre>
        </body>
    </html>

_END;

    function sanitizeString($var)
    {
        $var = stripcslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);

        return $var;
    }
?>
