<?php
require_once "model.php";
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if ($password1 == $password2) {
        $id = registerUser($username, $password1);
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
        header("Location: ../index.php?page=login&error=NOUSER");
    }
    if (is_array($result)) {
        header("Location: ../index.php?page=login&connected");
    }
}
