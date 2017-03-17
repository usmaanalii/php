<?php // adduser.php

    // The PHP code

    $forename = $surname = $username = $password = $age = $email = "";

    if (isset($_POST['forename'])) {
        $forename = fix_string($_POST['forename']);
    }
    if (isset($_POST['surname'])) {
        $surname = fix_string($_POST['surname']);
    }
    if (isset($_POST['username'])) {
        $username = fix_string($_POST['username']);
    }
    if (isset($_POST['password'])) {
        $password = fix_string($_POST['password']);
    }
    if (isset($_POST['age'])) {
        $age = fix_string($_POST['age']);
    }
    if (isset($_POST['email'])) {
        $email = fix_string($_POST['email']);
    }

    $fail  = validate_forename($forename);
    $fail .= validate_surname($surname);
    $fail .= validate_username($username);
    $fail .= validate_password($password);
    $fail .= validate_age($age);
    $fail .= validate_email($email);

    echo "<!DOCTYPE html>\n<html><head><title>An Example Form</title>";

    if ($fail == "") {
        echo "</head><body>Form data successfully validated: $forename, $surname, $username, $password, $age, $email.</body></html>";

        // This is where you would enter the posted fields into a database
        // preferably using hash encryption for the password
        exit;
    }

    echo <<<_END

    <!-- The HTML/JS section -->

    <link rel="stylesheet" href="validate.css">
    <script src="validate.js"></script>
</head>

<body>
    <table border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
        <th colspan="2" align="center">Signup Form</th>

        <tr><td colspan="2">Sorry, the following errors were found<br>
        in your form: <p><font color=red size=1><i>$fail</i></font></p>
        </td></tr>
        <form method="post" action="adduser.php" onsubmit="return validate(this)">
            <tr>
                <td>Forename</td>
                <td><input type="text" maxlength="32" name="forename"></td>
            </tr>
            <tr>
                <td>Surname</td>
                <td><input type="text" maxlength="32" name="surname"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" maxlength="16" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" maxlength="12" name="password"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" maxlength="3" name="age"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" maxlength="64" name="email"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Signup"></td>
            </tr>
        </form>
    </table>
</body>

</html>

_END;

    // The PHP functions

    function validate_forename($field)
    {
        return ($field == "") ? "No Forename was entered<br>": "";
    }

    function validate_surname($field)
    {
        return ($field == "") ? "No Surname was entered<br>": "";
    }

    function validate_username($field)
    {
        if ($field == "") {
            return "No Username was entered<br>";
        }
        elseif (strlen($field) < 5) {
            return "Usernames must be at least 5 characters<br>";
        }
        elseif (preg_match("/[^a-zA-z0-9_-]/", $field)) {
            return "Only letters, numbers, - and _ in usernames<br>";
        }
        return "";
    }

    function validate_password($field)
    {
        if ($field == "") {
            return "No Password was entered<br>";
        }
        elseif (strlen($field) < 6) {
            return "Passwords must be at least 6 characters<br>";
        }
        elseif (!preg_match("/[a-z]", $field) ||
                !preg_match("/[A-Z]", $field) ||
                !preg_match("/[0-9]", $field)) {

                    return "Passwords require 1 each of a-z, A-Z and 0-9<br>";
        }
        return "";
    }

    function validate_age($field)
    {
        if ($field == "") {
            return "No Age was entered<br>";
        }
        elseif ($field < 18 || $field > 110) {
            return "Age must be between 18 and 110<br>";
        }
        return "";
    }

    function validate_email($field)
    {
        if ($field == "") {
            return "No Email was entered<br>";
        }
        elseif (!((strpos($field, ".") > 0) &&
                  (strpos($field, "@") > 0)) ||
                   preg_match("/[^a-zA-Z0-9.@_-]/", $field)) {

                       return "The Email address is invalid<br>";
        }
        return "";
    }

    function fix_string($string)
    {
        if (get_magic_quotes_gpc()) {
            $string = stripslashes($string);
        }

        return htmlentities($string);
    }


 ?>
