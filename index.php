<?php
session_start();
echo <<<_END
<script src = "jquery-3.6.1.min.js"></script>
<script src = "checkUser.js"></script>
<script src = "addUser.js"></script>
<script src = "getUser.js"></script>
_END;
if (!isset($_GET['reg'])) {
    include 'form-auth.php';
    echo <<<_REG
        <a href="index.php?reg=1">Please sign up</a>
_REG;
}
if (isset($_GET['reg']) && $_GET['reg'] == 1) {
    include 'form-reg.php';
    echo <<<_AUTH
        <a href="index.php">Please log in</a>
_AUTH;
}