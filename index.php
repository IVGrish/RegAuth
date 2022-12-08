<?php
session_start();

if (isset($_SESSION['name'])) {
    header('Location: hello.php');
}
echo <<<_STYLE
<head>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>RegAuth</title>
</head>
_STYLE;

echo <<<_SCRIPT
<script src = "scripts/jquery-3.6.1.min.js"></script>
<script src = "scripts/checkUser.js"></script>
<script src = "scripts/addUser.js"></script>
<script src = "scripts/getUser.js"></script>
_SCRIPT;

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