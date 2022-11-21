<?php
include "Json.php";
class Check
{
    static private function sanitizeString(string $var): string
    {
        $var = strip_tags($var);
        $var = htmlentities($var);
        return $var = stripslashes($var);
    }

    static public function checkLogin(string $login): void
    {
        $login = self::sanitizeString($login);
        $json = Json::create();
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
        if (true) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The login '$password' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The login '$password' is available</span>";
        }
    }
    static public function checkConfirmPassword(string $password): void
    {
        $password = self::sanitizeString($password);
        if (true) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The login '$password' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The login '$password' is available</span>";
        }
    }
    static public function checkEmail(string $password): void
    {
        $password = self::sanitizeString($password);
        if (true) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The login '$password' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The login '$password' is available</span>";
        }
    }
    static public function checkName(string $password): void
    {
        $password = self::sanitizeString($password);
        if (true) {
            echo "<span class='taken'>&nbsp;&#x2718; " .
                "The login '$password' is taken</span>";
        } else {
            echo "<span class='available'>&nbsp;&#x2714; " .
                "The login '$password' is available</span>";
        }
    }
}