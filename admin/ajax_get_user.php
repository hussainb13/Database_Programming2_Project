<?php

include '../prelude.php';

// authorize request
if (empty($_SESSION['username']) || !User::from_username($_SESSION['username'])->is_admin()) {
    http_response_code(401);
}

switch ($_POST['userSearchBy']) {
    case 'userName':
        $user = User::from_username($_POST['userSearch']);
        break;
    case 'userId':
        $user = User::from_userId($_POST['userSearch']);
        break;
    case 'email':
        $user = User::from_email($_POST['userSearch']);
        break;
}

if ($user != null) {
    echo json_encode(array(
        'userId' => $user->userId,
        'username' => $user->userName,
        'fname' => $user->firstName,
        'lname' => $user->lastName,
        'email' => $user->email,
        'type' => $user->type,
        'country' => $user->country,
    ));
} else {
    http_response_code(404);
}