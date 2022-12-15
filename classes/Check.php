<?php

include 'Json.php';

class Check
{
    /**
     * @throws Exception
     */
    static public function sanitizeString(string $var): string
    {
        $var = strip_tags($var);
        $var = htmlentities($var);
        if (!preg_match("#^\S+$#", $var)) {
            throw new Exception("<span class='taken'>&nbsp;&#x2718; " .
                "You must not type any whitespace characters</span>");
        }
        return stripslashes($var);
    }

    static public function checkLogin(string $login): void
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $login = self::sanitizeString($login);

            $json = Json::read();

            if (in_array($login, $json['login'])) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The login '$login' is taken</span>"
                ];
            } else {
                $response = [
                    "response" => "<span class='available'>&nbsp;&#x2714; " .
                                  "The login '$login' is available</span>"
                ];
            }
            echo json_encode($response);
        } catch (Exception $e) {
            echo json_encode(["response" => $e->getMessage()]);
        }
    }

    static public function checkPassword(string $password): void
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $password = self::sanitizeString($password);

            $newArrInt = array();
            $newArrStr = array();
            $length = strlen($password);
            for ($x = 0; $x < $length; $x++) {
                $elem = substr($password, $x, 1);
                if (is_numeric($elem)) {
                    $newArrInt[] = $elem;
                }
                if (!is_numeric($elem)) {
                    $newArrStr[] = $elem;
                }
            }

            if ($length == count($newArrInt) || $length == count($newArrStr)) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The password is invalid, " .
                                  "<br>make sure you typed letters and numbers together</span>"
                ];
            } elseif (!preg_match("#^[a-zA-Z0-9]{6,}$#", $password)) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The password is invalid, " .
                                  "<br>make sure you typed only letters and numbers</span>"
                ];
            } else {
                $response = [
                    "response" => "<span class='available'>&nbsp;&#x2714; " .
                                  "The password is valid</span>"
                ];
            }
            echo json_encode($response);
        } catch (Exception $e) {
            echo json_encode(["response" => $e->getMessage()]);
        }
    }

    static public function checkConfirmPassword(string $confirmPassword, string $pass): void
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $confirmPassword = self::sanitizeString($confirmPassword);
            $pass = self::sanitizeString($pass);

            if ($confirmPassword != $pass) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The passwords don't match</span>"
                ];
            } else {
                $response = [
                    "response" => "<span class='available'>&nbsp;&#x2714; " .
                                  "The passwords match</span>"
                ];
            }
            echo json_encode($response);
        } catch (Exception $e) {
            echo json_encode(["response" => $e->getMessage()]);
        }
    }

    static public function checkEmail(string $email): void
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $email = self::sanitizeString($email);

            $json = Json::read();

            if (!preg_match("#^[A-Z0-9._%+-]+@[A-Z0-9-]+\.[A-Z]{2,4}$#i", $email)) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The email is not in the correct format</span>"
                ];
            } elseif (in_array($email, $json['email'])) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The email '$email' is taken</span>"
                ];
            } else {
                $response = [
                    "response" => "<span class='available'>&nbsp;&#x2714; " .
                                  "The email '$email' is available</span>"
                ];
            }
            echo json_encode($response);
        } catch (Exception $e) {
            echo json_encode(["response" => $e->getMessage()]);
        }
    }

    static public function checkName(string $name): void
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $name = self::sanitizeString($name);

            if (!preg_match("#^[a-zA-Z]{2,}$#", $name)) {
                $response = [
                    "response" => "<span class='taken'>&nbsp;&#x2718; " .
                                  "The name is invalid, " .
                                  "<br>make sure you typed only letters</span>"
                ];
            } else {
                $response = [
                    "response" => "<span class='available'>&nbsp;&#x2714; " .
                                  "The name is valid</span>"
                ];
            }
            echo json_encode($response);
        } catch (Exception $e) {
            echo json_encode(["response" => $e->getMessage()]);
        }
    }
}