<?php
    // Get User's info by the UserID
    $user_info = User::getUserInfoById($user_id);

    // Render data to the view
    $view = new View();
    $view->user_info = $user_info;

    $view->render('user_details');
?>
