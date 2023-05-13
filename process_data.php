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

// Set promotion for 24 hours
function setPromo() {
    $time = time() + 86400;
    setcookie('time', $time, time() + 86400);
}

// Get remaining time 
function getPromo() {
    if (isset($_COOKIE['time'])) {
        $exp_time = $_COOKIE['time'] - time();
        $hour = intdiv($exp_time, 3600);
        $minute = intdiv(($exp_time - $hour * 3600), 60);
        $second = $exp_time - $hour * 3600 - $minute * 60;
        return "Персональная скидка 5% на все услуги! До конца акции осталось: $hour ч. $minute м. $second c.";
    }
    return null;
}

// Set user birthday
function setDateOfBirth($date) {
    setcookie('date_of_birth', $date, time() + 1314000);
}

// Get number of days until user birthday
function getDateOfBirth() {
    if (isset($_COOKIE['date_of_birth'])) {
        $date = $_COOKIE['date_of_birth'];
        $date_user = explode('-', $date);
        $date_cur = explode('-', date('y-m-d'));
        $temp_cur = $date_cur[1].$date_cur[2];
        $temp_user = $date_user[1].$date_user[2];
        if ($temp_cur == $temp_user)
            return "С Днем Рождения! Сегодня Вам предоставляются скидки на все услуги в размере 5%";
            elseif ($temp_cur < $temp_user)
                $target = date_create($date_cur[0].'-'.$date_user[1].'-'.$date_user[2]); 
                else {
                    $y = $date_cur[0] + 1;
                    $target = date_create($y.'-'.$date_user[1].'-'.$date_user[2]);
                }
        $origin = date_create(date('y-m-d')); 
        $interval = date_diff($origin, $target);
        $rem_days = $interval -> format ('%a');
        if ((string)$rem_days[-1] == '1') 
            $d = 'день';
            elseif ((string)$rem_days[-1] == '2' || (string)$rem_days[-1] == '3' || (string)$rem_days[-1] == '4')
                $d = 'дня';
                else
                    $d = 'дней';
        return "До дня Вашего рождения осталось $rem_days $d";
    }
    return null;
}