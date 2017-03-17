<?php

    // Registration code
    // Checks user post data against database usernames/passwords
    // mysql
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysql_real_escape_string($_POST['username']);
        $password = mysql_real_escape_string($_POST['password']);
        $bool = true;

        mysql_connect("localhost", "username", "password") or die(mysql_error()); // connect to server
        mysql_select_db("tutorial1") or die("Cannot connect to database");
        $query = mysql_query("SELECT * FROM users");

        while ($row = mysql_fetch_array($query)) { // display all rows from query
            $table_users = $row['username'];

            if ($username == $table_users) { // checks for matching fields
                $bool = false;

                print '<script>alert("Username has been taken!");</script>';
                print '<script>window.location.assign("register.php");</script>';
            }
        }

        if ($bool) {
            mysql_query("INSERT INTO users (username, password) VALUES ('$username', '$password')");

            print '<script>alert("Successfully Registered!");</script>';
            print '<script>window.location.assign("register.php");</script>';
        }
    }
?>

<?php

    // Check login details are correct
    session_start();
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $bool = true;

    mysql_connect("localhost", "username", "password") or die (mysql_error()); //Connect to server
    mysql_select_db("tutorial1") or die ("Cannot connect to database"); //Connect to database
    $query = mysql_query("Select * from users WHERE username='$username'"); // Query the users table
    $exists = mysql_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysql_fetch_assoc($query)) // display all rows from query
       {
          $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
       }
       if(($username == $table_users) && ($password == $table_password))// checks if there are any matching fields
       {
          if($password == $table_password)
          {
             $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
             header("location: home.php"); // redirects the user to the authenticated home page
          }
       }
       else
       {
        Print '<script>alert("Incorrect Password!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
       }
    }
    else
    {
        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
?>

<?php

    // Logout
    session_start();
    session_destroy();
    header("location: index.php");
?>
