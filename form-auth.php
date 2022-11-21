<form method="POST" action="index.php">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" minlength="6" required onblur="checkUser(this)">
    <div id="used-login">&nbsp;</div>

    <label for="pass">Password:</label>
    <input type="password" id="pass" name="password" minlength="6" required onblur="checkUser(this)">
    <div id="used-pass">&nbsp;</div>

    <input type="submit" name="login" value="Log in" onsubmit="getUser()">
</form>