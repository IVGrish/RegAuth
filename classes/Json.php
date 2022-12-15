<?php

class Json
{
    static private string $filename = '../database/Users.json';

    static public function create(): void
    {
        $file_handle = fopen(Json::$filename, "a+");

        if (flock($file_handle, LOCK_EX)) {

            $decode = array();

            $decode['login'] = [];
            $decode['password'] = [];
            $decode['confirm_password'] = [];
            $decode['email'] = [];
            $decode['name'] = [];

            if (!fwrite($file_handle, json_encode($decode))) {
                http_response_code(500);
            }
            flock($file_handle, LOCK_UN);
        }
        fclose($file_handle);
    }

    static public function read(): array
    {
        $file_handle = fopen(Json::$filename, "a+");
        $comments = fread($file_handle, filesize(Json::$filename));
        fclose($file_handle);

        return json_decode($comments, true);
    }

    static public function update(array $json): bool
    {
        $decode = Json::read();
        $status = true;

        $decode['login'][] = $json['login'];
        $decode['password'][] = $json['password'];
        $decode['confirm_password'][] = $json['confirm_password'];
        $decode['email'][] = $json['email'];
        $decode['name'][] = $json['name'];

        $file_handle = fopen(Json::$filename, "w+");

        if (flock($file_handle, LOCK_EX)) {
            if (!fwrite($file_handle, json_encode($decode))) {
                $status = false;
                http_response_code(500);
            }
            flock($file_handle, LOCK_UN);
        }
        fclose($file_handle);
        return $status;
    }

    static public function delete(string $login): void
    {
        $decode = Json::read();

        foreach ($decode['login'] as $key => $item) {
            if ($item == $login) {

                unset($decode['login'][$key]);
                unset($decode['password'][$key]);
                unset($decode['confirm_password'][$key]);
                unset($decode['email'][$key]);
                unset($decode['name'][$key]);

                $file_handle = fopen(Json::$filename, "w+");

                if (flock($file_handle, LOCK_EX)) {
                    if (!fwrite($file_handle, json_encode($decode))) {
                        http_response_code(500);
                    }
                    flock($file_handle, LOCK_UN);
                }
                fclose($file_handle);
                break;
            }
        }
    }
}