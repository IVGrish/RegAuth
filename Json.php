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
        $file_handle = fopen("Users.json", "w+");
        if (flock($file_handle, LOCK_EX)) {
            if (fwrite($file_handle, json_encode($json)) == false) {
                echo "Can't write to the file";
            }
            flock($file_handle, LOCK_UN);
        }
        fclose($file_handle);
    }

}