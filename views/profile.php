<?php
 if(isset($_COOKIE['user']))
$user = json_decode($_COOKIE['user']);
else
header("Location: index.php?page=home");
?>


<div class='profile'>
<h1>Profile Page</h1><br>
<img class="profileImg" src="public/profile/img/profile.png" alt="profile Default"><br>
<br>
<button>UPDATE PROFIE</button>
<?php
 var_dump($user);
?>
</div>
