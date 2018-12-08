<?php

function dnd($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function sanitize($text) {
    return htmlentities($text, ENT_QUOTES, 'UTF-8');
}

function go($address) {
    header("Location:" . $address);
}

function turn() {
    if(isset($_SERVER['HTTP_REFERER'])) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        header('Location: ' . URL_ROOT);
    }

}

function pr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
