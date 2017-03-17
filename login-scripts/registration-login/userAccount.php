<?php
    // start session
    session_start();

    // load and initialize user class
    include_once 'user.php';
    $user = new User();

    if (isset($_POST['signupSubmit'])) {
        // Check whether user details are empty
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {

            // password and confirm password comparison
            if ($_POST['password'] !== $_POST['confirm_password']) {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Confirm password must match with the password';
            }
            else {
                // Check whether user exists in the database
                $prevCon['where'] = array('email'=>$_POST['email']);
                $prevCon['return_type'] = 'count';

                $prevUser = $user->getRows($prevCon);
                if ($prevUser > 0) {
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Email already exusts, please use another email.';
                }
                else {
                    // Insert user data in the database
                    $userData = array(
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password'],
                        'phone' => $_POST['phone']
                    );

                    $insert = $user->insert($userData);

                    // set status based on data insert
                    if ($insert) {
                        $sessData['status']['type'] = 'success';
                        $sessData['status']['msg'] = 'You have registered successfully, log in with your credentials';
                    }
                    else {
                        $sessData['status']['type'] = 'error';
                        $sessData['status']['msg'] = 'Some problem occured, please try again';
                    }

                }
            }
        } else {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields';
        }

        // store signup status into the session
        $_SESSION['sessData'] = $sessData;
        $redirectURL = ($sessData['status']['type'] == 'success') ? 'index.php' : 'registration.php';

        // redirect to the home regisdration page
        header("Location: " . $redirectURL);
    }
    elseif (isset($_POST['loginSubmit'])) {
        // Check whether login details are empty
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            // get user data from user class
            $conditions['where'] = array(
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'status' => '1'
            );

            $conditions['return_type'] = 'single';
            $userData = $user->getRows($conditions);

            // set user data and status based on login credentials
            if ($userData) {
                $sessData['userLoggedIn'] = TRUE;
                $sessData['userID'] = $userData['id'];
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Welcome ' . $userData['first_name'] . '!';
            }
            else {
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Wrone email or password, please try again.';
            }
        }
        else {
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Enter email and password';
        }

        // store login status into the session
        $_SESSION['sessData'] = $sessData;

        // redirect to the home page
        header("Location: index.php");
    }
    elseif (!empty($_REQUEST['logoutSubmit'])) {
        unset($_SESSION['sessData']);
        session_destroy();

        // Store logout status into the session
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'You have logged out successfully from your account.';

        $_SESSION['sessData'] = $sessData;

        // redirect to the home page
        header('Location: index.php');
    }
    else {
        // redirect to the home page
        header('Location: index.php');
    }
?>
