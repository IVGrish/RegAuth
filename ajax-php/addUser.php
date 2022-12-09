<?php

session_start();

include '../classes/Json.php';

if (isset($_POST['signup'])) {
    $json['login'] = $_POST['login'];
    $json['password'] = md5($_POST['password']);
    $json['confirm_password'] = md5($_POST['confirm_password']);
    $json['email'] = $_POST['email'];
    $json['name'] = $_POST['name'];
    Json::update($json);
    $_SESSION['name'] = $json['name'];
}
