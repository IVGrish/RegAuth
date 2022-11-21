<form method="POST" action="index.php" onsubmit="getUser(this)">
    <label for="login">Login:</label>
    <input type="text" id="login" name="login" minlength="6" required onblur="checkUser(this)">
    <div id="used-login">&nbsp;</div>

    <label for="pass">Password:</label>
    <input type="password" id="pass" name="password" minlength="6" required onblur="checkUser(this)">
    <div id="used-pass">&nbsp;</div>

    <label for="conf_pass">Confirm Password:</label>
    <input type="password" id="conf_pass" name="confirm_password" minlength="6" required onblur="checkUser(this)">
    <div id="used-conf-pass">&nbsp;</div>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required onblur="checkUser(this)">
    <div id="used-email">&nbsp;</div>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" minlength="2" required onblur="checkUser(this)">
    <div id="used-name">&nbsp;</div>

    <input type="submit" id="signup" name="signup" value="Sign up">
</form>