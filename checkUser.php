<?php
    include 'Check.php';

    if (isset($_POST['login'])) {
        Check::checkLogin($_POST['login']);
    }

    if (isset($_POST['password'])) {
        Check::checkPassword($_POST['password']);
    }

    if (isset($_POST['confirm_password'])) {
        Check::checkConfirmPassword($_POST['confirm_password']);
    }

    if (isset($_POST['email'])) {
        Check::checkEmail($_POST['email']);
    }

    if (isset($_POST['name'])) {
        Check::checkName($_POST['name']);
    }
