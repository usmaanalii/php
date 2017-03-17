<?php
    $con = mysqli_connect("example.com", "peter", "abc123", "my_db");

    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con, "SELECT * FROM users WHERE user = '". mysqli_real_escape_string($_GET['user_id'])."'");

    $row = mysqli_fetch_array($result);

    echo "<div>";
    echo $row['first_name'] . " " . $row['last_name'];
    echo "</div>";

    mysqli_close();
?>

<?php
    $con = mysqli_connect("example.com", "peter", "abc123", "my_db");

    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if (isset($_GET['user_id'])) {
        $result = mysqli_query($con, "SELECT * FROM users WHERE user = '". mysqli_real_escape_string($_GET['user_id'])."'");
    }
    elseif (isset($_SESSION['user_id'])) {
        $result = mysqli_query($con, "SELECT * FROM users WHERE user = '". mysqli_real_escape_string($_SESSION['user_id'])."'");
    }

    if (isset($result)) {
        echo "<div>";
        echo $row['first_name'] . " " . $row['last_name']." (".$row['email'].")";
        echo "</div>";

    } else {
        echo "<form action='/register-form.php'>
                <button>Register</button>
              </form>";
    }

    mysqli_close($con);

?>
