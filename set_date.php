<?php

session_start();
$auth = $_SESSION['auth'] ?? null;
if (!$auth)                         // No way to login.php!
    header ('Location: index.php'); //
else
    header ('Location: account.php'); 
require_once('process_data.php');
if (!empty($_POST)) {
    $date = $_POST['date'];
    setDateOfBirth($date);
}
?>