<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Login Form</title>
    </head>
    <body>
        <form action="remember.php" method="post" id="frmLogin">
	<div class="error-message"><?php if (isset($message)) {
    echo $message;
} ?></div>
	<div class="field-group">
		<div><label for="login">Username</label></div>
		<div><input name="member_name" type="text" value="<?php if (isset($_COOKIE["member_login"])) {
    echo $_COOKIE["member_login"];
} ?>" class="input-field">
	</div>
	<div class="field-group">
		<div><label for="password">Password</label></div>
		<div><input name="member_password" type="password" value="<?php if (isset($_COOKIE["member_password"])) {
    echo $_COOKIE["member_password"];
} ?>" class="input-field">
	</div>
	<div class="field-group">
		<div><input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["member_login"])) {
    ?> checked <?php
} ?> />
		<label for="remember-me">Remember me</label>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div>
</form>
    </body>
</html>
