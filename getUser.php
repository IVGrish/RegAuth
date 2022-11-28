<?php

include "Json.php";

if (isset($_POST['signup'])) {
    $json['login'][] = $_POST['login'];
    $json['password'][] = $_POST['password'];
    $json['confirm_password'][] = $_POST['confirm_password'];
    $json['email'][] = $_POST['email'];
    $json['name'][] = $_POST['name'];
    Json::encode($json);
}
