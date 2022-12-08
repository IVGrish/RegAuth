<?php

include "Json.php";

class Check
{
    static public function sanitizeString(string $var): string
    {
        $var = strip_tags($var);
        $var = htmlentities($var);
        return stripslashes($var);
    }

    static public function checkLogin(string $login): void
    {
        $login = self::sanitizeString($login);
        $json = Json::read();
        if (in_array($login, $json['login'])) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The login '$login' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The login '$login' is available</span>";
        }
    }

    static public function checkPassword(string $password): void
    {
        $password = self::sanitizeString($password);
        if (!preg_match("#[a-zA-Z0-9]#", $password)) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The password is invalid, " .
                "<br>make sure you typed only letters and numbers</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The password is valid</span>";
        }
    }

    static public function checkConfirmPassword(string $confirmPassword, string $pass): void
    {
        $confirmPassword = self::sanitizeString($confirmPassword);
        $pass = self::sanitizeString($pass);
        if ($confirmPassword != $pass) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The passwords don't match</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The passwords match</span>";
        }
    }

    static public function checkEmail(string $email): void
    {
        $email = self::sanitizeString($email);
        $json = Json::read();
        if (!preg_match("#^[A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}$#i", $email)) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The email is not in the correct format</span>";
        } elseif (in_array($email, $json['email'])) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The email '$email' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The email '$email' is available</span>";
        }
    }

    static public function checkName(string $name): void
    {
        $name = self::sanitizeString($name);
        if (!preg_match("#[a-zA-Z]#", $name)) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The name is invalid, " .
                "<br>make sure you typed only letters</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The name is valid</span>";
        }
    }
}