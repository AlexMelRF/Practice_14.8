<?php

function userCheck(string $login, string $password) {
    $data = require_once ('user_data.php');
    foreach ($data as $user) {
        if ($user['login'] === $login && $user['password'] === $password) {     
            //session_start();
            $_SESSION['auth'] = true; 
            $_SESSION['login'] = $user['login']; 
            $_SESSION['password'] = $user['password'];
            return true;
        }    
    }
    return false;
}

function getCurrentUser() {
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    if (userCheck($login, $password)) 
        return $login;
    return null;
}
