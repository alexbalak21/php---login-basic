<?php
require_once "components/router.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>PHP LOGIN</title>
</head>
<body>
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="#">LINK</a></li>
      <li><a href="">LINK</a></li>
      <li id="nav-right"><a id="registerLink" href="?page=register">Register</a></li>
      <li id="nav-right"><a id="loginLink" href="?page=login">Login</a></li>
    </ul>
    <header><h1>HEADER</h1></header>
    <main>
    <?php
require_once "views/$page.php";
?>
    </main>
    <footer><h1>FOOTER</h1></footer>
    <script src="assets/js/script.js"></script>
  </body>
</html>
