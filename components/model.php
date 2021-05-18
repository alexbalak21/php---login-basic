<?php
global $pdo;
$pdo = null;

// CONNECT TO MySQL and DATABASE
function db_connect()
{
    global $pdo;
    $servername = "localhost";
    $username = "admin";
    $password = "root";
    $db_name = "test";
    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

// CREATE USER
function registerUser($username, $password, $img="profile.png")
{
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    db_connect();
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO `users` (`username`, `password`, `img`) VALUES (:username, :passHash, :img)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':passHash', $passHash);
    $stmt->bindParam(':img', $img);
    $done = $stmt->execute();
    $last_id = $pdo->lastInsertId();
    $pdo = null;
    return $last_id;
}
//CHECK USER LOGIN
function checkUserPass($username, $password)
{
    db_connect();
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=:username");
    $stmt->bindValue(':username', $username);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetch();
    if (empty($data)) {
        return 'NOUSER';
    }
    $passHash = $data['password'];
    if (password_verify($password, $passHash)) {
        unset($data['password']);
        $data['connected'] = "TRUE";
        $pdo = null;
        return $data;
    } else {
        $data = null;
        $pdo = null;
        return "WRONGPASS";
    }
}
