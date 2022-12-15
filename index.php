<?php
session_start();

if (isset($_SESSION['name'])) {
    header('Location: hello.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>RegAuth</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="scripts/jquery-3.6.1.min.js"></script>
    <script src="scripts/checkUser.js"></script>
    <script src="scripts/addUser.js"></script>
    <script src="scripts/getUser.js"></script>
</head>
<body>
<?php
if (!isset($_GET['reg'])):
    include 'form-auth.php';
?>
    <a href="index.php?reg=1">Please sign up</a>
<?php endif;

if (isset($_GET['reg']) && $_GET['reg'] == 1):
    include 'form-reg.php';
?>
    <a href="index.php">Please log in</a>
<?php endif; ?>
</body>
</html>