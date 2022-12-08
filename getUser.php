<?php

session_start();

include 'Json.php';

if (isset($_POST['signin'])) {
    $decode = Json::create();
    $pointer = false;
    foreach ($decode['login'] as $key => $item) {
        foreach ($decode['password'] as $clue => $elem) {
            if ($item == $_POST['login'] &&
                $elem == $_POST['password'] &&
                $key  == $clue
            ) {
                $_SESSION['name'] = $decode['name'][$clue];
                $pointer = true;
                break;
            }
        }
    }
    if ($pointer) {
        $response = [
            'status' => true
        ];
    } else {
        $response = [
            'status' => false
        ];
    }
    echo json_encode($response);
}
