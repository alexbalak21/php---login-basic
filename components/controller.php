<?php
require_once "model.php";
require_once "upload.php";
if (isset($_POST['register'])) {
    $fileName = 'profile.png';
    if (isset($_FILES['fileToUpload'])) {
        $error = imgFileUpload();
        $fileName = $_FILES['uploaded'];
    }
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if ($password1 == $password2) {
        $id = registerUser($username, $password1, $fileName);
        if ($id > 0) {
            header("Location: ../index.php?page=login");
        }
    }
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = checkUserPass($username, $password);
    if ($result == 'NOUSER') {
        header("Location: ../index.php?page=login&error=NOUSER");
    }

    if ($result == 'WRONGPASS') {
        header("Location: ../index.php?page=login&error=WRONGPASS");
    }
    if ($result['connected'] == 'TRUE') {
        array_pop($result);
        $data = json_encode($result, true);
        set_cookie('user', $data, 14);
        header("Location: ../index.php?page=profile");
    }
}

function set_cookie($name, $value, $expDays)
{
    $set = setcookie($name, $value, time() + (86400 * (INT)$expDays), "/");
    return $set;
}
