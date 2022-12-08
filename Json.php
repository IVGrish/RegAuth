<?php

class Json
{
    static public function create(): array
    {
        $filename = "Users.json";
        $file_handle = fopen($filename, "a+");
        $comments = fread($file_handle, filesize($filename));
        fclose($file_handle);
        return json_decode($comments, true);
    }

    static public function encode(array $json): void
    {
        $decode = Json::create();
        $decode['login'][] = $json['login'];
        $decode['password'][] = $json['password'];
        $decode['confirm_password'][] = $json['confirm_password'];
        $decode['email'][] = $json['email'];
        $decode['name'][] = $json['name'];
        $file_handle = fopen("Users.json", "w+");
        if (flock($file_handle, LOCK_EX)) {
            if (!fwrite($file_handle, json_encode($decode))) {
                echo "Can't write to the file";
            }
            flock($file_handle, LOCK_UN);
        }
        fclose($file_handle);
    }
}