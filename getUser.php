<?php
include "Json.php";

if (isset($_POST['signup'])) {
    $json['login'][] = $_POST['login'];
    Json::encode($json);
}
