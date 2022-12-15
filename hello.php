<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: index.php');
}
$session = json_encode($_SESSION['name']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>RegAuth</title>
</head>
<body>
    <h1 style='display: flex;
           justify-content: center;
           margin-top: 10vh'>
    Hello, <?=str_replace('"', '', $session)?></h1>

    <a style='margin-top: 15px;
                color: #7c9ab7;
                font-weight: bold;
                text-decoration: none;
                display: flex;
                justify-content: center;
                font-size: 18px;' 
         href='logout.php'>Exit</a>
</body>
</html>
