<?php

function userCheck(string $login, string $password) {
    $data = require_once ('user_data.php');
    foreach ($data as $user) {
        $pass = password_verify($password, $user['password']);
        if ($user['login'] === $login && $pass) {     
            $_SESSION['auth'] = true; 
            $_SESSION['login'] = $user['login']; 
            $_SESSION['password'] = $user['password'];
            return true;
        }    
    }
    return false;
}

function getCurrentUser() {
    if (isset($_SESSION))
        return $_SESSION['login'];
    return null;
}

function setPromo() {
    $time = time() + 86400;
    setcookie('time', $time, time() + 86400);
}

function getPromo() {
    if (isset($_COOKIE['time'])) {
        $exp_time = $_COOKIE['time'] - time();
        $hour = intdiv($exp_time, 3600);
        $minute = intdiv(($exp_time - $hour * 3600), 60);
        $second = $exp_time - $hour * 3600 - $minute * 60;
        return "До конца акции осталось: $hour ч. $minute м. $second c.";
    }
    return null;
}

function setDateOfBirth($date) {
    setcookie('date_of_birth', $date, time() + 1314000);
}

function getDateOfBirth() {
    if (isset($_COOKIE['date_of_birth'])) {
        $rem_days = 0;
        return $rem_days;
    }
    return null;
}