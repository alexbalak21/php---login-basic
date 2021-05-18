<div class="login">
<h1>REGISTER</h1>
<br>
<form id="registerForm" action="components/controller.php" method="POST">
<label>Username:</label><br>
<input type="text" name="username"><br>
<br>
<label>Password:</label><br>
<input type="password" name="password1"><br>
<br>
<label>Confirm Password:</label><br>
<input type="password" name="password2"><br>
<br>
<input type="hidden" name="register">
<input type="submit" name="RegForm" value="REGISTER"><br>
<br>
<p id="warning"></p>
</form>
</div>
<script src="assets/js/register.js"></script>
