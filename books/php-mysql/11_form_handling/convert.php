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
