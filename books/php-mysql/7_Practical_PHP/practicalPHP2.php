7.13 - Using file_get_contents
<?php
    echo "\n";
    echo file_get_contents("testfile.txt");
    echo "\n";
?>

7.14 - Fetching the O'Reilly homepage
<?php
    echo file_get_contents("http://oreilly.com");
?>

7.15 - Image uploader upload.php
<?php
    echo <<<_END
    <html>
        <head>
        <title>PHP Form Upload</title><
        /head>
    <body>
    <form method='post' action='upload.php' enctype='multipart/form-data'>
    Select File: <input type='file' name='filename' size='10'>
    <input type='submit' value='Upload'>
    </form>
_END;

    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        echo "Uploaded image '$name<br><img src='$name'";
    }

    echo "</body></html>";
?>

The contents of the $_FILES array
<?php
    $_FILES['file']['name']; // name of uploaded file
    $_FILES['file']['type']; // image/jpg
    $_FILES['file']['size']; // size in bytes
    $_FILES['file']['tmp_name']; // name of file on server
    $_FILES['file']['error']; // error code resulting from upload
?>

7.16 - A more secure version of upload.php
<?php // upload2.php
    echo <<<_END
    <html>
        <head>
        <title>PHP Form Upload</title>
        </head>
    <body>
        <form method='post' action='upload2.php' enctype='multipart/form-data'>Select a JPG, PNG or TIF File: <input type='file' name='filename' size='10'>
        <input type='submit' value='Upload'>
        </form>
_END;

    if ($_FILES) {
        $name = $_FILES['filename']['name'];

        switch ($_FILES['filename']['type']) {
            case 'image/jpeg':
                $ext = 'jpg';
                break;
            case 'image/gif':
                $ext = 'gif';
                break;
            case 'image/png':
                $ext = 'png';
                break;
            case 'image/tif':
                $ext = 'tif';
                break;
            default:
                $ext = '';
                break;
        }
        if ($ext) {
            $n = "image.$ext";
            move_uploaded_file($_FILES['filename']['tmp_name'], $n);
            echo "Uploaded image '$name' as '$n':<br>";
            echo "<img src='$n'>";
        }
        else {
            echo "'$name' is not an accepted image file";

        }

    }

    else {
       echo "No image has been uploaded";
   }

   echo "</body></html>";

?>

7.17 - Executing a system command
<?php
    $cmd = "ls";

    exec(escapeshellcmd($cmd), $output, $status);

    if ($status) {
        echo "Exec command failed";
    }
    else {
        echo "\n";
    }

    foreach ($output as $line) {
        echo htmlspecialchars("$line\n");
        echo "\n";
    }
?>
